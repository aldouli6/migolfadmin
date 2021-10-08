<?php namespace Tests\Repositories;

use App\Models\BetStableford;
use App\Repositories\BetStablefordRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BetStablefordRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BetStablefordRepository
     */
    protected $betStablefordRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->betStablefordRepo = \App::make(BetStablefordRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bet_stableford()
    {
        $betStableford = BetStableford::factory()->make()->toArray();

        $createdBetStableford = $this->betStablefordRepo->create($betStableford);

        $createdBetStableford = $createdBetStableford->toArray();
        $this->assertArrayHasKey('id', $createdBetStableford);
        $this->assertNotNull($createdBetStableford['id'], 'Created BetStableford must have id specified');
        $this->assertNotNull(BetStableford::find($createdBetStableford['id']), 'BetStableford with given id must be in DB');
        $this->assertModelData($betStableford, $createdBetStableford);
    }

    /**
     * @test read
     */
    public function test_read_bet_stableford()
    {
        $betStableford = BetStableford::factory()->create();

        $dbBetStableford = $this->betStablefordRepo->find($betStableford->id);

        $dbBetStableford = $dbBetStableford->toArray();
        $this->assertModelData($betStableford->toArray(), $dbBetStableford);
    }

    /**
     * @test update
     */
    public function test_update_bet_stableford()
    {
        $betStableford = BetStableford::factory()->create();
        $fakeBetStableford = BetStableford::factory()->make()->toArray();

        $updatedBetStableford = $this->betStablefordRepo->update($fakeBetStableford, $betStableford->id);

        $this->assertModelData($fakeBetStableford, $updatedBetStableford->toArray());
        $dbBetStableford = $this->betStablefordRepo->find($betStableford->id);
        $this->assertModelData($fakeBetStableford, $dbBetStableford->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bet_stableford()
    {
        $betStableford = BetStableford::factory()->create();

        $resp = $this->betStablefordRepo->delete($betStableford->id);

        $this->assertTrue($resp);
        $this->assertNull(BetStableford::find($betStableford->id), 'BetStableford should not exist in DB');
    }
}
