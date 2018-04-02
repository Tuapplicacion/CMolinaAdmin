<?php

use Faker\Factory as Faker;
use App\Models\respaldo;
use App\Repositories\respaldoRepository;

trait MakerespaldoTrait
{
    /**
     * Create fake instance of respaldo and save it in database
     *
     * @param array $respaldoFields
     * @return respaldo
     */
    public function makerespaldo($respaldoFields = [])
    {
        /** @var respaldoRepository $respaldoRepo */
        $respaldoRepo = App::make(respaldoRepository::class);
        $theme = $this->fakerespaldoData($respaldoFields);
        return $respaldoRepo->create($theme);
    }

    /**
     * Get fake instance of respaldo
     *
     * @param array $respaldoFields
     * @return respaldo
     */
    public function fakerespaldo($respaldoFields = [])
    {
        return new respaldo($this->fakerespaldoData($respaldoFields));
    }

    /**
     * Get fake data of respaldo
     *
     * @param array $postFields
     * @return array
     */
    public function fakerespaldoData($respaldoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'text' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $respaldoFields);
    }
}
