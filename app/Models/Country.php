<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Country
 * @package App\Models
 * @version August 23, 2021, 7:45 pm UTC
 *
 * @property boolean $enabled
 * @property string $code
 * @property string $name
 */
class Country extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'countries';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'enabled',
        'code',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'enabled' => 'boolean',
        'code' => 'string',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
        'code' => 'required|unique:countries,code'
    ];

    
}
