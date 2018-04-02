<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class respaldoApiTest extends TestCase
{
    use MakerespaldoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreaterespaldo()
    {
        $respaldo = $this->fakerespaldoData();
        $this->json('POST', '/api/v1/respaldos', $respaldo);

        $this->assertApiResponse($respaldo);
    }

    /**
     * @test
     */
    public function testReadrespaldo()
    {
        $respaldo = $this->makerespaldo();
        $this->json('GET', '/api/v1/respaldos/'.$respaldo->id);

        $this->assertApiResponse($respaldo->toArray());
    }

    /**
     * @test
     */
    public function testUpdaterespaldo()
    {
        $respaldo = $this->makerespaldo();
        $editedrespaldo = $this->fakerespaldoData();

        $this->json('PUT', '/api/v1/respaldos/'.$respaldo->id, $editedrespaldo);

        $this->assertApiResponse($editedrespaldo);
    }

    /**
     * @test
     */
    public function testDeleterespaldo()
    {
        $respaldo = $this->makerespaldo();
        $this->json('DELETE', '/api/v1/respaldos/'.$respaldo->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/respaldos/'.$respaldo->id);

        $this->assertResponseStatus(404);
    }
}
