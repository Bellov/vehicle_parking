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
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/full_parking', 'ParkingController@show_full_parking')->name('full_parking');
Route::get('/unpark', 'ParkingController@unpark')->name('unpark');
Route::POST('/unpark_vehicle','ParkingController@unpark_vehicle')->name('unpark_vehicle');
Route::resource('parking', 'ParkingController');
