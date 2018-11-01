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
    $data['users']= \App\User::orderBy('created_at','desc')->get();
    $data['results']= \App\Result::orderBy('created_at','desc')->get();
    return view('welcome',$data);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
