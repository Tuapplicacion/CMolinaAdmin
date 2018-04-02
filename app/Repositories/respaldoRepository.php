<?php

namespace App\Repositories;

use App\Models\respaldo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class respaldoRepository
 * @package App\Repositories
 * @version April 2, 2018, 5:00 pm UTC
 *
 * @method respaldo findWithoutFail($id, $columns = ['*'])
 * @method respaldo find($id, $columns = ['*'])
 * @method respaldo first($columns = ['*'])
*/
class respaldoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'text'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return respaldo::class;
    }
}
