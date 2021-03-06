<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/products', ['as' => 'product.index', 'uses' => 'Api\ItemController@index']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.')->group(function () {
    Route::get('/templates/template/calendar/{id}', ['as' => 'template.details', 'uses' => 'Api\TaskController@details'])->where('id', '[0-9]+');
});
