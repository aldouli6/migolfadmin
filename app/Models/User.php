<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, HasApiTokens;

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
        'alias' => 'required|max:10',
        'phone' => 'required|unique:users',
        'email' => 'required|email|unique:users',
        'lastname' => 'required',
        'name' => 'required',
        'alias' => 'required|unique:users',
    ];

}
