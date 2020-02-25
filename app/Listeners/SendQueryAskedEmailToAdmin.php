<?php

namespace App\Listeners;

use App\Events\QueryAsked;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Configuration;
use App\Mail\QueryAskedEmailToAdmin;

class SendQueryAskedEmailToAdmin
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
     * @param  QueryAsked  $event
     * @return void
     */
    public function handle(QueryAsked $event)
    {
        $admin = Configuration::where('configname','admin_email')->first()->configvalue;

        Mail::to($admin)->send(new QueryAskedEmailToAdmin($event->query));
    }
}
