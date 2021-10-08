<?php namespace Tests\Repositories;

use App\Models\BetMatchPareja;
use App\Repositories\BetMatchParejaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BetMatchParejaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BetMatchParejaRepository
     */
    protected $betMatchParejaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->betMatchParejaRepo = \App::make(BetMatchParejaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bet_match_pareja()
    {
        $betMatchPareja = BetMatchPareja::factory()->make()->toArray();

        $createdBetMatchPareja = $this->betMatchParejaRepo->create($betMatchPareja);

        $createdBetMatchPareja = $createdBetMatchPareja->toArray();
        $this->assertArrayHasKey('id', $createdBetMatchPareja);
        $this->assertNotNull($createdBetMatchPareja['id'], 'Created BetMatchPareja must have id specified');
        $this->assertNotNull(BetMatchPareja::find($createdBetMatchPareja['id']), 'BetMatchPareja with given id must be in DB');
        $this->assertModelData($betMatchPareja, $createdBetMatchPareja);
    }

    /**
     * @test read
     */
    public function test_read_bet_match_pareja()
    {
        $betMatchPareja = BetMatchPareja::factory()->create();

        $dbBetMatchPareja = $this->betMatchParejaRepo->find($betMatchPareja->id);

        $dbBetMatchPareja = $dbBetMatchPareja->toArray();
        $this->assertModelData($betMatchPareja->toArray(), $dbBetMatchPareja);
    }

    /**
     * @test update
     */
    public function test_update_bet_match_pareja()
    {
        $betMatchPareja = BetMatchPareja::factory()->create();
        $fakeBetMatchPareja = BetMatchPareja::factory()->make()->toArray();

        $updatedBetMatchPareja = $this->betMatchParejaRepo->update($fakeBetMatchPareja, $betMatchPareja->id);

        $this->assertModelData($fakeBetMatchPareja, $updatedBetMatchPareja->toArray());
        $dbBetMatchPareja = $this->betMatchParejaRepo->find($betMatchPareja->id);
        $this->assertModelData($fakeBetMatchPareja, $dbBetMatchPareja->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bet_match_pareja()
    {
        $betMatchPareja = BetMatchPareja::factory()->create();

        $resp = $this->betMatchParejaRepo->delete($betMatchPareja->id);

        $this->assertTrue($resp);
        $this->assertNull(BetMatchPareja::find($betMatchPareja->id), 'BetMatchPareja should not exist in DB');
    }
}
