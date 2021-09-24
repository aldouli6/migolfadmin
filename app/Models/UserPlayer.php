<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UserPlayer
 * @package App\Models
 * @version September 20, 2021, 5:34 pm UTC
 *
 * @property integer $user_id
 * @property integer $player_id
 * @property string $frequency
 * @property integer $tee_color_id
 */
class UserPlayer extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'user_players';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'player_id',
        'frequency',
        'tee_color_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'player_id' => 'integer',
        'frequency' => 'string',
        'tee_color_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'player_id' => 'required',
        'frequency' => 'required'
    ];
    public static $rulesUpdate = [
        // 'user_id' => 'required',
        // 'player_id' => 'required',
        'frequency' => 'required'
    ];

    
}
