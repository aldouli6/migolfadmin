<?php namespace Tests\Repositories;

use App\Models\BetSkin;
use App\Repositories\BetSkinRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BetSkinRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BetSkinRepository
     */
    protected $betSkinRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->betSkinRepo = \App::make(BetSkinRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bet_skin()
    {
        $betSkin = BetSkin::factory()->make()->toArray();

        $createdBetSkin = $this->betSkinRepo->create($betSkin);

        $createdBetSkin = $createdBetSkin->toArray();
        $this->assertArrayHasKey('id', $createdBetSkin);
        $this->assertNotNull($createdBetSkin['id'], 'Created BetSkin must have id specified');
        $this->assertNotNull(BetSkin::find($createdBetSkin['id']), 'BetSkin with given id must be in DB');
        $this->assertModelData($betSkin, $createdBetSkin);
    }

    /**
     * @test read
     */
    public function test_read_bet_skin()
    {
        $betSkin = BetSkin::factory()->create();

        $dbBetSkin = $this->betSkinRepo->find($betSkin->id);

        $dbBetSkin = $dbBetSkin->toArray();
        $this->assertModelData($betSkin->toArray(), $dbBetSkin);
    }

    /**
     * @test update
     */
    public function test_update_bet_skin()
    {
        $betSkin = BetSkin::factory()->create();
        $fakeBetSkin = BetSkin::factory()->make()->toArray();

        $updatedBetSkin = $this->betSkinRepo->update($fakeBetSkin, $betSkin->id);

        $this->assertModelData($fakeBetSkin, $updatedBetSkin->toArray());
        $dbBetSkin = $this->betSkinRepo->find($betSkin->id);
        $this->assertModelData($fakeBetSkin, $dbBetSkin->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bet_skin()
    {
        $betSkin = BetSkin::factory()->create();

        $resp = $this->betSkinRepo->delete($betSkin->id);

        $this->assertTrue($resp);
        $this->assertNull(BetSkin::find($betSkin->id), 'BetSkin should not exist in DB');
    }
}
