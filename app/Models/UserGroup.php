<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UserGroup
 * @package App\Models
 * @version September 24, 2021, 4:55 pm UTC
 *
 * @property integer $user_id
 * @property string $name
 * @property string $classification
 * @property string $players
 */
class UserGroup extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'user_groups';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'name',
        'classification',
        'players'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'name' => 'string',
        'classification' => 'string',
        'players' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'name' => 'required',
        'classification' => 'required',
        'players' => 'required'
    ];

    
}
