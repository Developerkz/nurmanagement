<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];
    protected $table = 'roles';

    public const ADMIN_ID = 1;
    public const EMPLOYEE_ID = 2;
    public const CLIENT_ID = 3;

    public function users(){
        return $this->hasMany('App\User');
    }
}
