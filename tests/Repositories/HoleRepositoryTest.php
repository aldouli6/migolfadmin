<?php namespace Tests\Repositories;

use App\Models\Hole;
use App\Repositories\HoleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class HoleRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var HoleRepository
     */
    protected $holeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->holeRepo = \App::make(HoleRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_hole()
    {
        $hole = Hole::factory()->make()->toArray();

        $createdHole = $this->holeRepo->create($hole);

        $createdHole = $createdHole->toArray();
        $this->assertArrayHasKey('id', $createdHole);
        $this->assertNotNull($createdHole['id'], 'Created Hole must have id specified');
        $this->assertNotNull(Hole::find($createdHole['id']), 'Hole with given id must be in DB');
        $this->assertModelData($hole, $createdHole);
    }

    /**
     * @test read
     */
    public function test_read_hole()
    {
        $hole = Hole::factory()->create();

        $dbHole = $this->holeRepo->find($hole->id);

        $dbHole = $dbHole->toArray();
        $this->assertModelData($hole->toArray(), $dbHole);
    }

    /**
     * @test update
     */
    public function test_update_hole()
    {
        $hole = Hole::factory()->create();
        $fakeHole = Hole::factory()->make()->toArray();

        $updatedHole = $this->holeRepo->update($fakeHole, $hole->id);

        $this->assertModelData($fakeHole, $updatedHole->toArray());
        $dbHole = $this->holeRepo->find($hole->id);
        $this->assertModelData($fakeHole, $dbHole->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_hole()
    {
        $hole = Hole::factory()->create();

        $resp = $this->holeRepo->delete($hole->id);

        $this->assertTrue($resp);
        $this->assertNull(Hole::find($hole->id), 'Hole should not exist in DB');
    }
}
