<?php namespace Tests\Repositories;

use App\Models\Club;
use App\Repositories\ClubRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ClubRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ClubRepository
     */
    protected $clubRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->clubRepo = \App::make(ClubRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_club()
    {
        $club = Club::factory()->make()->toArray();

        $createdClub = $this->clubRepo->create($club);

        $createdClub = $createdClub->toArray();
        $this->assertArrayHasKey('id', $createdClub);
        $this->assertNotNull($createdClub['id'], 'Created Club must have id specified');
        $this->assertNotNull(Club::find($createdClub['id']), 'Club with given id must be in DB');
        $this->assertModelData($club, $createdClub);
    }

    /**
     * @test read
     */
    public function test_read_club()
    {
        $club = Club::factory()->create();

        $dbClub = $this->clubRepo->find($club->id);

        $dbClub = $dbClub->toArray();
        $this->assertModelData($club->toArray(), $dbClub);
    }

    /**
     * @test update
     */
    public function test_update_club()
    {
        $club = Club::factory()->create();
        $fakeClub = Club::factory()->make()->toArray();

        $updatedClub = $this->clubRepo->update($fakeClub, $club->id);

        $this->assertModelData($fakeClub, $updatedClub->toArray());
        $dbClub = $this->clubRepo->find($club->id);
        $this->assertModelData($fakeClub, $dbClub->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_club()
    {
        $club = Club::factory()->create();

        $resp = $this->clubRepo->delete($club->id);

        $this->assertTrue($resp);
        $this->assertNull(Club::find($club->id), 'Club should not exist in DB');
    }
}
