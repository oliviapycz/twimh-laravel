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
    return view('homepage');
});
Route::get('/', 'HomepageController@index');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('profile', 'UserController@profile')->name('profile');

Route::post('profile', 'UserController@update_avatar');

Route::get('about', function () {
    return view('about');
})->name('about');

Route::resource('posts', 'PostsController');

Route::resource('recipes', 'RecipesController');
