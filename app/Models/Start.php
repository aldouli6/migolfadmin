<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Start
 * @package App\Models
 * @version August 3, 2021, 7:28 pm UTC
 *
 * @property integer $field_id
 * @property string $gender
 * @property boolean $default
 * @property integer $startcolor_id
 * @property number $slope
 * @property number $rating
 * @property integer $par
 */
class Start extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'starts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'field_id',
        'gender',
        'default',
        'startcolor_id',
        'slope',
        'rating',
        'par'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'field_id' => 'integer',
        'gender' => 'string',
        'default' => 'boolean',
        'startcolor_id' => 'integer',
        'slope' => 'double',
        'rating' => 'double',
        'par' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'field_id' => 'required',
        'gender' => 'required',
        'startcolor_id' => 'required'
    ];

    
}
