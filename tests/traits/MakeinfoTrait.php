<?php

use Faker\Factory as Faker;
use App\Models\info;
use App\Repositories\infoRepository;

trait MakeinfoTrait
{
    /**
     * Create fake instance of info and save it in database
     *
     * @param array $infoFields
     * @return info
     */
    public function makeinfo($infoFields = [])
    {
        /** @var infoRepository $infoRepo */
        $infoRepo = App::make(infoRepository::class);
        $theme = $this->fakeinfoData($infoFields);
        return $infoRepo->create($theme);
    }

    /**
     * Get fake instance of info
     *
     * @param array $infoFields
     * @return info
     */
    public function fakeinfo($infoFields = [])
    {
        return new info($this->fakeinfoData($infoFields));
    }

    /**
     * Get fake data of info
     *
     * @param array $postFields
     * @return array
     */
    public function fakeinfoData($infoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'phone' => $fake->word,
            'phone2' => $fake->word,
            'email' => $fake->word,
            'address' => $fake->word,
            'city' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $infoFields);
    }
}
