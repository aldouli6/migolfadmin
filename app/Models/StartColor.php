<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class StartColor
 * @package App\Models
 * @version August 3, 2021, 7:14 pm UTC
 *
 * @property string $name
 * @property string $icon
 * @property integer $leads
 */
class StartColor extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'start_colors';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'icon',
        'leads'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'icon' => 'string',
        'leads' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'icon' => 'required'
    ];

    
}
