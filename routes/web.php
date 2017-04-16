<?php

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
    $contact = '';
    return view('welcome' , compact('contact'));
});

Route::get('users', 'PageController@index');
Route::get('images', 'PageController@images');
Route::get('login' , 'PageController@loginPage');

Route::post('login' , 'LoginController@login');
Route::get('/logout' , 'LoginController@logout');
