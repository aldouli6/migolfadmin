<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Bet;

class BetApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bet()
    {
        $bet = Bet::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bets', $bet
        );

        $this->assertApiResponse($bet);
    }

    /**
     * @test
     */
    public function test_read_bet()
    {
        $bet = Bet::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/bets/'.$bet->id
        );

        $this->assertApiResponse($bet->toArray());
    }

    /**
     * @test
     */
    public function test_update_bet()
    {
        $bet = Bet::factory()->create();
        $editedBet = Bet::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bets/'.$bet->id,
            $editedBet
        );

        $this->assertApiResponse($editedBet);
    }

    /**
     * @test
     */
    public function test_delete_bet()
    {
        $bet = Bet::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bets/'.$bet->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bets/'.$bet->id
        );

        $this->response->assertStatus(404);
    }
}
