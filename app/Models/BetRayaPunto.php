<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class BetRayaPunto
 * @package App\Models
 * @version October 8, 2021, 5:45 pm UTC
 *
 * @property integer $bet_id
 * @property boolean $enabled
 * @property number $bet
 * @property number $birdie
 * @property number $aguila
 * @property number $albatros
 * @property number $hoyo_uno
 * @property number $exceso
 * @property string $mas_golpes
 * @property string $label1
 * @property number $value1
 * @property string $label2
 * @property number $value2
 * @property string $label3
 * @property number $value3
 * @property string $label4
 * @property number $value4
 */
class BetRayaPunto extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'bet_raya_puntos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'bet_id',
        'enabled',
        'bet',
        'birdie',
        'aguila',
        'albatros',
        'hoyo_uno',
        'exceso',
        'mas_golpes',
        'label1',
        'value1',
        'label2',
        'value2',
        'label3',
        'value3',
        'label4',
        'value4'
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
        'birdie' => 'double',
        'aguila' => 'double',
        'albatros' => 'double',
        'hoyo_uno' => 'double',
        'exceso' => 'double',
        'mas_golpes' => 'string',
        'label1' => 'string',
        'value1' => 'double',
        'label2' => 'string',
        'value2' => 'double',
        'label3' => 'string',
        'value3' => 'double',
        'label4' => 'string',
        'value4' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'bet_id' => 'required',
        'bet' => 'required_if:enabled,1',
        'birdie' => 'required_if:enabled,1',
        'aguila' => 'required_if:enabled,1',
        'albatros' => 'required_if:enabled,1',
        'hoyo_uno' => 'required_if:enabled,1',
        'exceso' => 'required_if:enabled,1',
        'mas_golpes' => 'required_if:enabled,1',
        'label1' => 'required_if:enabled,1',
        'value1' => 'required_if:enabled,1',
        'label2' => 'required_if:enabled,1',
        'value2' => 'required_if:enabled,1',
        'label3' => 'required_if:enabled,1',
        'value3' => 'required_if:enabled,1',
        'label4' => 'required_if:enabled,1',
        'value4' => 'required_if:enabled,1'
    ];

    
}
