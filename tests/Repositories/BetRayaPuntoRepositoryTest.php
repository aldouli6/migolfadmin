<?php namespace Tests\Repositories;

use App\Models\BetRayaPunto;
use App\Repositories\BetRayaPuntoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BetRayaPuntoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BetRayaPuntoRepository
     */
    protected $betRayaPuntoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->betRayaPuntoRepo = \App::make(BetRayaPuntoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bet_raya_punto()
    {
        $betRayaPunto = BetRayaPunto::factory()->make()->toArray();

        $createdBetRayaPunto = $this->betRayaPuntoRepo->create($betRayaPunto);

        $createdBetRayaPunto = $createdBetRayaPunto->toArray();
        $this->assertArrayHasKey('id', $createdBetRayaPunto);
        $this->assertNotNull($createdBetRayaPunto['id'], 'Created BetRayaPunto must have id specified');
        $this->assertNotNull(BetRayaPunto::find($createdBetRayaPunto['id']), 'BetRayaPunto with given id must be in DB');
        $this->assertModelData($betRayaPunto, $createdBetRayaPunto);
    }

    /**
     * @test read
     */
    public function test_read_bet_raya_punto()
    {
        $betRayaPunto = BetRayaPunto::factory()->create();

        $dbBetRayaPunto = $this->betRayaPuntoRepo->find($betRayaPunto->id);

        $dbBetRayaPunto = $dbBetRayaPunto->toArray();
        $this->assertModelData($betRayaPunto->toArray(), $dbBetRayaPunto);
    }

    /**
     * @test update
     */
    public function test_update_bet_raya_punto()
    {
        $betRayaPunto = BetRayaPunto::factory()->create();
        $fakeBetRayaPunto = BetRayaPunto::factory()->make()->toArray();

        $updatedBetRayaPunto = $this->betRayaPuntoRepo->update($fakeBetRayaPunto, $betRayaPunto->id);

        $this->assertModelData($fakeBetRayaPunto, $updatedBetRayaPunto->toArray());
        $dbBetRayaPunto = $this->betRayaPuntoRepo->find($betRayaPunto->id);
        $this->assertModelData($fakeBetRayaPunto, $dbBetRayaPunto->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bet_raya_punto()
    {
        $betRayaPunto = BetRayaPunto::factory()->create();

        $resp = $this->betRayaPuntoRepo->delete($betRayaPunto->id);

        $this->assertTrue($resp);
        $this->assertNull(BetRayaPunto::find($betRayaPunto->id), 'BetRayaPunto should not exist in DB');
    }
}
