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
        'first_name','last_name', 'email', 'password', 'phone_number','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function companies()
    {
        return $this->hasOne(Company::class, 'user_id');
    }

    public function isAdmin(){
        return $this->role_id == Role::ADMIN_ID;
    }

    public function isEmployee(){
        return $this->role_id == Role::EMPLOYEE_ID;
    }

    public function isClient(){
        return $this->role_id == Role::CLIENT_ID;
    }
}
