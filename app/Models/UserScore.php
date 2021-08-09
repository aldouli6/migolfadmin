<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UserScore
 * @package App\Models
 * @version August 7, 2021, 9:46 pm UTC
 *
 * @property integer $player_id
 * @property string $lead_type
 * @property string $lead
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
        'lead_type',
        'lead',
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
        'lead_type' => 'string',
        'lead' => 'string',
        'date_lead' => 'date',
        'handicap_index' => 'double',
        'date_handicap_index' => 'date',
        'ghin' => 'double',
        'date_ghin' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'player_id' => 'required',
        'lead_type' => 'required'
    ];

    
}
