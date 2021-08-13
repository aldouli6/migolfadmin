<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CourseTeeDefault;

class CourseTeeDefaultApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_course_tee_default()
    {
        $courseTeeDefault = CourseTeeDefault::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/course_tee_defaults', $courseTeeDefault
        );

        $this->assertApiResponse($courseTeeDefault);
    }

    /**
     * @test
     */
    public function test_read_course_tee_default()
    {
        $courseTeeDefault = CourseTeeDefault::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/course_tee_defaults/'.$courseTeeDefault->id
        );

        $this->assertApiResponse($courseTeeDefault->toArray());
    }

    /**
     * @test
     */
    public function test_update_course_tee_default()
    {
        $courseTeeDefault = CourseTeeDefault::factory()->create();
        $editedCourseTeeDefault = CourseTeeDefault::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/course_tee_defaults/'.$courseTeeDefault->id,
            $editedCourseTeeDefault
        );

        $this->assertApiResponse($editedCourseTeeDefault);
    }

    /**
     * @test
     */
    public function test_delete_course_tee_default()
    {
        $courseTeeDefault = CourseTeeDefault::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/course_tee_defaults/'.$courseTeeDefault->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/course_tee_defaults/'.$courseTeeDefault->id
        );

        $this->response->assertStatus(404);
    }
}
