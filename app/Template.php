<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    use SoftDeletes;

    public static $validates = [
        'name' =>'required|max:255',
        'description'=> 'required',
    ];

    protected $fillable = [
        'name',
        'description'
    ];


    public function tasks()
    {
        return $this->hasMany(Task::class, 'template_id');
    }
}
