<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;

class NewsletterController extends Controller
{
    /**
     * Show Newsletter subscription page
     */
    public function newsletter(Request $request)
    {
        return view('customer.pages.newsletter');
    }

    /**
     * Subscribe To Newsletter
     * Store User in Newsletter Subscription
     * Mailchimp Integration
     */
    public function subscribeToNewsletter(Request $request)
    {
        $request->validate([
            'firstname' => 'bail|required|string|max:255|min:4',
            'lastname' => 'bail|required|string|max:255|min:4',
            'email' => 'bail|required|email',
        ]);
        
        if(! Newsletter::isSubscribed($request->email)) {            
            Newsletter::subscribePending($request->email, ['FNAME' => $request->firstname, 'LNAME' => $request->lastname]);            
            return redirect('/cust/newsletter')->with('success', 'Verification link is sent to your Email.');
        } else {
            return redirect('/cust/newsletter')->with('error', 'This Email is already registered with us.');
        }
    }
}