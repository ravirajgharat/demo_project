<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App;

class AccountController extends Controller
{
    // Display User Info
    public function info(Request $request)
    {

        $user = Auth::User();

        return view('customer.account.info', compact('user'));

    }

    // Update User Info
    public function updateInfo(Request $request)
    {


        $user = Auth::User();

        $request->validate([
            'firstname' => 'bail|required|string|max:255|min:4',
            'lastname' => 'bail|required|string|max:255|min:4',
            'email' => 'bail|required|email|max:255|min:4|unique:users,email,' . $user->id,
        ]);

        $user = App\User::find($user->id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->save();

        return redirect('cust/account/info')->with('success', 'Information Updated Successfully.');

    }

    // Display Previous Orders
    public function orders()
    {

        $user = Auth::User()->id;
        $orders = App\Order::where('user_id', $user)->get();

        return view('customer.account.orders', compact('orders'));

    }

    // Display details of specific Order
    public function orderDetails($id)
    {

        $order = App\Order::find($id);
        $details = $order->details()->get();

        return view('customer.account.order_details', compact('order', 'details'));

    }

}