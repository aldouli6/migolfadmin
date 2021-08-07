<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Hole
 * @package App\Models
 * @version August 7, 2021, 6:57 pm UTC
 *
 * @property integer $hole_number
 * @property integer $start_id
 * @property integer $par
 * @property integer $lead
 */
class Hole extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'holes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'hole_number',
        'start_id',
        'par',
        'lead'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'hole_number' => 'integer',
        'start_id' => 'integer',
        'par' => 'integer',
        'lead' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'hole_number' => 'required',
        'par' => 'required',
        'lead' => 'required'
    ];

    
}
