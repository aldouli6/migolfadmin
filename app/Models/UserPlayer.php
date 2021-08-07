<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UserPlayer
 * @package App\Models
 * @version August 7, 2021, 8:25 pm UTC
 *
 * @property integer $user_id
 * @property integer $player_id
 * @property string $frequency
 * @property integer $field_id
 * @property integer $start_id
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
        'field_id',
        'start_id'
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
        'field_id' => 'integer',
        'start_id' => 'integer'
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

    
}
