<?php

use App\Http\Controllers\ApiproductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// route product



Route::get('/pro','ApiproductController@index')->name('apilist');
Route::get('/showpro/{id}','ApiproductController@show')->name('apishow');
Route::post('/storepro','ApiproductController@store')->name('apistore')->middleware('api_auth');
Route::post('/updatepro/{id}','ApiproductController@update')->name('apiupdate')->middleware('api_auth');
Route::get('/deletepro/{id}','ApiproductController@delete')->name('apidestore')->middleware('api_auth');

// route auth
Route::post('/regis','ApiauthController@register')->name('apiregister');
Route::get('/logout','ApiauthController@logout')->name('apilogout')->middleware('api_auth');
Route::post('/login','ApiauthController@login')->name('apilogin');
