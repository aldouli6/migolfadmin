<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\UserHandicapIndex;

class UserHandicapIndexApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_user_handicap_index()
    {
        $userHandicapIndex = UserHandicapIndex::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/user_handicap_indices', $userHandicapIndex
        );

        $this->assertApiResponse($userHandicapIndex);
    }

    /**
     * @test
     */
    public function test_read_user_handicap_index()
    {
        $userHandicapIndex = UserHandicapIndex::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/user_handicap_indices/'.$userHandicapIndex->id
        );

        $this->assertApiResponse($userHandicapIndex->toArray());
    }

    /**
     * @test
     */
    public function test_update_user_handicap_index()
    {
        $userHandicapIndex = UserHandicapIndex::factory()->create();
        $editedUserHandicapIndex = UserHandicapIndex::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/user_handicap_indices/'.$userHandicapIndex->id,
            $editedUserHandicapIndex
        );

        $this->assertApiResponse($editedUserHandicapIndex);
    }

    /**
     * @test
     */
    public function test_delete_user_handicap_index()
    {
        $userHandicapIndex = UserHandicapIndex::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/user_handicap_indices/'.$userHandicapIndex->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/user_handicap_indices/'.$userHandicapIndex->id
        );

        $this->response->assertStatus(404);
    }
}
