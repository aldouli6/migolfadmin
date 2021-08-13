<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CourseTeeDefault
 * @package App\Models
 * @version August 13, 2021, 5:03 pm UTC
 *
 * @property integer $course_id
 * @property string $gender
 * @property integer $tee_id
 */
class CourseTeeDefault extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'course_tee_defaults';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'course_id',
        'gender',
        'tee_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'course_id' => 'integer',
        'gender' => 'string',
        'tee_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'course_id' => 'required',
        'gender' => 'required',
        'tee_id' => 'required'
    ];

    
}
