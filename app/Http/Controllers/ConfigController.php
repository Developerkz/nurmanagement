<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ConfigController extends Controller
{


    public function migrate()
    {
        Artisan::call('migrate', array('--path' => 'app/migrations', '--force' => true));
    }



}
