<?php

namespace App\Repositories;

use App\Models\info;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class infoRepository
 * @package App\Repositories
 * @version April 2, 2018, 5:01 pm UTC
 *
 * @method info findWithoutFail($id, $columns = ['*'])
 * @method info find($id, $columns = ['*'])
 * @method info first($columns = ['*'])
*/
class infoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'phone',
        'phone2',
        'email',
        'address',
        'city'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return info::class;
    }
}
