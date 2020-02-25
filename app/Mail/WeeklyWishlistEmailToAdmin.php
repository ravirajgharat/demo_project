<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use Carbon\Carbon;
use App\Wishlist;

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
        $items = Wishlist::where('created_at','>', Carbon::today()->subDays(7))->get();

        return $this->markdown('emails.admin.weekly_wishlist')->with('items', $items);
    }
}
