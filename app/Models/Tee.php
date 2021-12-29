<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Tee
 * @package App\Models
 * @version November 9, 2021, 7:43 pm UTC
 *
 * @property boolean $enabled
 * @property boolean $default
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
        'default',
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
        'default' => 'boolean',
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

    public function tee_color()
    {
        return $this->hasOne(Teecolor::class,'id');
    }
        
}
