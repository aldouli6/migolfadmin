<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UserPlayer
 * @package App\Models
 * @version August 13, 2021, 5:43 pm UTC
 *
 * @property integer $user_id
 * @property integer $player_id
 * @property string $frequency
 * @property integer $course_id
 * @property integer $tee_id
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
        'course_id',
        'tee_id'
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
        'course_id' => 'integer',
        'tee_id' => 'integer'
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
