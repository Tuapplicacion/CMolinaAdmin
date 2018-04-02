<?php

use App\Models\respaldo;
use App\Repositories\respaldoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class respaldoRepositoryTest extends TestCase
{
    use MakerespaldoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var respaldoRepository
     */
    protected $respaldoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->respaldoRepo = App::make(respaldoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreaterespaldo()
    {
        $respaldo = $this->fakerespaldoData();
        $createdrespaldo = $this->respaldoRepo->create($respaldo);
        $createdrespaldo = $createdrespaldo->toArray();
        $this->assertArrayHasKey('id', $createdrespaldo);
        $this->assertNotNull($createdrespaldo['id'], 'Created respaldo must have id specified');
        $this->assertNotNull(respaldo::find($createdrespaldo['id']), 'respaldo with given id must be in DB');
        $this->assertModelData($respaldo, $createdrespaldo);
    }

    /**
     * @test read
     */
    public function testReadrespaldo()
    {
        $respaldo = $this->makerespaldo();
        $dbrespaldo = $this->respaldoRepo->find($respaldo->id);
        $dbrespaldo = $dbrespaldo->toArray();
        $this->assertModelData($respaldo->toArray(), $dbrespaldo);
    }

    /**
     * @test update
     */
    public function testUpdaterespaldo()
    {
        $respaldo = $this->makerespaldo();
        $fakerespaldo = $this->fakerespaldoData();
        $updatedrespaldo = $this->respaldoRepo->update($fakerespaldo, $respaldo->id);
        $this->assertModelData($fakerespaldo, $updatedrespaldo->toArray());
        $dbrespaldo = $this->respaldoRepo->find($respaldo->id);
        $this->assertModelData($fakerespaldo, $dbrespaldo->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleterespaldo()
    {
        $respaldo = $this->makerespaldo();
        $resp = $this->respaldoRepo->delete($respaldo->id);
        $this->assertTrue($resp);
        $this->assertNull(respaldo::find($respaldo->id), 'respaldo should not exist in DB');
    }
}
