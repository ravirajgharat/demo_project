<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

use Illuminate\Support\Facades\Auth;

use Gloudemans\Shoppingcart\Facades\Cart;

class CashPaymentController extends Controller
{
    public function cashPayment(Request $request) {

        // dd($request->session()->get('address'));
        $cartTotal = $request->session()->get('cartTotal');
        $total = floatval(preg_replace('/[^\d\.]/', '', $cartTotal));
        
        if($request->session()->get('coupon')) {
            $discount = $request->session()->get('discount');
            $coupon = $request->session()->get('coupon');
        } else {
            $discount = 0;
            $coupon = 'Not Applied';
        }
        
        $order = new App\Order;
        $order->user_id = Auth::user()->id;
        $order->address_id = $request->session()->get('address');
        $order->order_status = 'Processing';
        $order->order_price = $total;
        $order->coupon = $coupon;
        $order->discount = $discount;
        $order->payment_mode = 'Cash';
        $order->save();

        $request->session()->put('order_id', $order->id);

        foreach(Cart::content() as $item) {

            $orderDetail = App\Order_detail::create([

                'order_id' => $order->id,
                'product' => $item->name,
                'quantity' => $item->qty,
                'price' => $item->price,

            ]);

            $product = App\Product::find($item->id);
            $product->quantity = $product->quantity - $item->qty;
            $product->save();

        }

        

        // Empty the Cart
        Cart::destroy();

        // Forget Session variables
        $request->session()->forget('cartTotal');
        $request->session()->forget('discount');
        $request->session()->forget('coupon');
        $request->session()->forget('address');

        $request->session()->put('success', 'Order Placed Successfully.');
        return view('customer.pages.success');

    }
}
