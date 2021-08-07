<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\UserClub;

class UserClubApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_user_club()
    {
        $userClub = UserClub::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/user_clubs', $userClub
        );

        $this->assertApiResponse($userClub);
    }

    /**
     * @test
     */
    public function test_read_user_club()
    {
        $userClub = UserClub::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/user_clubs/'.$userClub->id
        );

        $this->assertApiResponse($userClub->toArray());
    }

    /**
     * @test
     */
    public function test_update_user_club()
    {
        $userClub = UserClub::factory()->create();
        $editedUserClub = UserClub::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/user_clubs/'.$userClub->id,
            $editedUserClub
        );

        $this->assertApiResponse($editedUserClub);
    }

    /**
     * @test
     */
    public function test_delete_user_club()
    {
        $userClub = UserClub::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/user_clubs/'.$userClub->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/user_clubs/'.$userClub->id
        );

        $this->response->assertStatus(404);
    }
}
