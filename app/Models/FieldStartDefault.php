<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class FieldStartDefault
 * @package App\Models
 * @version August 7, 2021, 7:06 pm UTC
 *
 * @property integer $field_id
 * @property string $gender
 * @property integer $start_id
 */
class FieldStartDefault extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'field_start_defaults';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'field_id',
        'gender',
        'start_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'field_id' => 'integer',
        'gender' => 'string',
        'start_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'field_id' => 'required',
        'gender' => 'required',
        'start_id' => 'required'
    ];

    
}
