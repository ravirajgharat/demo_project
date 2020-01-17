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
    return view('welcome');
});

//Admin users
Route::get('/admin', 'HomeController@dashboard')->name('admin')->middleware('auth','admin');

Auth::routes();

//Customers
Route::get('/home', 'HomeController@home')->name('home')->middleware('auth','user');

//redirect customers trying to access admin page
Route::get('/unauthorized', 'HomeController@unauthorized');

//User CRUD inside admin
Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::resource('admin/user', 'Admin\\UserController');
});

//Configuration CRUD inside admin
Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::resource('admin/configuration', 'Admin\\ConfigurationController')->middleware('auth','admin');
});

//Banner CRUD inside admin
Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::resource('admin/banner', 'Admin\\BannerController')->middleware('auth','admin');
});