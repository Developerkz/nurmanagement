<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = ['name' ,'user_id' ,'company_type_id', 'registration_date','template_id'];

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function template() {
        return $this->belongsTo(Template::class,'template_id');
    }


    public function companyType() {
        return $this->belongsTo(CompanyType::class,'company_type_id');
    }
}
