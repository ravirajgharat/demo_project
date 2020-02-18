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

//Guest Home Page
Route::get('/', 'Customer\\HomeController@index');

Route::get('/cust', 'Customer\\HomeController@index')->name('cust');

//Home Page for Auth User
Route::get('/cust/shop', 'Customer\\LoginController@shop')->name('cust.shop')->middleware('auth');

//Brand Page
Route::get('/cust/brand/{brand}', 'Customer\\ShopController@brandPage')->middleware('auth');

//Address CRUD for customer
Route::resource('/cust/address', 'Customer\\AddressController')->middleware('auth');

//Display Product Details
Route::get('/cust/product/{id}', 'Customer\\ShopController@displayProduct')->middleware('auth');

//Cart Route
Route::get('/cust/cart', 'Customer\\ShopController@cart')->middleware('auth');

//Add item to cart
Route::get('/cust/cart/add/{id}', 'Customer\\ShopController@addToCart')->middleware('auth');

//Remove item from cart
Route::get('/cust/cart/remove/{rowId}', 'Customer\\ShopController@removeFromCart')->middleware('auth');

//Increase Quantity
Route::get('/cust/cart/plus/{rowId}', 'Customer\\ShopController@increaseQuantity')->middleware('auth');

//Decrease Quantity
Route::get('/cust/cart/minus/{rowId}', 'Customer\\ShopController@decreaseQuantity')->middleware('auth');

//Clear Cart
Route::get('/cust/cart/clear', 'Customer\\ShopController@clearCart')->middleware('auth');

//Apply coupon
Route::get('/cust/cart/coupon', 'Customer\\ShopController@applyCoupon')->middleware('auth');

//Checkout - Select Address
Route::get('/cust/checkout/address', 'Customer\\CheckoutController@checkoutAddress')->middleware('auth');

//Checkout - Add Address
Route::get('/cust/checkout/address/add', 'Customer\\CheckoutController@checkoutAddAddress')->middleware('auth');

//Checkout - Store Address
Route::get('/cust/checkout/address/store', 'Customer\\CheckoutController@checkoutStoreAddress')->middleware('auth');

//Checkout - Select Payment Method
Route::get('/cust/checkout/payment', 'Customer\\CheckoutController@checkoutPayment')->middleware('auth');

// //Checkout - Success
// Route::get('/cust/checkout/success', 'Customer\\CheckoutController@checkoutSuccess')->middleware('auth');

//Checkout - Pay with Paypal
Route::post('/cust/checkout/paypal', 'PaymentController@payWithPaypal')->name('paypal');
Route::get('/cust/checkout/result', 'PaymentController@getPaymentStatus')->name('result');
Route::get('/cust/checkout/status', 'PaymentController@displayPaymentStatus')->name('status');

//Checkout - Cash On Delivery
Route::get('/cust/checkout/success', 'CashPaymentController@cashPayment');

//Display Products for Category 
Route::get('/cust/category/{cat}/{subcat}', 'Customer\\ShopController@subcategoryProducts')->middleware('auth');

//Wishlist - Add product to wishlist
Route::get('cust/wishlist/add/{id}', 'Customer\\WishlistController@store')->middleware('auth');

Route::resource('cust/wishlist', 'Customer\\WishlistController')->middleware('auth');

//Account - Info
Route::get('cust/account/info', 'Customer\\AccountController@info')->middleware('auth');

//Account - Update Info
Route::get('cust/account/info/update', 'Customer\\AccountController@updateInfo')->middleware('auth');

//Account - Orders
Route::get('cust/order', 'Customer\\AccountController@orders')->middleware('auth');

//Account - Order Details
Route::get('cust/order/{id}', 'Customer\\AccountController@orderDetails')->middleware('auth');
