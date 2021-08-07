<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Hole;

class HoleApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_hole()
    {
        $hole = Hole::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/holes', $hole
        );

        $this->assertApiResponse($hole);
    }

    /**
     * @test
     */
    public function test_read_hole()
    {
        $hole = Hole::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/holes/'.$hole->id
        );

        $this->assertApiResponse($hole->toArray());
    }

    /**
     * @test
     */
    public function test_update_hole()
    {
        $hole = Hole::factory()->create();
        $editedHole = Hole::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/holes/'.$hole->id,
            $editedHole
        );

        $this->assertApiResponse($editedHole);
    }

    /**
     * @test
     */
    public function test_delete_hole()
    {
        $hole = Hole::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/holes/'.$hole->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/holes/'.$hole->id
        );

        $this->response->assertStatus(404);
    }
}
