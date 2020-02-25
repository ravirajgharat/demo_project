<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Configuration;
use App\Mail\OrderPlacedEmailToAdmin;

class SendOrderPlacedEmailToAdmin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderPlaced  $event
     * @return void
     */
    public function handle(OrderPlaced $event)
    {
        $admin = Configuration::where('configname','admin_email')->first()->configvalue;

        Mail::to($admin)->send(new OrderPlacedEmailToAdmin($event->order));
    }
}
