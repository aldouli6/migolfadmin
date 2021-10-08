<?php namespace Tests\Repositories;

use App\Models\BetMatchIndividual;
use App\Repositories\BetMatchIndividualRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BetMatchIndividualRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BetMatchIndividualRepository
     */
    protected $betMatchIndividualRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->betMatchIndividualRepo = \App::make(BetMatchIndividualRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bet_match_individual()
    {
        $betMatchIndividual = BetMatchIndividual::factory()->make()->toArray();

        $createdBetMatchIndividual = $this->betMatchIndividualRepo->create($betMatchIndividual);

        $createdBetMatchIndividual = $createdBetMatchIndividual->toArray();
        $this->assertArrayHasKey('id', $createdBetMatchIndividual);
        $this->assertNotNull($createdBetMatchIndividual['id'], 'Created BetMatchIndividual must have id specified');
        $this->assertNotNull(BetMatchIndividual::find($createdBetMatchIndividual['id']), 'BetMatchIndividual with given id must be in DB');
        $this->assertModelData($betMatchIndividual, $createdBetMatchIndividual);
    }

    /**
     * @test read
     */
    public function test_read_bet_match_individual()
    {
        $betMatchIndividual = BetMatchIndividual::factory()->create();

        $dbBetMatchIndividual = $this->betMatchIndividualRepo->find($betMatchIndividual->id);

        $dbBetMatchIndividual = $dbBetMatchIndividual->toArray();
        $this->assertModelData($betMatchIndividual->toArray(), $dbBetMatchIndividual);
    }

    /**
     * @test update
     */
    public function test_update_bet_match_individual()
    {
        $betMatchIndividual = BetMatchIndividual::factory()->create();
        $fakeBetMatchIndividual = BetMatchIndividual::factory()->make()->toArray();

        $updatedBetMatchIndividual = $this->betMatchIndividualRepo->update($fakeBetMatchIndividual, $betMatchIndividual->id);

        $this->assertModelData($fakeBetMatchIndividual, $updatedBetMatchIndividual->toArray());
        $dbBetMatchIndividual = $this->betMatchIndividualRepo->find($betMatchIndividual->id);
        $this->assertModelData($fakeBetMatchIndividual, $dbBetMatchIndividual->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bet_match_individual()
    {
        $betMatchIndividual = BetMatchIndividual::factory()->create();

        $resp = $this->betMatchIndividualRepo->delete($betMatchIndividual->id);

        $this->assertTrue($resp);
        $this->assertNull(BetMatchIndividual::find($betMatchIndividual->id), 'BetMatchIndividual should not exist in DB');
    }
}
