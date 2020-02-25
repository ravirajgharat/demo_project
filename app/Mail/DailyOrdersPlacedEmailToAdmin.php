<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use Carbon\Carbon;
use App\Order;

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
        $orders = Order::where('created_at','>', Carbon::today())->get();

        return $this->markdown('emails.admin.daily_orders')->with('orders', $orders);
    }
}
