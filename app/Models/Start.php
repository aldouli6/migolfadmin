<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Start
 * @package App\Models
 * @version August 7, 2021, 6:42 pm UTC
 *
 * @property boolean $enabled
 * @property integer $field_id
 * @property string $gender
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
        'enabled',
        'field_id',
        'gender',
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
        'enabled' => 'boolean',
        'field_id' => 'integer',
        'gender' => 'string',
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
        'startcolor_id' => 'required',
        'slope' => 'required',
        'rating' => 'required',
        'par' => 'required'
    ];

    
}
