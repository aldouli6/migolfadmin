<?php namespace Tests\Repositories;

use App\Models\BetMedalPlay;
use App\Repositories\BetMedalPlayRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BetMedalPlayRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BetMedalPlayRepository
     */
    protected $betMedalPlayRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->betMedalPlayRepo = \App::make(BetMedalPlayRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bet_medal_play()
    {
        $betMedalPlay = BetMedalPlay::factory()->make()->toArray();

        $createdBetMedalPlay = $this->betMedalPlayRepo->create($betMedalPlay);

        $createdBetMedalPlay = $createdBetMedalPlay->toArray();
        $this->assertArrayHasKey('id', $createdBetMedalPlay);
        $this->assertNotNull($createdBetMedalPlay['id'], 'Created BetMedalPlay must have id specified');
        $this->assertNotNull(BetMedalPlay::find($createdBetMedalPlay['id']), 'BetMedalPlay with given id must be in DB');
        $this->assertModelData($betMedalPlay, $createdBetMedalPlay);
    }

    /**
     * @test read
     */
    public function test_read_bet_medal_play()
    {
        $betMedalPlay = BetMedalPlay::factory()->create();

        $dbBetMedalPlay = $this->betMedalPlayRepo->find($betMedalPlay->id);

        $dbBetMedalPlay = $dbBetMedalPlay->toArray();
        $this->assertModelData($betMedalPlay->toArray(), $dbBetMedalPlay);
    }

    /**
     * @test update
     */
    public function test_update_bet_medal_play()
    {
        $betMedalPlay = BetMedalPlay::factory()->create();
        $fakeBetMedalPlay = BetMedalPlay::factory()->make()->toArray();

        $updatedBetMedalPlay = $this->betMedalPlayRepo->update($fakeBetMedalPlay, $betMedalPlay->id);

        $this->assertModelData($fakeBetMedalPlay, $updatedBetMedalPlay->toArray());
        $dbBetMedalPlay = $this->betMedalPlayRepo->find($betMedalPlay->id);
        $this->assertModelData($fakeBetMedalPlay, $dbBetMedalPlay->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bet_medal_play()
    {
        $betMedalPlay = BetMedalPlay::factory()->create();

        $resp = $this->betMedalPlayRepo->delete($betMedalPlay->id);

        $this->assertTrue($resp);
        $this->assertNull(BetMedalPlay::find($betMedalPlay->id), 'BetMedalPlay should not exist in DB');
    }
}
