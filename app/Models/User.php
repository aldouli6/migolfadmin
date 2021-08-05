<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'enabled',
        'email',
        'password',
        'alias',
        'lastname',
        'gender',
        'country_id',
        'state_id',
        'phone',
        'frequency',
        'field_id',
        'start_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'country_id' => 'integer',
        'state_id' => 'integer',
        'field_id' => 'integer',
        'start_id' => 'integer',
        'email_verified_at' => 'datetime',
        'name' => 'string',
        'lastname' => 'string',
        'alias' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'country_id' => 'required',
        'gender' => 'required',
        'state_id' => 'required',
        'phone' => 'required|unique:users',
        'frecuency' => 'required',
        'email' => 'required|email|unique:users',
        'lastname' => 'required',
        'name' => 'required',
        'alias' => 'required|unique:users',
    ];

}
