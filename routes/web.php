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
//Route::get('/', function () {
    //return view('welcome');
//});
//Homepage
Route::get('/', 'Guest\BooleatController@index')->name('guest.index');

Auth::routes();

Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware('auth')->group(function () {
   Route::resource('plates', 'PlateController');
});

Route::get('/home', 'HomeController@index')->name('home');


