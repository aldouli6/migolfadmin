<?php namespace Tests\Repositories;

use App\Models\BetGreen;
use App\Repositories\BetGreenRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BetGreenRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BetGreenRepository
     */
    protected $betGreenRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->betGreenRepo = \App::make(BetGreenRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bet_green()
    {
        $betGreen = BetGreen::factory()->make()->toArray();

        $createdBetGreen = $this->betGreenRepo->create($betGreen);

        $createdBetGreen = $createdBetGreen->toArray();
        $this->assertArrayHasKey('id', $createdBetGreen);
        $this->assertNotNull($createdBetGreen['id'], 'Created BetGreen must have id specified');
        $this->assertNotNull(BetGreen::find($createdBetGreen['id']), 'BetGreen with given id must be in DB');
        $this->assertModelData($betGreen, $createdBetGreen);
    }

    /**
     * @test read
     */
    public function test_read_bet_green()
    {
        $betGreen = BetGreen::factory()->create();

        $dbBetGreen = $this->betGreenRepo->find($betGreen->id);

        $dbBetGreen = $dbBetGreen->toArray();
        $this->assertModelData($betGreen->toArray(), $dbBetGreen);
    }

    /**
     * @test update
     */
    public function test_update_bet_green()
    {
        $betGreen = BetGreen::factory()->create();
        $fakeBetGreen = BetGreen::factory()->make()->toArray();

        $updatedBetGreen = $this->betGreenRepo->update($fakeBetGreen, $betGreen->id);

        $this->assertModelData($fakeBetGreen, $updatedBetGreen->toArray());
        $dbBetGreen = $this->betGreenRepo->find($betGreen->id);
        $this->assertModelData($fakeBetGreen, $dbBetGreen->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bet_green()
    {
        $betGreen = BetGreen::factory()->create();

        $resp = $this->betGreenRepo->delete($betGreen->id);

        $this->assertTrue($resp);
        $this->assertNull(BetGreen::find($betGreen->id), 'BetGreen should not exist in DB');
    }
}
