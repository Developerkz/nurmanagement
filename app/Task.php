<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    public static $validates = [
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'name' => 'required|max:255',
        'description' => 'required',
        'template_id' => 'required|numeric|exists:templates,id',
    ];

    protected $fillable = [
        'start_date',
        'end_date',
        'name',
        'description',
        'template_id'
    ];

    public function template()
    {
        return $this->belongsTo(Template::class, 'template_id');
    }


    public function dateToNumber($date){
        $date = \DateTime::createFromFormat('Y-m-d', $date);
        return $date->format('z');
    }

    public function numberToDate($number){
        $date = \DateTime::createFromFormat('z', $number);
        return $date->format('Y-m-d');
    }
}
