<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyType extends Model
{
    protected $fillable = ['name'];

    public function companies()
    {
        return $this->hasMany(Company::class, 'company_id');
    }

}
