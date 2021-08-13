<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UserClub
 * @package App\Models
 * @version August 13, 2021, 5:14 pm UTC
 *
 * @property integer $user_id
 * @property integer $club_id
 * @property string $classification
 */
class UserClub extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'user_clubs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'club_id',
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
        'club_id' => 'integer',
        'classification' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'club_id' => 'required',
        'classification' => 'required'
    ];

    
}
