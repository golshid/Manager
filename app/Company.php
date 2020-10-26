<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{

    protected $fillable = [
        'name','admin','slug',
    ];

    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function request()
    {
        return $this->hasMany('App\Requests');
    }

    public function report()
    {
        return $this->hasMany('App\Reports');
    }

    
    public function leavereq()
    {
        return $this->hasMany('App\Leavereq');
    }

    
}
