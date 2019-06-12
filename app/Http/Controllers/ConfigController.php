<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ConfigController extends Controller
{


    public function migrate(Request $request)
    {
        if($request->token == 'kasya'){
            return Artisan::call('migrate:refresh');
        }else{
            return 'fail';
        }

    }


    public function seed(Request $request)
    {
        if($request->token == 'kasya'){
            return Artisan::call('db:seed');
        }else{
            return 'fail';
        }
    }


}
