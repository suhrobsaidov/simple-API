<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/phone','PhonesController@index');
Route::put('/phone/store','PhonesController@store');
Route::delete('/phone/delete/{id}','PhonesController@destroy');
Route::put('/phone/update/{id}' , 'PhonesController@update');
