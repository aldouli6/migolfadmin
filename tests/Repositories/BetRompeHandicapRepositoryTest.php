<?php namespace Tests\Repositories;

use App\Models\BetRompeHandicap;
use App\Repositories\BetRompeHandicapRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BetRompeHandicapRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BetRompeHandicapRepository
     */
    protected $betRompeHandicapRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->betRompeHandicapRepo = \App::make(BetRompeHandicapRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bet_rompe_handicap()
    {
        $betRompeHandicap = BetRompeHandicap::factory()->make()->toArray();

        $createdBetRompeHandicap = $this->betRompeHandicapRepo->create($betRompeHandicap);

        $createdBetRompeHandicap = $createdBetRompeHandicap->toArray();
        $this->assertArrayHasKey('id', $createdBetRompeHandicap);
        $this->assertNotNull($createdBetRompeHandicap['id'], 'Created BetRompeHandicap must have id specified');
        $this->assertNotNull(BetRompeHandicap::find($createdBetRompeHandicap['id']), 'BetRompeHandicap with given id must be in DB');
        $this->assertModelData($betRompeHandicap, $createdBetRompeHandicap);
    }

    /**
     * @test read
     */
    public function test_read_bet_rompe_handicap()
    {
        $betRompeHandicap = BetRompeHandicap::factory()->create();

        $dbBetRompeHandicap = $this->betRompeHandicapRepo->find($betRompeHandicap->id);

        $dbBetRompeHandicap = $dbBetRompeHandicap->toArray();
        $this->assertModelData($betRompeHandicap->toArray(), $dbBetRompeHandicap);
    }

    /**
     * @test update
     */
    public function test_update_bet_rompe_handicap()
    {
        $betRompeHandicap = BetRompeHandicap::factory()->create();
        $fakeBetRompeHandicap = BetRompeHandicap::factory()->make()->toArray();

        $updatedBetRompeHandicap = $this->betRompeHandicapRepo->update($fakeBetRompeHandicap, $betRompeHandicap->id);

        $this->assertModelData($fakeBetRompeHandicap, $updatedBetRompeHandicap->toArray());
        $dbBetRompeHandicap = $this->betRompeHandicapRepo->find($betRompeHandicap->id);
        $this->assertModelData($fakeBetRompeHandicap, $dbBetRompeHandicap->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bet_rompe_handicap()
    {
        $betRompeHandicap = BetRompeHandicap::factory()->create();

        $resp = $this->betRompeHandicapRepo->delete($betRompeHandicap->id);

        $this->assertTrue($resp);
        $this->assertNull(BetRompeHandicap::find($betRompeHandicap->id), 'BetRompeHandicap should not exist in DB');
    }
}
