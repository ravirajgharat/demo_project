<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use Carbon\Carbon;
use App\Wishlist;
use App\Template;

class WeeklyWishlistEmailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

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
        // This Week's Wishlist Items
        $items = Wishlist::where('created_at','>', Carbon::today()->subDays(7))->get();

        $wishlist = "";
        foreach ($items as $item) {
            $wishlist .= '<tr><td style="border-right:1px solid black;border-bottom:1px solid black;">' . $item->user_id . '</td><td style="border-bottom:1px solid black;">' . $item->product_id . '</td></tr>'; 
        }

        // Email Template
        $str = Template::find(10)->template;
        $str = str_replace('{count}', $items->count(), $str);
        $str = str_replace('{wishlist}', $wishlist, $str);


        return $this->view('email')->with('str', $str);
    }
}
