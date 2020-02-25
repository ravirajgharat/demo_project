<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Configuration;
use App\Mail\DailyOrdersPlacedEmailToAdmin;
use Illuminate\Support\Facades\Mail;

class OrdersDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Order details mail to admin on daily basis.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $admin = Configuration::where('configname','admin_email')->first()->configvalue;

        Mail::to($admin)->send(new DailyOrdersPlacedEmailToAdmin());
    }
}
