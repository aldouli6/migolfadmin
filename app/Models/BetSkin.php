<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class BetSkin
 * @package App\Models
 * @version October 8, 2021, 5:45 pm UTC
 *
 * @property integer $bet_id
 * @property boolean $enabled
 * @property number $bet
 * @property string $ventaja
 */
class BetSkin extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'bet_skins';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'bet_id',
        'enabled',
        'bet',
        'ventaja'
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
        'bet' => 'double',
        'ventaja' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'bet_id' => 'required',
        'bet' => 'required_if:enabled,1',
        'ventaja' => 'required_if:enabled,1'
    ];

    
}
