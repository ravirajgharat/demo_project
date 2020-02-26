<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;

class StaticPageController extends Controller
{
    
    public function termsOfUse() {

        $page = Page::where('page', 'Terms of Use')->first();

        return view('static_pages.terms_of_use')->with('page', $page);
    }

    public function privacyPolicy() {

        $page = Page::where('page', 'Privacy Policy')->first();

        return view('static_pages.privacy_policy')->with('page', $page);
    }

    public function refundPolicy() {

        $page = Page::where('page', 'Refund Policy')->first();

        return view('static_pages.refund_policy')->with('page', $page);
    }

    public function faq() {

        $page = Page::where('page', 'FAQs')->first();

        return view('static_pages.faq')->with('page', $page);
    }

    public function aboutUs() {

        $page = Page::where('page', 'About Us')->first();

        return view('static_pages.about_us')->with('page', $page);
    }

    public function copyright() {

        $page = Page::where('page', 'Copyright')->first();

        return view('static_pages.copyright')->with('page', $page);
    }

    public function billingSystem() {

        $page = Page::where('page', 'Billing System')->first();

        return view('static_pages.billing_system')->with('page', $page);
    }

    public function partner() {

        $page = Page::where('page', 'Partners')->first();

        return view('static_pages.partner')->with('page', $page);
    }

    public function career() {

        $page = Page::where('page', 'Career')->first();

        return view('static_pages.career')->with('page', $page);
    }

}
