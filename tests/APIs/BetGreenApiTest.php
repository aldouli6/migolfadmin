<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BetGreen;

class BetGreenApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bet_green()
    {
        $betGreen = BetGreen::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bet_greens', $betGreen
        );

        $this->assertApiResponse($betGreen);
    }

    /**
     * @test
     */
    public function test_read_bet_green()
    {
        $betGreen = BetGreen::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/bet_greens/'.$betGreen->id
        );

        $this->assertApiResponse($betGreen->toArray());
    }

    /**
     * @test
     */
    public function test_update_bet_green()
    {
        $betGreen = BetGreen::factory()->create();
        $editedBetGreen = BetGreen::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bet_greens/'.$betGreen->id,
            $editedBetGreen
        );

        $this->assertApiResponse($editedBetGreen);
    }

    /**
     * @test
     */
    public function test_delete_bet_green()
    {
        $betGreen = BetGreen::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bet_greens/'.$betGreen->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bet_greens/'.$betGreen->id
        );

        $this->response->assertStatus(404);
    }
}
