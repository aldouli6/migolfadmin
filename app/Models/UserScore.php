<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UserScore
 * @package App\Models
 * @version August 13, 2021, 5:54 pm UTC
 *
 * @property integer $player_id
 * @property string $hole_raiting_type
 * @property string $hole_raitinig
 * @property number $handicap_index
 * @property number $ghin
 */
class UserScore extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'user_scores';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'player_id',
        'hole_raiting_type',
        'hole_raitinig',
        'handicap_index',
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
        'hole_raiting_type' => 'string',
        'hole_raitinig' => 'string',
        'date_hole_raiting' => 'date',
        'handicap_index' => 'double',
        'date_handicap_index' => 'date',
        'ghin' => 'double'
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

    
}
