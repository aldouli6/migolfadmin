<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BetRayaPunto;

class BetRayaPuntoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bet_raya_punto()
    {
        $betRayaPunto = BetRayaPunto::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bet_raya_puntos', $betRayaPunto
        );

        $this->assertApiResponse($betRayaPunto);
    }

    /**
     * @test
     */
    public function test_read_bet_raya_punto()
    {
        $betRayaPunto = BetRayaPunto::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/bet_raya_puntos/'.$betRayaPunto->id
        );

        $this->assertApiResponse($betRayaPunto->toArray());
    }

    /**
     * @test
     */
    public function test_update_bet_raya_punto()
    {
        $betRayaPunto = BetRayaPunto::factory()->create();
        $editedBetRayaPunto = BetRayaPunto::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bet_raya_puntos/'.$betRayaPunto->id,
            $editedBetRayaPunto
        );

        $this->assertApiResponse($editedBetRayaPunto);
    }

    /**
     * @test
     */
    public function test_delete_bet_raya_punto()
    {
        $betRayaPunto = BetRayaPunto::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bet_raya_puntos/'.$betRayaPunto->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bet_raya_puntos/'.$betRayaPunto->id
        );

        $this->response->assertStatus(404);
    }
}
