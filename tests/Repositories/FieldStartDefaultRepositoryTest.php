<?php namespace Tests\Repositories;

use App\Models\FieldStartDefault;
use App\Repositories\FieldStartDefaultRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FieldStartDefaultRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FieldStartDefaultRepository
     */
    protected $fieldStartDefaultRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->fieldStartDefaultRepo = \App::make(FieldStartDefaultRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_field_start_default()
    {
        $fieldStartDefault = FieldStartDefault::factory()->make()->toArray();

        $createdFieldStartDefault = $this->fieldStartDefaultRepo->create($fieldStartDefault);

        $createdFieldStartDefault = $createdFieldStartDefault->toArray();
        $this->assertArrayHasKey('id', $createdFieldStartDefault);
        $this->assertNotNull($createdFieldStartDefault['id'], 'Created FieldStartDefault must have id specified');
        $this->assertNotNull(FieldStartDefault::find($createdFieldStartDefault['id']), 'FieldStartDefault with given id must be in DB');
        $this->assertModelData($fieldStartDefault, $createdFieldStartDefault);
    }

    /**
     * @test read
     */
    public function test_read_field_start_default()
    {
        $fieldStartDefault = FieldStartDefault::factory()->create();

        $dbFieldStartDefault = $this->fieldStartDefaultRepo->find($fieldStartDefault->id);

        $dbFieldStartDefault = $dbFieldStartDefault->toArray();
        $this->assertModelData($fieldStartDefault->toArray(), $dbFieldStartDefault);
    }

    /**
     * @test update
     */
    public function test_update_field_start_default()
    {
        $fieldStartDefault = FieldStartDefault::factory()->create();
        $fakeFieldStartDefault = FieldStartDefault::factory()->make()->toArray();

        $updatedFieldStartDefault = $this->fieldStartDefaultRepo->update($fakeFieldStartDefault, $fieldStartDefault->id);

        $this->assertModelData($fakeFieldStartDefault, $updatedFieldStartDefault->toArray());
        $dbFieldStartDefault = $this->fieldStartDefaultRepo->find($fieldStartDefault->id);
        $this->assertModelData($fakeFieldStartDefault, $dbFieldStartDefault->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_field_start_default()
    {
        $fieldStartDefault = FieldStartDefault::factory()->create();

        $resp = $this->fieldStartDefaultRepo->delete($fieldStartDefault->id);

        $this->assertTrue($resp);
        $this->assertNull(FieldStartDefault::find($fieldStartDefault->id), 'FieldStartDefault should not exist in DB');
    }
}
