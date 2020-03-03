<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Order;
use App\Order_detail;
use App\Address;
use App\Template;

class OrderPlacedEmailToAdmin extends Mailable
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
        // Order
        $order = Order::find($this->order->id);

        $id = $order->id;
        $date = $order->created_at;
        $price = round($order->order_price, 2);
        $payment = $order->payment_mode;

        // Order Address
        $add = Address::find($order->address_id);

        $address = $add->address . ", " . $add->city . ", " . $add->state . ", " . $add->pin_code . ", " . $add->landmark;

        // Order Details
        $det = $order->details()->get();
        $details = "";
        foreach ($det as $item) {
            $details .= '<tr><td style="border-right:1px solid black;border-bottom:1px solid black;">' . $item->product . '</td><td style="border-right:1px solid black;border-bottom:1px solid black;">' . $item->quantity . '</td><td style="border-right:1px solid black;border-bottom:1px solid black;">' . $item->price . '</td><td style="border-bottom:1px solid black;">' . $item->price*$item->quantity . '</td></tr>'; 
        }

        // Email Template
        $str = Template::find(8)->template;
        $str = str_replace('{id}', $id, $str);
        $str = str_replace('{date}', $date, $str);
        $str = str_replace('{price}', $price, $str);
        $str = str_replace('{address}', $address, $str);
        $str = str_replace('{details}', $details, $str);
        $str = str_replace('{payment}', $payment, $str);

        return $this->view('email')->with('str', $str);
    }
}
