<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\UserField;

class UserFieldApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_user_field()
    {
        $userField = UserField::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/user_fields', $userField
        );

        $this->assertApiResponse($userField);
    }

    /**
     * @test
     */
    public function test_read_user_field()
    {
        $userField = UserField::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/user_fields/'.$userField->id
        );

        $this->assertApiResponse($userField->toArray());
    }

    /**
     * @test
     */
    public function test_update_user_field()
    {
        $userField = UserField::factory()->create();
        $editedUserField = UserField::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/user_fields/'.$userField->id,
            $editedUserField
        );

        $this->assertApiResponse($editedUserField);
    }

    /**
     * @test
     */
    public function test_delete_user_field()
    {
        $userField = UserField::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/user_fields/'.$userField->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/user_fields/'.$userField->id
        );

        $this->response->assertStatus(404);
    }
}
