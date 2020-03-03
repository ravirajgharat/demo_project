<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Query;
use App\Template;

class QueryAskedEmailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $query;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Query $query)
    {
        $this->query = $query;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->query->firstname . " " . $this->query->lastname;
        $str = Template::find(6)->template;
        $str = str_replace('{name}', $name, $str);
        $str = str_replace('{email}', $this->query->email, $str);
        $str = str_replace('{contact}', $this->query->contact, $str);
        $str = str_replace('{comment}', $this->query->query, $str);
        
        return $this->view('email')->with('str',$str);
    }
}
