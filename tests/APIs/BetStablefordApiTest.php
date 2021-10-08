<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BetStableford;

class BetStablefordApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bet_stableford()
    {
        $betStableford = BetStableford::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bet_stablefords', $betStableford
        );

        $this->assertApiResponse($betStableford);
    }

    /**
     * @test
     */
    public function test_read_bet_stableford()
    {
        $betStableford = BetStableford::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/bet_stablefords/'.$betStableford->id
        );

        $this->assertApiResponse($betStableford->toArray());
    }

    /**
     * @test
     */
    public function test_update_bet_stableford()
    {
        $betStableford = BetStableford::factory()->create();
        $editedBetStableford = BetStableford::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bet_stablefords/'.$betStableford->id,
            $editedBetStableford
        );

        $this->assertApiResponse($editedBetStableford);
    }

    /**
     * @test
     */
    public function test_delete_bet_stableford()
    {
        $betStableford = BetStableford::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bet_stablefords/'.$betStableford->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bet_stablefords/'.$betStableford->id
        );

        $this->response->assertStatus(404);
    }
}
