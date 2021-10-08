<?php namespace Tests\Repositories;

use App\Models\Bet;
use App\Repositories\BetRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BetRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BetRepository
     */
    protected $betRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->betRepo = \App::make(BetRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bet()
    {
        $bet = Bet::factory()->make()->toArray();

        $createdBet = $this->betRepo->create($bet);

        $createdBet = $createdBet->toArray();
        $this->assertArrayHasKey('id', $createdBet);
        $this->assertNotNull($createdBet['id'], 'Created Bet must have id specified');
        $this->assertNotNull(Bet::find($createdBet['id']), 'Bet with given id must be in DB');
        $this->assertModelData($bet, $createdBet);
    }

    /**
     * @test read
     */
    public function test_read_bet()
    {
        $bet = Bet::factory()->create();

        $dbBet = $this->betRepo->find($bet->id);

        $dbBet = $dbBet->toArray();
        $this->assertModelData($bet->toArray(), $dbBet);
    }

    /**
     * @test update
     */
    public function test_update_bet()
    {
        $bet = Bet::factory()->create();
        $fakeBet = Bet::factory()->make()->toArray();

        $updatedBet = $this->betRepo->update($fakeBet, $bet->id);

        $this->assertModelData($fakeBet, $updatedBet->toArray());
        $dbBet = $this->betRepo->find($bet->id);
        $this->assertModelData($fakeBet, $dbBet->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bet()
    {
        $bet = Bet::factory()->create();

        $resp = $this->betRepo->delete($bet->id);

        $this->assertTrue($resp);
        $this->assertNull(Bet::find($bet->id), 'Bet should not exist in DB');
    }
}
