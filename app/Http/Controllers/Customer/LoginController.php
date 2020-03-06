<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use Gloudemans\Shoppingcart\Facades\Cart;

class LoginController extends Controller
{
    // Show Login Page
    public function loginPage()
    {
        return view('customer.pages.login');
    }

    // Show Home Page to Authenticated Users
    public function shop()
    {
        $categories = App\Category::whereNull('category_id')->get();
        $products = App\Product::inRandomOrder()->take(6)->get();
        $rec_act = App\Product::inRandomOrder()->take(3)->get();
        $rec = App\Product::inRandomOrder()->take(3)->get();
        $ban = App\Banner::where('bannername','qqqwww')->with('category')->first();
        $banners = App\Banner::where('bannername','!=','qqqwww')->inRandomOrder()->with('category')->get();
        $brands = App\Product::select('product_brand')->distinct()->get();
        $tab_shoes = App\Product::where('category_id', 9)->inRandomOrder()->take(4)->get();
        $tab_backpacks = App\Product::where('category_id', 5)->inRandomOrder()->take(4)->get();
        $tab_shirts = App\Product::where('category_id', 7)->inRandomOrder()->take(4)->get();
        $tab_pants = App\Product::where('category_id', 8)->inRandomOrder()->take(4)->get();

        $arr = array();
        $items = Cart::content();
        foreach($items as $item) {
            $arr[] = $item->id;
        }

        return view('customer.pages.shop', compact('arr', 'exist', 'banners', 'ban', 'products', 'categories', 'brands', 'rec_act', 'rec', 'tab_shoes', 'tab_backpacks', 'tab_shirts', 'tab_pants'));
    } 
}