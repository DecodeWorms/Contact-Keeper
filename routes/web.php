<?php

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

Route::view('/show','create');
Route::post('/create','UserController@create');
Route::get('/contacts','UserController@getAllContacts');
Route::get('/contact/{id}','UserController@getContact');
Route::get('/delete/{id}','UserController@delete');
