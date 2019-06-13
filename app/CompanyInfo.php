<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{

    protected $fillable = ['name' ,'title' ,'company_type_id'];


    public function companyType() {
        return $this->belongsTo(CompanyType::class,'company_type_id');
    }
}
