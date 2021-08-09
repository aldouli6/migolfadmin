<?php namespace Tests\Repositories;

use App\Models\UserScore;
use App\Repositories\UserScoreRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UserScoreRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UserScoreRepository
     */
    protected $userScoreRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->userScoreRepo = \App::make(UserScoreRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_user_score()
    {
        $userScore = UserScore::factory()->make()->toArray();

        $createdUserScore = $this->userScoreRepo->create($userScore);

        $createdUserScore = $createdUserScore->toArray();
        $this->assertArrayHasKey('id', $createdUserScore);
        $this->assertNotNull($createdUserScore['id'], 'Created UserScore must have id specified');
        $this->assertNotNull(UserScore::find($createdUserScore['id']), 'UserScore with given id must be in DB');
        $this->assertModelData($userScore, $createdUserScore);
    }

    /**
     * @test read
     */
    public function test_read_user_score()
    {
        $userScore = UserScore::factory()->create();

        $dbUserScore = $this->userScoreRepo->find($userScore->id);

        $dbUserScore = $dbUserScore->toArray();
        $this->assertModelData($userScore->toArray(), $dbUserScore);
    }

    /**
     * @test update
     */
    public function test_update_user_score()
    {
        $userScore = UserScore::factory()->create();
        $fakeUserScore = UserScore::factory()->make()->toArray();

        $updatedUserScore = $this->userScoreRepo->update($fakeUserScore, $userScore->id);

        $this->assertModelData($fakeUserScore, $updatedUserScore->toArray());
        $dbUserScore = $this->userScoreRepo->find($userScore->id);
        $this->assertModelData($fakeUserScore, $dbUserScore->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_user_score()
    {
        $userScore = UserScore::factory()->create();

        $resp = $this->userScoreRepo->delete($userScore->id);

        $this->assertTrue($resp);
        $this->assertNull(UserScore::find($userScore->id), 'UserScore should not exist in DB');
    }
}
