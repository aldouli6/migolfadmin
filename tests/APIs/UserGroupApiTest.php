<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\UserGroup;

class UserGroupApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_user_group()
    {
        $userGroup = UserGroup::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/user_groups', $userGroup
        );

        $this->assertApiResponse($userGroup);
    }

    /**
     * @test
     */
    public function test_read_user_group()
    {
        $userGroup = UserGroup::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/user_groups/'.$userGroup->id
        );

        $this->assertApiResponse($userGroup->toArray());
    }

    /**
     * @test
     */
    public function test_update_user_group()
    {
        $userGroup = UserGroup::factory()->create();
        $editedUserGroup = UserGroup::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/user_groups/'.$userGroup->id,
            $editedUserGroup
        );

        $this->assertApiResponse($editedUserGroup);
    }

    /**
     * @test
     */
    public function test_delete_user_group()
    {
        $userGroup = UserGroup::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/user_groups/'.$userGroup->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/user_groups/'.$userGroup->id
        );

        $this->response->assertStatus(404);
    }
}
