<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use Darryldecode\Cart\Cart;

class LoginController extends Controller
{
    public function loginPage() {
        return view('customer.pages.login');
    }

    public function shop() {

        $categories = App\Category::whereNull('category_id')->get();
        $products = App\Product::inRandomOrder()->take(6)->get();
        //$ship = $ban = App\Banner::where('bannername','free shipping')->first();
        $ban = App\Banner::where('bannername','qqqwww')->first();
        $banners = App\Banner::where('bannername','!=','qqqwww')->inRandomOrder()->get();

        return view('customer.pages.shop', compact('banners', 'ban', 'ship', 'products', 'categories'));
    } 
}