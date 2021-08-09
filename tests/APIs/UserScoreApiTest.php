<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\UserScore;

class UserScoreApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_user_score()
    {
        $userScore = UserScore::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/user_scores', $userScore
        );

        $this->assertApiResponse($userScore);
    }

    /**
     * @test
     */
    public function test_read_user_score()
    {
        $userScore = UserScore::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/user_scores/'.$userScore->id
        );

        $this->assertApiResponse($userScore->toArray());
    }

    /**
     * @test
     */
    public function test_update_user_score()
    {
        $userScore = UserScore::factory()->create();
        $editedUserScore = UserScore::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/user_scores/'.$userScore->id,
            $editedUserScore
        );

        $this->assertApiResponse($editedUserScore);
    }

    /**
     * @test
     */
    public function test_delete_user_score()
    {
        $userScore = UserScore::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/user_scores/'.$userScore->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/user_scores/'.$userScore->id
        );

        $this->response->assertStatus(404);
    }
}
