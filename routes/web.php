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
use \Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Result;

Route::get('/', function () {
    $data['users']= User::orderBy('created_at','desc')->get();
    $data['results']= Result::orderBy('created_at','desc')->get();
    return view('welcome',$data);
});
Route::middleware(['auth'])->group(function () {
    Route::put('test', 'TestController@index');
    Route::post('test/submit','');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
