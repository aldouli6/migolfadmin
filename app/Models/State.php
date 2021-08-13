<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class State
 * @package App\Models
 * @version August 13, 2021, 4:00 pm UTC
 *
 * @property integer $country_id
 * @property string $code
 * @property string $name
 */
class State extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'states';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'country_id',
        'code',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'country_id' => 'integer',
        'code' => 'string',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'country_id' => 'required'
    ];

    
}
