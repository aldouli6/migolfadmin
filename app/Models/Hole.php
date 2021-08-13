<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Hole
 * @package App\Models
 * @version August 13, 2021, 5:09 pm UTC
 *
 * @property integer $hole_number
 * @property integer $tee_id
 * @property integer $par
 * @property number $hole_raiting
 */
class Hole extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'holes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'hole_number',
        'tee_id',
        'par',
        'hole_raiting'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'hole_number' => 'integer',
        'tee_id' => 'integer',
        'par' => 'integer',
        'hole_raiting' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'hole_number' => 'required',
        'par' => 'required',
        'hole_raiting' => 'required'
    ];

    
}
