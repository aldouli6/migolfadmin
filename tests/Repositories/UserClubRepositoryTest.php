<?php namespace Tests\Repositories;

use App\Models\UserClub;
use App\Repositories\UserClubRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UserClubRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UserClubRepository
     */
    protected $userClubRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->userClubRepo = \App::make(UserClubRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_user_club()
    {
        $userClub = UserClub::factory()->make()->toArray();

        $createdUserClub = $this->userClubRepo->create($userClub);

        $createdUserClub = $createdUserClub->toArray();
        $this->assertArrayHasKey('id', $createdUserClub);
        $this->assertNotNull($createdUserClub['id'], 'Created UserClub must have id specified');
        $this->assertNotNull(UserClub::find($createdUserClub['id']), 'UserClub with given id must be in DB');
        $this->assertModelData($userClub, $createdUserClub);
    }

    /**
     * @test read
     */
    public function test_read_user_club()
    {
        $userClub = UserClub::factory()->create();

        $dbUserClub = $this->userClubRepo->find($userClub->id);

        $dbUserClub = $dbUserClub->toArray();
        $this->assertModelData($userClub->toArray(), $dbUserClub);
    }

    /**
     * @test update
     */
    public function test_update_user_club()
    {
        $userClub = UserClub::factory()->create();
        $fakeUserClub = UserClub::factory()->make()->toArray();

        $updatedUserClub = $this->userClubRepo->update($fakeUserClub, $userClub->id);

        $this->assertModelData($fakeUserClub, $updatedUserClub->toArray());
        $dbUserClub = $this->userClubRepo->find($userClub->id);
        $this->assertModelData($fakeUserClub, $dbUserClub->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_user_club()
    {
        $userClub = UserClub::factory()->create();

        $resp = $this->userClubRepo->delete($userClub->id);

        $this->assertTrue($resp);
        $this->assertNull(UserClub::find($userClub->id), 'UserClub should not exist in DB');
    }
}
