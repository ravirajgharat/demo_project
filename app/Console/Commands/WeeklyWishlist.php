<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Configuration;
use App\Mail\WeeklyWishlistEmailToAdmin;
use Illuminate\Support\Facades\Mail;

class WeeklyWishlist extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weekly:wishlist';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Wishlist items mail to admin on weekly basis.';

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
        Mail::to($admin)->send(new WeeklyWishlistEmailToAdmin());
    }
}