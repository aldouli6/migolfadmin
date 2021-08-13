<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\UserCourse;

class UserCourseApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_user_course()
    {
        $userCourse = UserCourse::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/user_courses', $userCourse
        );

        $this->assertApiResponse($userCourse);
    }

    /**
     * @test
     */
    public function test_read_user_course()
    {
        $userCourse = UserCourse::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/user_courses/'.$userCourse->id
        );

        $this->assertApiResponse($userCourse->toArray());
    }

    /**
     * @test
     */
    public function test_update_user_course()
    {
        $userCourse = UserCourse::factory()->create();
        $editedUserCourse = UserCourse::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/user_courses/'.$userCourse->id,
            $editedUserCourse
        );

        $this->assertApiResponse($editedUserCourse);
    }

    /**
     * @test
     */
    public function test_delete_user_course()
    {
        $userCourse = UserCourse::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/user_courses/'.$userCourse->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/user_courses/'.$userCourse->id
        );

        $this->response->assertStatus(404);
    }
}
