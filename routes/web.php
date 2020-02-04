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





/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/


Route::get('/admin', function () {
    return view('auth.login');
});

//Admin users
Route::get('/admin', 'HomeController@dashboard')->name('admin')->middleware('auth','admin');

Auth::routes();

//Customers
Route::get('/home', 'HomeController@home')->name('home')->middleware('auth','user');

//redirect customers trying to access admin page
Route::get('/unauthorized', 'HomeController@unauthorized');

//Admin access only
Route::group(['middleware' => ['auth', 'admin']], function() {

    //User CRUD inside admin
    Route::resource('admin/user', 'Admin\\UserController');

    //Configuration CRUD inside admin
    Route::resource('admin/configuration', 'Admin\\ConfigurationController');

    //Banner CRUD inside admin
    Route::resource('admin/banner', 'Admin\\BannerController');

    //Role CRUD inside admin
    Route::resource('admin/role', 'Admin\\RoleController');

    //Category multilevel CRUD inside admin
    Route::resource('admin/category', 'Admin\\CategoryController');

    //Product CRUD inside admin
    Route::resource('admin/product', 'Admin\\ProductController');

    //Product Parameter CRUD inside admin
    Route::resource('admin/product_parameter', 'Admin\\Product_parameterController');

    //Coupon CRUD inside admin
    Route::resource('admin/coupon', 'Admin\\CouponController');
    
});


/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
*/



Route::get('/', 'Customer\\HomeController@index');

Route::get('/cust', 'Customer\\HomeController@index')->name('cust');

//Route::get('/cust/login', 'Customer\\LoginController@loginPage')->name('cust.loginpage')->middleware('user');

Route::get('/cust/shop', 'Customer\\LoginController@shop')->name('cust.shop')->middleware('auth');