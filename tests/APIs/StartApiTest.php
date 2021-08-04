<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Start;

class StartApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_start()
    {
        $start = Start::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/starts', $start
        );

        $this->assertApiResponse($start);
    }

    /**
     * @test
     */
    public function test_read_start()
    {
        $start = Start::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/starts/'.$start->id
        );

        $this->assertApiResponse($start->toArray());
    }

    /**
     * @test
     */
    public function test_update_start()
    {
        $start = Start::factory()->create();
        $editedStart = Start::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/starts/'.$start->id,
            $editedStart
        );

        $this->assertApiResponse($editedStart);
    }

    /**
     * @test
     */
    public function test_delete_start()
    {
        $start = Start::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/starts/'.$start->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/starts/'.$start->id
        );

        $this->response->assertStatus(404);
    }
}
