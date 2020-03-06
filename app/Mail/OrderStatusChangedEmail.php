<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Order;
use App\Template;
use App\Address;

class OrderStatusChangedEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $add = Address::find($this->order->address_id);
        $address = $add->address . ", " . $add->city . ", " . $add->state . ", " . $add->pin_code . ", " . $add->landmark;
        $price = 
        $str = Template::find(5)->template;
        $str = str_replace('{login}', 'http://localhost/demo_project/public/login', $str);
        $str = str_replace('{id}', $this->order->id, $str);
        $str = str_replace('{price}', $this->order->order_price, $str);
        $str = str_replace('{address}', $address, $str);
        $str = str_replace('{payment}', $this->order->payment_mode, $str);

        return $this->view('email')->with('str', $str);
    }
}