<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    protected $fillable = [
        'user_id','user_name', 'date', 'title', 'content','user_company',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function file()
    {
        return $this->hasMany('App\File');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    
}
