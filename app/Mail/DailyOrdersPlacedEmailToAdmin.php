<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use Carbon\Carbon;
use App\Order;
use App\Template;

class DailyOrdersPlacedEmailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    // public $orders;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Today's Orders
        $orders = Order::where('created_at','>', Carbon::today())->get();

        $details = "";
        foreach ($orders as $item) {
            $details .= '<tr><td style="border-right:1px solid black;border-bottom:1px solid black;">' . $item->id . '</td><td style="border-right:1px solid black;border-bottom:1px solid black;">' . $item->user_id . '</td><td style="border-right:1px solid black;border-bottom:1px solid black;">' . $item->order_price . '</td><td style="border-bottom:1px solid black;">' . $item->payment_mode . '</td></tr>'; 
        }

        // Email Template
        $str = Template::find(9)->template;
        $str = str_replace('{count}', $orders->count(), $str);
        $str = str_replace('{details}', $details, $str);

        return $this->view('email')->with('str', $str);
    }
}
