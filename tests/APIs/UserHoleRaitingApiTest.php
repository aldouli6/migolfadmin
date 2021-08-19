<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\UserHoleRaiting;

class UserHoleRaitingApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_user_hole_raiting()
    {
        $userHoleRaiting = UserHoleRaiting::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/user_hole_raitings', $userHoleRaiting
        );

        $this->assertApiResponse($userHoleRaiting);
    }

    /**
     * @test
     */
    public function test_read_user_hole_raiting()
    {
        $userHoleRaiting = UserHoleRaiting::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/user_hole_raitings/'.$userHoleRaiting->id
        );

        $this->assertApiResponse($userHoleRaiting->toArray());
    }

    /**
     * @test
     */
    public function test_update_user_hole_raiting()
    {
        $userHoleRaiting = UserHoleRaiting::factory()->create();
        $editedUserHoleRaiting = UserHoleRaiting::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/user_hole_raitings/'.$userHoleRaiting->id,
            $editedUserHoleRaiting
        );

        $this->assertApiResponse($editedUserHoleRaiting);
    }

    /**
     * @test
     */
    public function test_delete_user_hole_raiting()
    {
        $userHoleRaiting = UserHoleRaiting::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/user_hole_raitings/'.$userHoleRaiting->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/user_hole_raitings/'.$userHoleRaiting->id
        );

        $this->response->assertStatus(404);
    }
}
