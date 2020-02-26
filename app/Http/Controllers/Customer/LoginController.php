<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
// use Darryldecode\Cart\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;

class LoginController extends Controller
{
    public function loginPage() {
        return view('customer.pages.login');
    }

    public function shop() {

        $categories = App\Category::whereNull('category_id')->get();
        $products = App\Product::inRandomOrder()->take(6)->get();
        $rec_act = App\Product::inRandomOrder()->take(3)->get();
        $rec = App\Product::inRandomOrder()->take(3)->get();
        $ban = App\Banner::where('bannername','qqqwww')->first();
        $banners = App\Banner::where('bannername','!=','qqqwww')->inRandomOrder()->get();
        $brands = App\Product::select('product_brand')->distinct()->get();
        $tab_shoes = App\Product::inRandomOrder()->take(4)->get();

        $arr = array();
        $items = Cart::content();
        foreach($items as $item) {
            $arr[] = $item->id;
        }

        return view('customer.pages.shop', compact('arr', 'exist', 'banners', 'ban', 'products', 'categories', 'brands', 'rec_act', 'rec', 'tab_shoes'));
    } 
}