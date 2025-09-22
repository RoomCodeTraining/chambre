<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class SendDoneVisitMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $visit;    

    public function __construct($visit)
    {
        $this->visit = $visit;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $object = "Viste du client ".$this->visit->client->name." à BCA-CI";
        return $this
        ->subject($object)
        ->markdown('email.visit.done');
    }
}
