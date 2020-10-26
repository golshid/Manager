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
        'name', 'email', 'password','company','admin','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }


    public function requests()
    {
        return $this->hasMany('App\Requests');
    }

    public function reports()
    {
        return $this->hasMany('App\Reports');
    }

    public function userinfo()
    {
        return $this->belongsTo('App\UserInfo');
    }

    public function leavereq()
    {
        return $this->hasMany('App\Leavereq');
    }

    
}
