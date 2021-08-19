<?php namespace Tests\Repositories;

use App\Models\UserHandicapIndex;
use App\Repositories\UserHandicapIndexRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UserHandicapIndexRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UserHandicapIndexRepository
     */
    protected $userHandicapIndexRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->userHandicapIndexRepo = \App::make(UserHandicapIndexRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_user_handicap_index()
    {
        $userHandicapIndex = UserHandicapIndex::factory()->make()->toArray();

        $createdUserHandicapIndex = $this->userHandicapIndexRepo->create($userHandicapIndex);

        $createdUserHandicapIndex = $createdUserHandicapIndex->toArray();
        $this->assertArrayHasKey('id', $createdUserHandicapIndex);
        $this->assertNotNull($createdUserHandicapIndex['id'], 'Created UserHandicapIndex must have id specified');
        $this->assertNotNull(UserHandicapIndex::find($createdUserHandicapIndex['id']), 'UserHandicapIndex with given id must be in DB');
        $this->assertModelData($userHandicapIndex, $createdUserHandicapIndex);
    }

    /**
     * @test read
     */
    public function test_read_user_handicap_index()
    {
        $userHandicapIndex = UserHandicapIndex::factory()->create();

        $dbUserHandicapIndex = $this->userHandicapIndexRepo->find($userHandicapIndex->id);

        $dbUserHandicapIndex = $dbUserHandicapIndex->toArray();
        $this->assertModelData($userHandicapIndex->toArray(), $dbUserHandicapIndex);
    }

    /**
     * @test update
     */
    public function test_update_user_handicap_index()
    {
        $userHandicapIndex = UserHandicapIndex::factory()->create();
        $fakeUserHandicapIndex = UserHandicapIndex::factory()->make()->toArray();

        $updatedUserHandicapIndex = $this->userHandicapIndexRepo->update($fakeUserHandicapIndex, $userHandicapIndex->id);

        $this->assertModelData($fakeUserHandicapIndex, $updatedUserHandicapIndex->toArray());
        $dbUserHandicapIndex = $this->userHandicapIndexRepo->find($userHandicapIndex->id);
        $this->assertModelData($fakeUserHandicapIndex, $dbUserHandicapIndex->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_user_handicap_index()
    {
        $userHandicapIndex = UserHandicapIndex::factory()->create();

        $resp = $this->userHandicapIndexRepo->delete($userHandicapIndex->id);

        $this->assertTrue($resp);
        $this->assertNull(UserHandicapIndex::find($userHandicapIndex->id), 'UserHandicapIndex should not exist in DB');
    }
}
