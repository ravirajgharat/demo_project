<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

//use Illuminate\Support\Facades\Input;
use Input;
use Redirect;
use Session;
use URL;

use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Support\Facades\Auth;
use App;

class PaymentController extends Controller
{
    public function __construct()
    {
 
        // PayPal api context
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
 
    }

    /* 
     * After Pay with Paypal is selected
     * 
     * Enter record in orders table
     * with status = pending
     * Save order id in session
     */
    public function payWithPaypal(Request $request)
    {

        $cartTotal = $request->session()->get('cartTotal');
        $total = floatval(preg_replace('/[^\d\.]/', '', $cartTotal));

        if($request->session()->get('coupon')) {
            $discount = $request->session()->get('discount');
            $coupon = $request->session()->get('coupon');
        } else {
            $discount = 0;
            $coupon = 'Not Applied';
        }

        // $order = App\Order::create([

        //         'user_id' => Auth::user()->id,
        //         'order_status' => 'Pending',
        //         'order_price' => $total,

        // ]);

        $order = new App\Order;
        $order->user_id = Auth::user()->id;
        $order->address_id = $request->session()->get('address');
        $order->order_status = 'Pending';
        $order->order_price = $total;
        $order->coupon = $coupon;
        $order->discount = $discount;
        $order->payment_mode = 'Paypal';
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

        // dd($request->session()->get('cartTotal'));

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
 
        $item_1 = new Item();
 
        $item_1->setName('Item 1') /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($total); /** unit price **/
 
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
 
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($total);
 
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
 
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('result')) /** Specify return URL **/
            ->setCancelUrl(URL::route('result'));
 
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
 
            $payment->create($this->_api_context);
 
        } catch (\PayPal\Exception\PPConnectionException $ex) {
 
            if (\Config::get('app.debug')) {
 
                \Session::put('error', 'Connection timeout');
                return Redirect::route('result');
 
            } else {
 
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('result');
 
            }
 
        }
 
        foreach ($payment->getLinks() as $link) {
 
            if ($link->getRel() == 'approval_url') {
 
                $redirect_url = $link->getHref();
                break;
 
            }
 
        }
 
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
 
        if (isset($redirect_url)) {
 
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
 
        }
 
        \Session::put('error', 'Unknown error occurred');
        return Redirect::route('result');
 
    }

    // Get Payment Status
    public function getPaymentStatus(Request $request)
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
 
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
 
            \Session::put('error', 'Payment failed');
            return Redirect::route('status');
 
        }
        
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
 
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);


        /*
         * If payment is successfull
         * 1. Empty the Cart
         * 2. Change order status to processing in order_details table
         * 3. Forget session variables
         */
        if ($result->getState() == 'approved') {
            
            // Empty the Cart
            Cart::destroy();

            // Change order status to processing in order_details table
            $order_id = $request->session()->get('order_id');
            $order = App\Order::find($order_id);
            $order->order_status = 'Processing';
            $order->save();

            /**
             * Event : OrderPlaced($order)
             * Listener Action : Send Order Placed Mail to Customer and Admin
             */
            event(new App\Events\OrderPlaced($order)); 

            // Forget Session variables
            $request->session()->forget('cartTotal');
            $request->session()->forget('discount');
            $request->session()->forget('coupon');
            $request->session()->forget('address');

            \Session::put('success', 'Payment success');
            return Redirect::route('status');
 
        } else {
 
            \Session::put('error', 'Payment failed');
            return Redirect::route('status');
        
        }
 
    }

    // Display Payment Status
    public function displayPaymentStatus()
    {
        return view('customer.pages.status');
    }

}
