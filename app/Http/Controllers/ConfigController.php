<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ConfigController extends Controller
{


    public function migrate()
    {
        return Artisan::call('migrate:refresh');
    }


    public function seed()
    {
        return Artisan::call('db:seed');
    }


}
