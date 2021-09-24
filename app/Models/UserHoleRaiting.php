<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UserHoleRaiting
 * @package App\Models
 * @version August 16, 2021, 4:00 pm UTC
 *
 * @property integer $player_id
 * @property string $hole_raiting_type
 * @property string $hole_raitinig
 */
class UserHoleRaiting extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'user_hole_raitings';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'player_id',
        'hole_raiting_type',
        'hole_raitinig',
        'date_hole_raiting'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'player_id' => 'integer',
        'hole_raiting_type' => 'string',
        'hole_raitinig' => 'string',
        'date_hole_raiting' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'player_id' => 'required',
        'hole_raiting_type' => 'required'
    ];
    public static $rulesUpdate = [
        'hole_raiting_type' => 'required'
    ];

    
}
