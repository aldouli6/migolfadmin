<?php namespace Tests\Repositories;

use App\Models\UserPlayer;
use App\Repositories\UserPlayerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UserPlayerRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UserPlayerRepository
     */
    protected $userPlayerRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->userPlayerRepo = \App::make(UserPlayerRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_user_player()
    {
        $userPlayer = UserPlayer::factory()->make()->toArray();

        $createdUserPlayer = $this->userPlayerRepo->create($userPlayer);

        $createdUserPlayer = $createdUserPlayer->toArray();
        $this->assertArrayHasKey('id', $createdUserPlayer);
        $this->assertNotNull($createdUserPlayer['id'], 'Created UserPlayer must have id specified');
        $this->assertNotNull(UserPlayer::find($createdUserPlayer['id']), 'UserPlayer with given id must be in DB');
        $this->assertModelData($userPlayer, $createdUserPlayer);
    }

    /**
     * @test read
     */
    public function test_read_user_player()
    {
        $userPlayer = UserPlayer::factory()->create();

        $dbUserPlayer = $this->userPlayerRepo->find($userPlayer->id);

        $dbUserPlayer = $dbUserPlayer->toArray();
        $this->assertModelData($userPlayer->toArray(), $dbUserPlayer);
    }

    /**
     * @test update
     */
    public function test_update_user_player()
    {
        $userPlayer = UserPlayer::factory()->create();
        $fakeUserPlayer = UserPlayer::factory()->make()->toArray();

        $updatedUserPlayer = $this->userPlayerRepo->update($fakeUserPlayer, $userPlayer->id);

        $this->assertModelData($fakeUserPlayer, $updatedUserPlayer->toArray());
        $dbUserPlayer = $this->userPlayerRepo->find($userPlayer->id);
        $this->assertModelData($fakeUserPlayer, $dbUserPlayer->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_user_player()
    {
        $userPlayer = UserPlayer::factory()->create();

        $resp = $this->userPlayerRepo->delete($userPlayer->id);

        $this->assertTrue($resp);
        $this->assertNull(UserPlayer::find($userPlayer->id), 'UserPlayer should not exist in DB');
    }
}
