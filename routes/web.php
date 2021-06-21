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
// Sezione pubblica
//Homepage 
Route::get('/', 'Guest\BooleatController@index')->name('guest.index');
Route::get('/show/{user}', 'Guest\BooleatController@show')->name('guest.show');
Route::get('/show/{user}/checkout', 'Guest\OrderController@formOrder')->name('guest.checkout');
Route::post('restaurant/checkout', 'Guest\OrderController@storePayment')->name('guest.checkout.store');

// Autenticazione
Auth::routes();

// Rotte Admin
Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware('auth')->group(function () {
   Route::resource('plates', 'PlateController');
   Route::resource('user', 'UserController');
});

Route::get('/home', 'HomeController@index')->name('home');


