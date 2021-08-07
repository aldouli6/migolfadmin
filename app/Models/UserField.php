<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UserField
 * @package App\Models
 * @version August 7, 2021, 7:24 pm UTC
 *
 * @property integer $user_id
 * @property integer $field_id
 */
class UserField extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'user_fields';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'field_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'field_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'field_id' => 'required'
    ];

    
}
