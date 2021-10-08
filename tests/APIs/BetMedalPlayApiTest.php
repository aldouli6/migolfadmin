<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BetMedalPlay;

class BetMedalPlayApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bet_medal_play()
    {
        $betMedalPlay = BetMedalPlay::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bet_medal_plays', $betMedalPlay
        );

        $this->assertApiResponse($betMedalPlay);
    }

    /**
     * @test
     */
    public function test_read_bet_medal_play()
    {
        $betMedalPlay = BetMedalPlay::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/bet_medal_plays/'.$betMedalPlay->id
        );

        $this->assertApiResponse($betMedalPlay->toArray());
    }

    /**
     * @test
     */
    public function test_update_bet_medal_play()
    {
        $betMedalPlay = BetMedalPlay::factory()->create();
        $editedBetMedalPlay = BetMedalPlay::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bet_medal_plays/'.$betMedalPlay->id,
            $editedBetMedalPlay
        );

        $this->assertApiResponse($editedBetMedalPlay);
    }

    /**
     * @test
     */
    public function test_delete_bet_medal_play()
    {
        $betMedalPlay = BetMedalPlay::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bet_medal_plays/'.$betMedalPlay->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bet_medal_plays/'.$betMedalPlay->id
        );

        $this->response->assertStatus(404);
    }
}
