<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Field
 * @package App\Models
 * @version August 3, 2021, 7:12 pm UTC
 *
 * @property string $description
 * @property string $alias
 * @property integer $club_id
 */
class Field extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'fields';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'description',
        'alias',
        'club_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'description' => 'string',
        'alias' => 'string',
        'club_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'alias' => 'required',
        'club_id' => 'required'
    ];

    
}
