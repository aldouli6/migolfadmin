<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BetMatchIndividual;

class BetMatchIndividualApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bet_match_individual()
    {
        $betMatchIndividual = BetMatchIndividual::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bet_match_individuals', $betMatchIndividual
        );

        $this->assertApiResponse($betMatchIndividual);
    }

    /**
     * @test
     */
    public function test_read_bet_match_individual()
    {
        $betMatchIndividual = BetMatchIndividual::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/bet_match_individuals/'.$betMatchIndividual->id
        );

        $this->assertApiResponse($betMatchIndividual->toArray());
    }

    /**
     * @test
     */
    public function test_update_bet_match_individual()
    {
        $betMatchIndividual = BetMatchIndividual::factory()->create();
        $editedBetMatchIndividual = BetMatchIndividual::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bet_match_individuals/'.$betMatchIndividual->id,
            $editedBetMatchIndividual
        );

        $this->assertApiResponse($editedBetMatchIndividual);
    }

    /**
     * @test
     */
    public function test_delete_bet_match_individual()
    {
        $betMatchIndividual = BetMatchIndividual::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bet_match_individuals/'.$betMatchIndividual->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bet_match_individuals/'.$betMatchIndividual->id
        );

        $this->response->assertStatus(404);
    }
}
