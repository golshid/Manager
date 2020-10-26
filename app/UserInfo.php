<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    public $table = "usersinfo";

    protected $fillable = [
        'user_id', 'company_id', 'birthdate', 'first_name', 'last_name',
        'gender', 'street', 'city', 'province', 'country', 'postal_code',
        'pay_rate','currency', 'per', 'pay_type', 'work_phone', 'mobile',
        'home_phone','primary_email', 'hire_date', 'job_title', 'reports_to',
        'employment_status', 
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
