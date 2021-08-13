<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Course
 * @package App\Models
 * @version August 13, 2021, 4:21 pm UTC
 *
 * @property string $description
 * @property string $alias
 * @property integer $club_id
 */
class Course extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'courses';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'description',
        'alias',
        'club_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'description' => 'string',
        'alias' => 'string',
        'club_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'alias' => 'required|max:10',
        'club_id' => 'required'
    ];

    
}
