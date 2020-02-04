<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginPage() {
        return view('customer.pages.login');
    }

    public function shop() {
        return view('customer.pages.shop');
    }
}