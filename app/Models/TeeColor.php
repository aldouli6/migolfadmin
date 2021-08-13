<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TeeColor
 * @package App\Models
 * @version August 13, 2021, 4:37 pm UTC
 *
 * @property string $name
 * @property string $color
 */
class TeeColor extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'tee_colors';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'color'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'color' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'color' => 'required'
    ];

    
}
