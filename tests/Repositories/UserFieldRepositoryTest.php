<?php namespace Tests\Repositories;

use App\Models\UserField;
use App\Repositories\UserFieldRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UserFieldRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UserFieldRepository
     */
    protected $userFieldRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->userFieldRepo = \App::make(UserFieldRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_user_field()
    {
        $userField = UserField::factory()->make()->toArray();

        $createdUserField = $this->userFieldRepo->create($userField);

        $createdUserField = $createdUserField->toArray();
        $this->assertArrayHasKey('id', $createdUserField);
        $this->assertNotNull($createdUserField['id'], 'Created UserField must have id specified');
        $this->assertNotNull(UserField::find($createdUserField['id']), 'UserField with given id must be in DB');
        $this->assertModelData($userField, $createdUserField);
    }

    /**
     * @test read
     */
    public function test_read_user_field()
    {
        $userField = UserField::factory()->create();

        $dbUserField = $this->userFieldRepo->find($userField->id);

        $dbUserField = $dbUserField->toArray();
        $this->assertModelData($userField->toArray(), $dbUserField);
    }

    /**
     * @test update
     */
    public function test_update_user_field()
    {
        $userField = UserField::factory()->create();
        $fakeUserField = UserField::factory()->make()->toArray();

        $updatedUserField = $this->userFieldRepo->update($fakeUserField, $userField->id);

        $this->assertModelData($fakeUserField, $updatedUserField->toArray());
        $dbUserField = $this->userFieldRepo->find($userField->id);
        $this->assertModelData($fakeUserField, $dbUserField->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_user_field()
    {
        $userField = UserField::factory()->create();

        $resp = $this->userFieldRepo->delete($userField->id);

        $this->assertTrue($resp);
        $this->assertNull(UserField::find($userField->id), 'UserField should not exist in DB');
    }
}
