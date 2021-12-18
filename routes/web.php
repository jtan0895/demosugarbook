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

Route::get('/profile', 'ProfileController@index');
Route::get('/profile/create', 'ProfileController@create');
Route::post('/profile', 'ProfileController@store')->name('profile.store');
Route::get('/profile/edit', 'ProfileController@edit');
Route::post('/profile/{id}/update', 'ProfileController@update')->name('profile.update');

Route::resource('post', PostController::class);
Route::resource('restaurant', RestaurantController::class);
Route::resource('review', ReviewController::class);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
