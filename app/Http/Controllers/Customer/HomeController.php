<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;

class HomeController extends Controller
{
    public function index()
    {
        $categories = App\Category::whereNull('category_id')->get();
        $products = App\Product::inRandomOrder()->take(6)->get();
        $rec_act = App\Product::inRandomOrder()->take(3)->get();
        $rec = App\Product::inRandomOrder()->take(3)->get();
        $ban = App\Banner::where('bannername','qqqwww')->with('category')->first();
        $banners = App\Banner::where('bannername','!=','qqqwww')->inRandomOrder()->with('category')->get();
        $brands = App\Product::select('product_brand')->distinct()->get();
        $tab_shoes = App\Product::inRandomOrder()->take(4)->get();

        return view('index', compact('banners', 'ban', 'products', 'categories', 'brands', 'rec_act', 'rec', 'tab_shoes'));  
    }
}