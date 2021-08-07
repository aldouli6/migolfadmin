<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\FieldStartDefault;

class FieldStartDefaultApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_field_start_default()
    {
        $fieldStartDefault = FieldStartDefault::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/field_start_defaults', $fieldStartDefault
        );

        $this->assertApiResponse($fieldStartDefault);
    }

    /**
     * @test
     */
    public function test_read_field_start_default()
    {
        $fieldStartDefault = FieldStartDefault::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/field_start_defaults/'.$fieldStartDefault->id
        );

        $this->assertApiResponse($fieldStartDefault->toArray());
    }

    /**
     * @test
     */
    public function test_update_field_start_default()
    {
        $fieldStartDefault = FieldStartDefault::factory()->create();
        $editedFieldStartDefault = FieldStartDefault::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/field_start_defaults/'.$fieldStartDefault->id,
            $editedFieldStartDefault
        );

        $this->assertApiResponse($editedFieldStartDefault);
    }

    /**
     * @test
     */
    public function test_delete_field_start_default()
    {
        $fieldStartDefault = FieldStartDefault::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/field_start_defaults/'.$fieldStartDefault->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/field_start_defaults/'.$fieldStartDefault->id
        );

        $this->response->assertStatus(404);
    }
}
