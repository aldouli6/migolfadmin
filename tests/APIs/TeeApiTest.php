<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Tee;

class TeeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tee()
    {
        $tee = Tee::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tees', $tee
        );

        $this->assertApiResponse($tee);
    }

    /**
     * @test
     */
    public function test_read_tee()
    {
        $tee = Tee::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/tees/'.$tee->id
        );

        $this->assertApiResponse($tee->toArray());
    }

    /**
     * @test
     */
    public function test_update_tee()
    {
        $tee = Tee::factory()->create();
        $editedTee = Tee::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tees/'.$tee->id,
            $editedTee
        );

        $this->assertApiResponse($editedTee);
    }

    /**
     * @test
     */
    public function test_delete_tee()
    {
        $tee = Tee::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tees/'.$tee->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tees/'.$tee->id
        );

        $this->response->assertStatus(404);
    }
}
