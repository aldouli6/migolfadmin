<?php namespace Tests\Repositories;

use App\Models\TeeColor;
use App\Repositories\TeeColorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TeeColorRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TeeColorRepository
     */
    protected $teeColorRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->teeColorRepo = \App::make(TeeColorRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tee_color()
    {
        $teeColor = TeeColor::factory()->make()->toArray();

        $createdTeeColor = $this->teeColorRepo->create($teeColor);

        $createdTeeColor = $createdTeeColor->toArray();
        $this->assertArrayHasKey('id', $createdTeeColor);
        $this->assertNotNull($createdTeeColor['id'], 'Created TeeColor must have id specified');
        $this->assertNotNull(TeeColor::find($createdTeeColor['id']), 'TeeColor with given id must be in DB');
        $this->assertModelData($teeColor, $createdTeeColor);
    }

    /**
     * @test read
     */
    public function test_read_tee_color()
    {
        $teeColor = TeeColor::factory()->create();

        $dbTeeColor = $this->teeColorRepo->find($teeColor->id);

        $dbTeeColor = $dbTeeColor->toArray();
        $this->assertModelData($teeColor->toArray(), $dbTeeColor);
    }

    /**
     * @test update
     */
    public function test_update_tee_color()
    {
        $teeColor = TeeColor::factory()->create();
        $fakeTeeColor = TeeColor::factory()->make()->toArray();

        $updatedTeeColor = $this->teeColorRepo->update($fakeTeeColor, $teeColor->id);

        $this->assertModelData($fakeTeeColor, $updatedTeeColor->toArray());
        $dbTeeColor = $this->teeColorRepo->find($teeColor->id);
        $this->assertModelData($fakeTeeColor, $dbTeeColor->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tee_color()
    {
        $teeColor = TeeColor::factory()->create();

        $resp = $this->teeColorRepo->delete($teeColor->id);

        $this->assertTrue($resp);
        $this->assertNull(TeeColor::find($teeColor->id), 'TeeColor should not exist in DB');
    }
}
