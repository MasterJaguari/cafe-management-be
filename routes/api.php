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
//Zasticene rute
Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::post('/logout', 'App\Http\Controllers\AuthController@logout');
});

Route::post('/meni/create', 'App\Http\Controllers\MeniController@addProduct');

//Meni rute
Route::get('/meni', 'App\Http\Controllers\MeniController@allProducts');
Route::get('/meni/{id}', 'App\Http\Controllers\MeniController@getOneProduct');
Route::delete('/meni/delete/{id}', 'App\Http\Controllers\MeniController@removeProduct');
Route::put('/meni/update/{id}', 'App\Http\Controllers\MeniController@updateProduct');


//Stolovi rute
Route::get('/stolovi', 'App\Http\Controllers\StoloviController@allTables');
Route::get('/stolovi/{id}', 'App\Http\Controllers\StoloviController@oneTable');
Route::post('/stolovi/create', 'App\Http\Controllers\StoloviController@addTable');
Route::put('/stolovi/update/{id}', 'App\Http\Controllers\StoloviController@updateTable');
Route::delete('/stolovi/delete/{id}', 'App\Http\Controllers\StoloviController@removeTable');


//Auth rute
Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/login', 'App\Http\Controllers\AuthController@login');


//User rute
Route::get('/korisnici', 'App\Http\Controllers\UsersController@getAllUsers');
Route::get('/korisnici/{id}', 'App\Http\Controllers\UsersController@getOneUser');
Route::post('/korisnici/create', 'App\Http\Controllers\UsersController@createUser');
Route::put('/korisnici/update/{id}', 'App\Http\Controllers\UsersController@updateUser');
Route::delete('/korisnici/delete/{id}', 'App\Http\Controllers\UsersController@deleteUser');
