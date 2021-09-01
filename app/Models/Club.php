<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Club
 * @package App\Models
 * @version August 23, 2021, 7:49 pm UTC
 *
 * @property boolean $enabled
 * @property string $name
 * @property integer $country_id
 * @property integer $state_id
 * @property string $city
 * @property string $email
 */
class Club extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'clubs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'enabled',
        'name',
        'country_id',
        'state_id',
        'city',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'enabled' => 'boolean',
        'name' => 'string',
        'country_id' => 'integer',
        'state_id' => 'integer',
        'city' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'country_id' => 'required',
        'state_id' => 'required',
        'city' => 'required'
    ];

    public function club()
    {
        return $this->hasOne(Club::class,'id');
    }
}
