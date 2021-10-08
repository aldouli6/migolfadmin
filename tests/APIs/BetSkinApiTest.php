<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BetSkin;

class BetSkinApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bet_skin()
    {
        $betSkin = BetSkin::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bet_skins', $betSkin
        );

        $this->assertApiResponse($betSkin);
    }

    /**
     * @test
     */
    public function test_read_bet_skin()
    {
        $betSkin = BetSkin::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/bet_skins/'.$betSkin->id
        );

        $this->assertApiResponse($betSkin->toArray());
    }

    /**
     * @test
     */
    public function test_update_bet_skin()
    {
        $betSkin = BetSkin::factory()->create();
        $editedBetSkin = BetSkin::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bet_skins/'.$betSkin->id,
            $editedBetSkin
        );

        $this->assertApiResponse($editedBetSkin);
    }

    /**
     * @test
     */
    public function test_delete_bet_skin()
    {
        $betSkin = BetSkin::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bet_skins/'.$betSkin->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bet_skins/'.$betSkin->id
        );

        $this->response->assertStatus(404);
    }
}
