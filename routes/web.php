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

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

//Regsiter 
Auth::routes();

//Register with Google
Route::get('google', 'Auth\LoginController@redirectToGoogle');
Route::get('google/callback', 'Auth\LoginController@handleGoogleCallback');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

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

    //Contact - Query
    Route::get('admin/contact', 'Customer\\ContactController@displayQueries')->name('contact.index');
    Route::get('admin/contact/{id}', 'Customer\\ContactController@showQuery')->name('contact.show');
    Route::delete('admin/contact/{id}', 'Customer\\ContactController@destroyQuery')->name('contact.destroy');
    Route::get('admin/contact/{id}/reply', 'Customer\\ContactController@queryReply')->name('contact.reply');

    //Order CRUD inside Admin
    Route::resource('admin/order', 'Admin\\OrderController');

    //Static Page CRUD inside admin
    Route::resource('admin/page', 'Admin\\PageController');
    
    //Email Template CRUD inside admin
    Route::resource('admin/template', 'Admin\\TemplateController');

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

//Account - Change Password Form
Route::get('cust/account/password', 'Customer\\AccountController@changePassword')->middleware('auth');

//Account - Update Password
Route::get('cust/account/password/update', 'Customer\\AccountController@updatePassword')->middleware('auth');

//Track Order with Order ID and Email
Route::get('cust/track', 'Customer\\TrackController@trackOrder');

//Get Order Status for Tracked Order
Route::get('cust/track/status', 'Customer\\TrackController@orderStatus');

//Contact Us - Ask Query
Route::get('cust/contact', 'Customer\\ContactController@askQuery');

//Contact Us - Store Query
Route::get('cust/contact/query', 'Customer\\ContactController@storeQuery');

/*
|--------------------------------------------------------------------------
| Static Page Routes
|--------------------------------------------------------------------------
*/

//Terms of Use
Route::get('cust/terms_of_use', 'StaticPageController@termsOfUse');

//Privacy Policy
Route::get('cust/privacy_policy', 'StaticPageController@privacyPolicy');

//Refund Policy
Route::get('cust/refund_policy', 'StaticPageController@refundPolicy');

//FAQs
Route::get('cust/faq', 'StaticPageController@faq');

//About Us
Route::get('cust/about_us', 'StaticPageController@aboutUs');

//Copyright
Route::get('cust/copyright', 'StaticPageController@copyright');

//Billing System
Route::get('cust/billing_system', 'StaticPageController@billingSystem');

//Partners
Route::get('cust/partner', 'StaticPageController@partner');

//Career
Route::get('cust/career', 'StaticPageController@career');

/*
|--------------------------------------------------------------------------
| 
|--------------------------------------------------------------------------
*/

//Newsletter form
Route::get('cust/newsletter', 'NewsletterController@newsletter');

//Newsletter Subscribe
Route::post('cust/newsletter/subscribe', 'NewsletterController@subscribeToNewsletter');




Route::get('mailable', function () {
    //$order = App\Order::find(5);

    return (new App\Mail\WeeklyWishlistEmailToAdmin())->render();
});