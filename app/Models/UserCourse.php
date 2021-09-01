<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UserCourse
 * @package App\Models
 * @version August 23, 2021, 7:58 pm UTC
 *
 * @property integer $user_id
 * @property integer $course_id
 * @property string $classification
 * @property integer $tee_default_male
 * @property integer $tee_default_female
 */
class UserCourse extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'user_courses';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'course_id',
        'classification',
        'tee_default_male',
        'tee_default_female'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'course_id' => 'integer',
        'classification' => 'string',
        'tee_default_male' => 'integer',
        'tee_default_female' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'course_id' => 'required',
        'classification' => 'required'
    ];

    
}
