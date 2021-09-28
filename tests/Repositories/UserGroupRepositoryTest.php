<?php namespace Tests\Repositories;

use App\Models\UserGroup;
use App\Repositories\UserGroupRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UserGroupRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UserGroupRepository
     */
    protected $userGroupRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->userGroupRepo = \App::make(UserGroupRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_user_group()
    {
        $userGroup = UserGroup::factory()->make()->toArray();

        $createdUserGroup = $this->userGroupRepo->create($userGroup);

        $createdUserGroup = $createdUserGroup->toArray();
        $this->assertArrayHasKey('id', $createdUserGroup);
        $this->assertNotNull($createdUserGroup['id'], 'Created UserGroup must have id specified');
        $this->assertNotNull(UserGroup::find($createdUserGroup['id']), 'UserGroup with given id must be in DB');
        $this->assertModelData($userGroup, $createdUserGroup);
    }

    /**
     * @test read
     */
    public function test_read_user_group()
    {
        $userGroup = UserGroup::factory()->create();

        $dbUserGroup = $this->userGroupRepo->find($userGroup->id);

        $dbUserGroup = $dbUserGroup->toArray();
        $this->assertModelData($userGroup->toArray(), $dbUserGroup);
    }

    /**
     * @test update
     */
    public function test_update_user_group()
    {
        $userGroup = UserGroup::factory()->create();
        $fakeUserGroup = UserGroup::factory()->make()->toArray();

        $updatedUserGroup = $this->userGroupRepo->update($fakeUserGroup, $userGroup->id);

        $this->assertModelData($fakeUserGroup, $updatedUserGroup->toArray());
        $dbUserGroup = $this->userGroupRepo->find($userGroup->id);
        $this->assertModelData($fakeUserGroup, $dbUserGroup->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_user_group()
    {
        $userGroup = UserGroup::factory()->create();

        $resp = $this->userGroupRepo->delete($userGroup->id);

        $this->assertTrue($resp);
        $this->assertNull(UserGroup::find($userGroup->id), 'UserGroup should not exist in DB');
    }
}
