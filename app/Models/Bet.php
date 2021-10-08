<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Bet
 * @package App\Models
 * @version October 7, 2021, 7:34 pm UTC
 *
 * @property integer $user_id
 * @property string $name
 * @property string $classification
 */
class Bet extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'bets';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'name',
        'classification'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'name' => 'string',
        'classification' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'name' => 'required',
        'classification' => 'required'
    ];

    
}
