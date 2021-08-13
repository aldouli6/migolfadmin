<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Tee
 * @package App\Models
 * @version August 13, 2021, 4:40 pm UTC
 *
 * @property boolean $enabled
 * @property integer $course_id
 * @property string $gender
 * @property integer $teecolor_id
 * @property number $slope
 * @property number $rating
 */
class Tee extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'tees';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'enabled',
        'course_id',
        'gender',
        'teecolor_id',
        'slope',
        'rating'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'enabled' => 'boolean',
        'course_id' => 'integer',
        'gender' => 'string',
        'teecolor_id' => 'integer',
        'slope' => 'double',
        'rating' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'course_id' => 'required',
        'gender' => 'required',
        'teecolor_id' => 'required',
        'slope' => 'required',
        'rating' => 'required'
    ];

    
}
