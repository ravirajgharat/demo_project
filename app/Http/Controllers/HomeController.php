<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home');
    }

    public function dashboard()
    {
        $orders = App\Order::where('created_at', '>', Carbon::today()->subDays(7))->count();
        $users = App\User::where('created_at', '>', Carbon::today()->subDays(45))->count();

        return view('dashboard', compact('orders', 'users'));
    }

    public function unauthorized()
    {
        return view('customer.pages.not_found');
    }

}
