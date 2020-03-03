<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;
use App\Template;

class WelcomeEmailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $str = Template::find(1)->template;
        $str = str_replace('{email}', $this->user->email, $str);
        $str = str_replace('{login}', 'http://localhost/demo_project/public/login', $str);

        return $this->view('email')->with('str', $str);
    }
}
