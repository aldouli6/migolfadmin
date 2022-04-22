<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\UserPlayer;

class UserPlayerApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_user_player()
    {
        $userPlayer = UserPlayer::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/user_players', $userPlayer
        );

        $this->assertApiResponse($userPlayer);
    }

    /**
     * @test
     */
    public function test_read_user_player()
    {
        $userPlayer = UserPlayer::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/user_players/'.$userPlayer->id
        );

        $this->assertApiResponse($userPlayer->toArray());
    }

    /**
     * @test
     */
    public function test_update_user_player()
    {
        $userPlayer = UserPlayer::factory()->create();
        $editedUserPlayer = UserPlayer::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/user_players/'.$userPlayer->id,
            $editedUserPlayer
        );

        $this->assertApiResponse($editedUserPlayer);
    }

    /**
     * @test
     */
    public function test_delete_user_player()
    {
        $userPlayer = UserPlayer::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/user_players/'.$userPlayer->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/user_players/'.$userPlayer->id
        );

        $this->response->assertStatus(404);
    }
}
