<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;

class ShopController extends Controller
{
    public function subcategoryProducts($cat, $subcat)
    {
        $categories = App\Category::whereNull('category_id')->get();
        //$ship = $ban = App\Banner::where('bannername','free shipping')->first();
        $ban = App\Banner::where('bannername','qqqwww')->first();
        $banners = App\Banner::where('bannername','!=','qqqwww')->inRandomOrder()->get();

        $cat_id = App\Category::where('categoryname', $subcat)->first();
        $products = App\Product::where('category_id', $cat_id->id)->inRandomOrder()->get();

        return view('customer.pages.subcategory', compact('banners', 'ban', 'ship', 'products', 'categories'));
    }

    public function displayProduct($id)
    {
        $categories = App\Category::whereNull('category_id')->get();
        //$ship = $ban = App\Banner::where('bannername','free shipping')->first();
        $ban = App\Banner::where('bannername','qqqwww')->first();
        $banners = App\Banner::where('bannername','!=','qqqwww')->inRandomOrder()->get();
        $product = App\Product::find($id);
        $params = App\Product_parameter::where('product_id', $id)->get();

        return view('customer.pages.product_details', compact('banners', 'ban', 'ship', 'product', 'params', 'categories'));
    }

    public function cart()
    {
        return view('customer.pages.cart');
    }

    public function addToCart($id)
    {
        return $this->displayProduct($id);
    }

    public function removeFromCart($id)
    {
        return back();
    }
}
