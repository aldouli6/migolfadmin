<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UserHandicapIndex
 * @package App\Models
 * @version August 16, 2021, 4:00 pm UTC
 *
 * @property integer $player_id
 * @property number $handicap_index
 * @property number $ghin
 */
class UserHandicapIndex extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'user_handicap_indices';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'player_id',
        'handicap_index',
        'date_handicap_index',
        'ghin'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'player_id' => 'integer',
        'handicap_index' => 'double',
        'date_handicap_index' => 'datetime',
        'ghin' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'player_id' => 'required'
    ];
    public static $rulesUpdate = [
        'player_id' => ''
    ];

    
}
