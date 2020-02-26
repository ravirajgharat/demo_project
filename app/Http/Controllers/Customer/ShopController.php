<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Auth;
//use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShopController extends Controller
{

    // Display products for subcategory
    public function subcategoryProducts($cat, $subcat)
    {
        $categories = App\Category::whereNull('category_id')->get();
        $ban = App\Banner::where('bannername','qqqwww')->first();
        $banners = App\Banner::where('bannername','!=','qqqwww')->inRandomOrder()->get();
        $brands = App\Product::select('product_brand')->distinct()->get();
        $cat_id = App\Category::where('categoryname', $subcat)->first();
        $products = App\Product::where('category_id', $cat_id->id)->inRandomOrder()->take(6)->get();
        
        $arr = array();
        $items = Cart::content();
        foreach($items as $item) {
            $arr[] = $item->id;
        }

        return view('customer.pages.subcategory', compact('arr', 'banners', 'brands', 'ban', 'products', 'categories'));
    }

    // Display details of selected product
    public function displayProduct($id)
    {
        $categories = App\Category::whereNull('category_id')->get();
        $brands = App\Product::select('product_brand')->distinct()->get();
        $ban = App\Banner::where('bannername','qqqwww')->first();
        $banners = App\Banner::where('bannername','!=','qqqwww')->inRandomOrder()->get();
        $product = App\Product::find($id);
        $params = App\Product_parameter::where('product_id', $id)->select('product_parameter')->distinct()->get();

        $items = Cart::content();
        $exist = 0;
        foreach($items as $item) {
            if($item->id == $product->id) {
                $exist = 1;
            }
        }

        return view('customer.pages.product_details', compact('exist', 'banners', 'brands', 'ban', 'product', 'params', 'categories'));
    }

    // Display Brand Page
    public function brandPage($brand)
    {
        $categories = App\Category::whereNull('category_id')->get();
        $brands = App\Product::select('product_brand')->distinct()->get();
        $ban = App\Banner::where('bannername','qqqwww')->first();
        $banners = App\Banner::where('bannername','!=','qqqwww')->inRandomOrder()->get();

        //$cat_id = App\Category::where('categoryname', $subcat)->first();
        $products = App\Product::where('product_brand', $brand)->take(6)->get();

        $arr = array();
        $items = Cart::content();
        foreach($items as $item) {
            $arr[] = $item->id;
        }

        return view('customer.pages.brand', compact('arr', 'banners', 'ban', 'brands', 'products', 'categories'));
    }

    // Cart Page
    public function cart()
    {
        // dd($request->session()->get('cartTotal'));
        $items = Cart::content();
        $float = floatval(preg_replace('/[^\d\.]/', '', Cart::subtotal()));
        
        $tax = $float*5/100;
        $taxNo = number_format($float*5/100,2);

        if(!isset($coupon_code)) {
            $coupon_code = "Not Applied";
            $discount = 0;
        }

        if($float > 500) {
            $ship = 0;
        } else {
            $ship = 50;
        }

        $total = number_format($float+$tax+$ship,2);
        return view('customer.pages.cart', compact('items', 'float', 'taxNo', 'ship', 'total', 'coupon_code', 'discount'));
    }

    
    /*
     * Add Selected product to Cart
     * Param -
     * $id : id of product
     */
    public function addToCart($id)
    {
        $product = App\Product::find($id);

        Cart::add([

            'id' => $product->id, 
            'name' => $product->product_name, 
            'qty' => 1, 
            'price' => $product->price,
            'weight' => 0

        ])->associate('App\Product');

        return $this->displayProduct($id);
    }

    /*
     * Increase Quantity of a product
     * Param -
     * $rowId : row id of product
     */
    public function increaseQuantity($rowId)
    {
        $item = Cart::get($rowId);
        Cart::update($rowId, $item->qty+1);

        return $this->cart();
    }

    /*
     * Decrease Quantity of a product
     * Param -
     * $rowId : row id of product
     */
    public function decreaseQuantity($rowId)
    {
        $item = Cart::get($rowId);
        Cart::update($rowId, $item->qty-1);

        return $this->cart();
    }

    /*
     * Remove Product From Cart
     * Param -
     * $rowId : row id of product
     */
    public function removeFromCart($rowId)
    {
        Cart::remove($rowId);

        return $this->cart();
    }

    // Clear Cart
    public function clearCart()
    {
        Cart::destroy();

        return $this->cart();
    }

    //Apply Coupon
    public function applyCoupon(Request $request)
    {
        $coupon = App\Coupon::find($request->coupon);
        $coupon_code = $coupon->coupon_code;
        $discount = $coupon->discount;
        $format = $coupon->format;
        $request->session()->put('coupon', $coupon_code);
        $items = Cart::content();
        $float = floatval(preg_replace('/[^\d\.]/', '', Cart::subtotal()));
        
        $tax = $float*5/100;
        $taxNo = number_format($float*5/100,2);

        $total1 = number_format($float+$tax,2);

        if($float > 500) {
            $ship = 0;
        } else {
            $ship = 50;
        }

        if($format == 1) {
            $discount = $float*$discount/100;
            $request->session()->put('discount', $discount);
            $totalInDecimal = $float-$discount+$tax+$ship;
            $total = number_format($totalInDecimal,2);
        } else {
            $request->session()->put('discount', $discount);
            $totalInDecimal = $float-$discount+$tax+$ship;
            $total = number_format($totalInDecimal,2);
        }

        return view('customer.pages.cart', compact('items', 'float', 'taxNo', 'total', 'ship', 'coupon_code', 'discount', 'format'));
    }
}
