<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BetRompeHandicap;

class BetRompeHandicapApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bet_rompe_handicap()
    {
        $betRompeHandicap = BetRompeHandicap::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bet_rompe_handicaps', $betRompeHandicap
        );

        $this->assertApiResponse($betRompeHandicap);
    }

    /**
     * @test
     */
    public function test_read_bet_rompe_handicap()
    {
        $betRompeHandicap = BetRompeHandicap::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/bet_rompe_handicaps/'.$betRompeHandicap->id
        );

        $this->assertApiResponse($betRompeHandicap->toArray());
    }

    /**
     * @test
     */
    public function test_update_bet_rompe_handicap()
    {
        $betRompeHandicap = BetRompeHandicap::factory()->create();
        $editedBetRompeHandicap = BetRompeHandicap::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bet_rompe_handicaps/'.$betRompeHandicap->id,
            $editedBetRompeHandicap
        );

        $this->assertApiResponse($editedBetRompeHandicap);
    }

    /**
     * @test
     */
    public function test_delete_bet_rompe_handicap()
    {
        $betRompeHandicap = BetRompeHandicap::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bet_rompe_handicaps/'.$betRompeHandicap->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bet_rompe_handicaps/'.$betRompeHandicap->id
        );

        $this->response->assertStatus(404);
    }
}
