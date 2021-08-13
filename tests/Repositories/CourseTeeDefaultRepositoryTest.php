<?php namespace Tests\Repositories;

use App\Models\CourseTeeDefault;
use App\Repositories\CourseTeeDefaultRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CourseTeeDefaultRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CourseTeeDefaultRepository
     */
    protected $courseTeeDefaultRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->courseTeeDefaultRepo = \App::make(CourseTeeDefaultRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_course_tee_default()
    {
        $courseTeeDefault = CourseTeeDefault::factory()->make()->toArray();

        $createdCourseTeeDefault = $this->courseTeeDefaultRepo->create($courseTeeDefault);

        $createdCourseTeeDefault = $createdCourseTeeDefault->toArray();
        $this->assertArrayHasKey('id', $createdCourseTeeDefault);
        $this->assertNotNull($createdCourseTeeDefault['id'], 'Created CourseTeeDefault must have id specified');
        $this->assertNotNull(CourseTeeDefault::find($createdCourseTeeDefault['id']), 'CourseTeeDefault with given id must be in DB');
        $this->assertModelData($courseTeeDefault, $createdCourseTeeDefault);
    }

    /**
     * @test read
     */
    public function test_read_course_tee_default()
    {
        $courseTeeDefault = CourseTeeDefault::factory()->create();

        $dbCourseTeeDefault = $this->courseTeeDefaultRepo->find($courseTeeDefault->id);

        $dbCourseTeeDefault = $dbCourseTeeDefault->toArray();
        $this->assertModelData($courseTeeDefault->toArray(), $dbCourseTeeDefault);
    }

    /**
     * @test update
     */
    public function test_update_course_tee_default()
    {
        $courseTeeDefault = CourseTeeDefault::factory()->create();
        $fakeCourseTeeDefault = CourseTeeDefault::factory()->make()->toArray();

        $updatedCourseTeeDefault = $this->courseTeeDefaultRepo->update($fakeCourseTeeDefault, $courseTeeDefault->id);

        $this->assertModelData($fakeCourseTeeDefault, $updatedCourseTeeDefault->toArray());
        $dbCourseTeeDefault = $this->courseTeeDefaultRepo->find($courseTeeDefault->id);
        $this->assertModelData($fakeCourseTeeDefault, $dbCourseTeeDefault->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_course_tee_default()
    {
        $courseTeeDefault = CourseTeeDefault::factory()->create();

        $resp = $this->courseTeeDefaultRepo->delete($courseTeeDefault->id);

        $this->assertTrue($resp);
        $this->assertNull(CourseTeeDefault::find($courseTeeDefault->id), 'CourseTeeDefault should not exist in DB');
    }
}
