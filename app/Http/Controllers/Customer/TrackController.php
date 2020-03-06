<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;

class TrackController extends Controller
{
    // Track Order Form with email and order id input field
    public function trackOrder()
    {
        return view('customer.pages.track_order');
    }

    /*
     * Get Status of Order
     * Validate Form data
     */
    public function orderStatus(Request $request)
    {
        $request->validate([
            'email' => 'bail|required|email|max:255|min:4',
            'order_id' => 'bail|required|integer',
        ]);

        if(! App\User::where('email', $request->email)->first()) {
            return back()->with('error', 'Entered Email Address is not registered with us.');
        } elseif(! App\Order::find($request->order_id)) {
            return back()->with('error', 'No such Order ID found');
        } elseif(App\User::where('email', $request->email)->first() && App\Order::find($request->order_id)) {
            $user = App\User::where('email', $request->email)->first()->id;
            $order = App\Order::find($request->order_id);
            if($user != $order->user_id) {
                return back()->with('error', 'No such Order ID for Entered Email');
            }
        }

        $details = $order->details()->get();

        return view('customer.pages.order_status', compact('order', 'details'));

    }
}