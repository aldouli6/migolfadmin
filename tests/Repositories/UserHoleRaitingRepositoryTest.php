<?php namespace Tests\Repositories;

use App\Models\UserHoleRaiting;
use App\Repositories\UserHoleRaitingRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UserHoleRaitingRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UserHoleRaitingRepository
     */
    protected $userHoleRaitingRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->userHoleRaitingRepo = \App::make(UserHoleRaitingRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_user_hole_raiting()
    {
        $userHoleRaiting = UserHoleRaiting::factory()->make()->toArray();

        $createdUserHoleRaiting = $this->userHoleRaitingRepo->create($userHoleRaiting);

        $createdUserHoleRaiting = $createdUserHoleRaiting->toArray();
        $this->assertArrayHasKey('id', $createdUserHoleRaiting);
        $this->assertNotNull($createdUserHoleRaiting['id'], 'Created UserHoleRaiting must have id specified');
        $this->assertNotNull(UserHoleRaiting::find($createdUserHoleRaiting['id']), 'UserHoleRaiting with given id must be in DB');
        $this->assertModelData($userHoleRaiting, $createdUserHoleRaiting);
    }

    /**
     * @test read
     */
    public function test_read_user_hole_raiting()
    {
        $userHoleRaiting = UserHoleRaiting::factory()->create();

        $dbUserHoleRaiting = $this->userHoleRaitingRepo->find($userHoleRaiting->id);

        $dbUserHoleRaiting = $dbUserHoleRaiting->toArray();
        $this->assertModelData($userHoleRaiting->toArray(), $dbUserHoleRaiting);
    }

    /**
     * @test update
     */
    public function test_update_user_hole_raiting()
    {
        $userHoleRaiting = UserHoleRaiting::factory()->create();
        $fakeUserHoleRaiting = UserHoleRaiting::factory()->make()->toArray();

        $updatedUserHoleRaiting = $this->userHoleRaitingRepo->update($fakeUserHoleRaiting, $userHoleRaiting->id);

        $this->assertModelData($fakeUserHoleRaiting, $updatedUserHoleRaiting->toArray());
        $dbUserHoleRaiting = $this->userHoleRaitingRepo->find($userHoleRaiting->id);
        $this->assertModelData($fakeUserHoleRaiting, $dbUserHoleRaiting->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_user_hole_raiting()
    {
        $userHoleRaiting = UserHoleRaiting::factory()->create();

        $resp = $this->userHoleRaitingRepo->delete($userHoleRaiting->id);

        $this->assertTrue($resp);
        $this->assertNull(UserHoleRaiting::find($userHoleRaiting->id), 'UserHoleRaiting should not exist in DB');
    }
}
