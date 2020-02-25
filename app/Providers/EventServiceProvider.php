<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [

        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        'App\Events\UserRegistered' => [
            'App\Listeners\SendWelcomeEmail',
            'App\Listeners\SendWelcomeEmailToAdmin',
        ],

        'App\Events\OrderPlaced' => [
            'App\Listeners\SendOrderPlacedEmail',
            'App\Listeners\SendOrderPlacedEmailToAdmin',
        ],

        'App\Events\OrderStatusChanged' => [
            'App\Listeners\SendOrderStatusChangedEmail',
        ],

        'App\Events\QueryAsked' => [
            'App\Listeners\SendQueryAskedEmailToAdmin',
        ],

        'App\Events\QueryReplied' => [
            'App\Listeners\SendQueryRepliedEmail',
        ],
        
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
