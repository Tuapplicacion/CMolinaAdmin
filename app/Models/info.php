<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class info
 * @package App\Models
 * @version April 2, 2018, 5:01 pm UTC
 *
 * @property string phone
 * @property string phone2
 * @property string email
 * @property string address
 * @property string city
 */
class info extends Model
{
    use SoftDeletes;

    public $table = 'info';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'phone',
        'phone2',
        'email',
        'address',
        'city'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'phone' => 'string',
        'phone2' => 'string',
        'email' => 'string',
        'address' => 'string',
        'city' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
