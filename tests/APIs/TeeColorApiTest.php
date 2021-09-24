<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\TeeColor;

class TeeColorApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tee_color()
    {
        $teeColor = TeeColor::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tee_colors', $teeColor
        );

        $this->assertApiResponse($teeColor);
    }

    /**
     * @test
     */
    public function test_read_tee_color()
    {
        $teeColor = TeeColor::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/tee_colors/'.$teeColor->id
        );

        $this->assertApiResponse($teeColor->toArray());
    }

    /**
     * @test
     */
    public function test_update_tee_color()
    {
        $teeColor = TeeColor::factory()->create();
        $editedTeeColor = TeeColor::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tee_colors/'.$teeColor->id,
            $editedTeeColor
        );

        $this->assertApiResponse($editedTeeColor);
    }

    /**
     * @test
     */
    public function test_delete_tee_color()
    {
        $teeColor = TeeColor::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tee_colors/'.$teeColor->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tee_colors/'.$teeColor->id
        );

        $this->response->assertStatus(404);
    }
}
