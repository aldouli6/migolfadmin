<?php namespace Tests\Repositories;

use App\Models\Tee;
use App\Repositories\TeeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TeeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TeeRepository
     */
    protected $teeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->teeRepo = \App::make(TeeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tee()
    {
        $tee = Tee::factory()->make()->toArray();

        $createdTee = $this->teeRepo->create($tee);

        $createdTee = $createdTee->toArray();
        $this->assertArrayHasKey('id', $createdTee);
        $this->assertNotNull($createdTee['id'], 'Created Tee must have id specified');
        $this->assertNotNull(Tee::find($createdTee['id']), 'Tee with given id must be in DB');
        $this->assertModelData($tee, $createdTee);
    }

    /**
     * @test read
     */
    public function test_read_tee()
    {
        $tee = Tee::factory()->create();

        $dbTee = $this->teeRepo->find($tee->id);

        $dbTee = $dbTee->toArray();
        $this->assertModelData($tee->toArray(), $dbTee);
    }

    /**
     * @test update
     */
    public function test_update_tee()
    {
        $tee = Tee::factory()->create();
        $fakeTee = Tee::factory()->make()->toArray();

        $updatedTee = $this->teeRepo->update($fakeTee, $tee->id);

        $this->assertModelData($fakeTee, $updatedTee->toArray());
        $dbTee = $this->teeRepo->find($tee->id);
        $this->assertModelData($fakeTee, $dbTee->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tee()
    {
        $tee = Tee::factory()->create();

        $resp = $this->teeRepo->delete($tee->id);

        $this->assertTrue($resp);
        $this->assertNull(Tee::find($tee->id), 'Tee should not exist in DB');
    }
}
