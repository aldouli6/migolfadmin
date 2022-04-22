<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Hole
 * @package App\Models
 * @version February 22, 2022, 6:53 pm UTC
 *
 * @property integer $hole_number
 * @property integer $course_id
 * @property integer $par
 * @property number $hole_raiting_male
 * @property number $hole_raiting_female
 */
class Hole extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'holes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'hole_number',
        'course_id',
        'par',
        'hole_raiting_male',
        'hole_raiting_female'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'hole_number' => 'integer',
        'course_id' => 'integer',
        'par' => 'integer',
        'hole_raiting_male' => 'double',
        'hole_raiting_female' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'hole_number' => 'required',
        'course_id' => 'required',
        'par' => 'required',
        'hole_raiting_male' => 'required',
        'hole_raiting_female' => 'required'
    ];

    
}
