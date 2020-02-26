<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    // Checkout Select Address
    public function checkoutAddress(Request $request) {

        $cartTotal = $request->cartTotal;
        $request->session()->put('cartTotal', $cartTotal);
        $user = Auth::User();
        $address = Auth::user()->addresses;

        return view('customer.pages.checkout_address', compact('address'));  
    }

    // Checkout Add Address
    public function checkoutAddAddress(Request $request) {

        $cartTotal = $request->cartTotal;
        $user = Auth::User();

        return view('customer.pages.checkout_add_address');//, compact('user', 'cartTotal'));  
    }

    // Checkout Store Address
    public function checkoutStoreAddress(Request $request) {
        
        // $request->validate([
        //     'address' => 'bail|required|string|max:255|min:4',
        //     'city' => 'bail|required|string|max:255|min:4',
        //     'state' => 'bail|required|string|max:255|min:4',
        //     'pin_code' => 'bail|required|integer|max:255|min:8',
        //     'landmark' => 'bail|required|string|max:255|min:4',  
        // ]);

        //$cartTotal = $request->cartTotal;
        //$user = Auth::User();
        //dd($cartTotal);
        $address = new App\Address;
        $address->address = $request->address;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->pin_code = $request->pin_code;
        $address->landmark = $request->landmark;
        $address->user_id = Auth::user()->id;
        $address->save();
        //dd($address->id);
        $request->session()->put('address', $address->id);
        return redirect('cust/checkout/payment');//->with('address', $address->id);
    }

    // Checkout Payment
    public function checkoutPayment(Request $request) {

        if($request->session()->get('address')) {
            //$cartTotal = $request->session()->get('cartTotal');
            $address = App\Address::find($request->session()->get('address'));
        }
        if($request->address) {
            //$cartTotal = $request->cartTotal;
            $address = App\Address::find($request->address);
            $request->session()->put('address', $request->address);
        }
        $cartTotal = $request->session()->get('cartTotal');
        $user = Auth::User();

        //////////////////////

        $items = Cart::content();
        $float = floatval(preg_replace('/[^\d\.]/', '', Cart::subtotal()));
        
        $tax = $float*5/100;
        $taxNo = number_format($float*5/100,2);

        $discount = $request->session()->get('discount');
        if(!isset($discount)) {
            $discount = 0;
        }

        if($float > 500) {
            $ship = 0;
        } else {
            $ship = 50;
        }

        $total = number_format($float+$tax+$ship-$discount,2);
        
        ////////////////////////////


        return view('customer.pages.checkout_payment', compact('user', 'address', 'items', 'float', 'taxNo', 'cartTotal', 'ship', 'total', 'coupon_code', 'discount'));
        
    }

    // Checkout Success 
    public function checkoutSuccess() {
        return view('customer.pages.success');
    }
}