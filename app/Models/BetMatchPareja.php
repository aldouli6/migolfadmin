<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class BetMatchPareja
 * @package App\Models
 * @version October 8, 2021, 5:44 pm UTC
 *
 * @property integer $bet_id
 * @property boolean $enabled
 * @property number $bet1_9
 * @property number $bet10_18
 * @property number $bet_total
 * @property boolean $press
 * @property number $press_bet
 * @property string $press_every
 * @property boolean $carrry
 */
class BetMatchPareja extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'bet_match_parejas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'bet_id',
        'enabled',
        'bet1_9',
        'bet10_18',
        'bet_total',
        'press',
        'press_bet',
        'press_every',
        'carrry'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'bet_id' => 'integer',
        'enabled' => 'boolean',
        'bet1_9' => 'double',
        'bet10_18' => 'double',
        'bet_total' => 'double',
        'press' => 'boolean',
        'press_bet' => 'double',
        'press_every' => 'string',
        'carrry' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'bet_id' => 'required',
        'bet1_9' => 'required_if:enabled,1',
        'bet10_18' => 'required_if:enabled,1',
        'bet_total' => 'required_if:enabled,1',
        'press_bet' => 'required_if:press,1',
        'press_every' => 'required_if:press,1'
    ];

    
}
