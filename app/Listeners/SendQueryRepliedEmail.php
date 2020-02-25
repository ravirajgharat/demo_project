<?php

namespace App\Listeners;

use App\Events\QueryReplied;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\QueryRepliedEmail;

class SendQueryRepliedEmail
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
     * @param  QueryReplied  $event
     * @return void
     */
    public function handle(QueryReplied $event)
    {
        
        Mail::to($event->query->email)->send(new QueryRepliedEmail($event->query));
    }
}
