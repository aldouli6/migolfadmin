<?php namespace Tests\Repositories;

use App\Models\UserCourse;
use App\Repositories\UserCourseRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UserCourseRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UserCourseRepository
     */
    protected $userCourseRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->userCourseRepo = \App::make(UserCourseRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_user_course()
    {
        $userCourse = UserCourse::factory()->make()->toArray();

        $createdUserCourse = $this->userCourseRepo->create($userCourse);

        $createdUserCourse = $createdUserCourse->toArray();
        $this->assertArrayHasKey('id', $createdUserCourse);
        $this->assertNotNull($createdUserCourse['id'], 'Created UserCourse must have id specified');
        $this->assertNotNull(UserCourse::find($createdUserCourse['id']), 'UserCourse with given id must be in DB');
        $this->assertModelData($userCourse, $createdUserCourse);
    }

    /**
     * @test read
     */
    public function test_read_user_course()
    {
        $userCourse = UserCourse::factory()->create();

        $dbUserCourse = $this->userCourseRepo->find($userCourse->id);

        $dbUserCourse = $dbUserCourse->toArray();
        $this->assertModelData($userCourse->toArray(), $dbUserCourse);
    }

    /**
     * @test update
     */
    public function test_update_user_course()
    {
        $userCourse = UserCourse::factory()->create();
        $fakeUserCourse = UserCourse::factory()->make()->toArray();

        $updatedUserCourse = $this->userCourseRepo->update($fakeUserCourse, $userCourse->id);

        $this->assertModelData($fakeUserCourse, $updatedUserCourse->toArray());
        $dbUserCourse = $this->userCourseRepo->find($userCourse->id);
        $this->assertModelData($fakeUserCourse, $dbUserCourse->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_user_course()
    {
        $userCourse = UserCourse::factory()->create();

        $resp = $this->userCourseRepo->delete($userCourse->id);

        $this->assertTrue($resp);
        $this->assertNull(UserCourse::find($userCourse->id), 'UserCourse should not exist in DB');
    }
}
