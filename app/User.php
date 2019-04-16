<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone_no', 'address', 'city', 'state', 'zip_codes'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'access_token'
    ];

    public function mobilenumbers()
    {
            // return $this->hasMany('App\Mobilenumber','user_id', 'id');
            return $this->hasMany('App\Mobilenumber', 'user_id', 'id');
    }

    public function product()
    {
        return $this->hasMany('App\Product');
    }

    public function post()
    {
        return $this->hasMany('App\Post');
    }
}
