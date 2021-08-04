<?php namespace Tests\Repositories;

use App\Models\Start;
use App\Repositories\StartRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class StartRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var StartRepository
     */
    protected $startRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->startRepo = \App::make(StartRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_start()
    {
        $start = Start::factory()->make()->toArray();

        $createdStart = $this->startRepo->create($start);

        $createdStart = $createdStart->toArray();
        $this->assertArrayHasKey('id', $createdStart);
        $this->assertNotNull($createdStart['id'], 'Created Start must have id specified');
        $this->assertNotNull(Start::find($createdStart['id']), 'Start with given id must be in DB');
        $this->assertModelData($start, $createdStart);
    }

    /**
     * @test read
     */
    public function test_read_start()
    {
        $start = Start::factory()->create();

        $dbStart = $this->startRepo->find($start->id);

        $dbStart = $dbStart->toArray();
        $this->assertModelData($start->toArray(), $dbStart);
    }

    /**
     * @test update
     */
    public function test_update_start()
    {
        $start = Start::factory()->create();
        $fakeStart = Start::factory()->make()->toArray();

        $updatedStart = $this->startRepo->update($fakeStart, $start->id);

        $this->assertModelData($fakeStart, $updatedStart->toArray());
        $dbStart = $this->startRepo->find($start->id);
        $this->assertModelData($fakeStart, $dbStart->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_start()
    {
        $start = Start::factory()->create();

        $resp = $this->startRepo->delete($start->id);

        $this->assertTrue($resp);
        $this->assertNull(Start::find($start->id), 'Start should not exist in DB');
    }
}
