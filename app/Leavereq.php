<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leavereq extends Model
{
    protected $fillable = [
        'user_name','user_id', 'user_company', 'status', 'date_from', 'date_to','reason','comment','admin_cm',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
