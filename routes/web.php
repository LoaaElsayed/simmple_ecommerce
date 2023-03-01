<?php

use App\Http\Controllers\ProductController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::prefix('/product')->group(function () {
    Route::get('/product/index', "ProductController@index")->name('proindex');
    Route::get('/product/add', "ProductController@create")->name('proadd');
    Route::post('/product/store', "ProductController@store")->name('prostore');
    Route::get("/product/show{id}", "ProductController@show")->name("proshow");
    Route::get('/product/edit{id}', "ProductController@edit")->name('proedit');
    Route::post('/product/update{id}', "ProductController@update")->name('proupdate');
    Route::get("/product/delete{id}", "ProductController@destroy")->name("prodestore")->middleware('auth');
// });



// route subproduct
// Route::prefix('/supproduct')->group(function () {
    Route::get('/supproduct/indexsub',"SupproductController@index")->name('subindex');
    Route::get('/supproduct/createsub',"SupproductController@create")->name('subcreate');
    Route::get("/supproduct/showsub{id}","SupproductController@show")->name("showw");
    Route::post('/supproduct/storesub',"SupproductController@store")->name('substore');
    Route::get('/supproduct/editsub{id}','SupproductController@edit')->name('subedit');
    Route::post('/supproduct/updatesub{id}','SupproductController@update')->name('subupdate');
    Route::get('/supproduct/destoresub{id}',"SupproductController@destroy")->name('subdestore')->middleware('auth');
    Route::get('/supproduct/search',"SupproductController@search")->name('subsearch');
// });

// route user
Route::get('/register','AuteController@registerform')->name('registget')->middleware('guest');
Route::post('/registerstore','AuteController@register')->name('registerstore');
Route::get('/login','AuteController@login')->name('login');
Route::post('/loginstore','AuteController@loginstore')->name('loginstore');
Route::get('/logout','AuteController@logout')->name('logout');


// route test admin

Route::get('/users','UseresController@index')->name('useresshow')->middleware(['auth','isadmin']);

