<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BetMatchPareja;

class BetMatchParejaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bet_match_pareja()
    {
        $betMatchPareja = BetMatchPareja::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bet_match_parejas', $betMatchPareja
        );

        $this->assertApiResponse($betMatchPareja);
    }

    /**
     * @test
     */
    public function test_read_bet_match_pareja()
    {
        $betMatchPareja = BetMatchPareja::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/bet_match_parejas/'.$betMatchPareja->id
        );

        $this->assertApiResponse($betMatchPareja->toArray());
    }

    /**
     * @test
     */
    public function test_update_bet_match_pareja()
    {
        $betMatchPareja = BetMatchPareja::factory()->create();
        $editedBetMatchPareja = BetMatchPareja::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bet_match_parejas/'.$betMatchPareja->id,
            $editedBetMatchPareja
        );

        $this->assertApiResponse($editedBetMatchPareja);
    }

    /**
     * @test
     */
    public function test_delete_bet_match_pareja()
    {
        $betMatchPareja = BetMatchPareja::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bet_match_parejas/'.$betMatchPareja->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bet_match_parejas/'.$betMatchPareja->id
        );

        $this->response->assertStatus(404);
    }
}
