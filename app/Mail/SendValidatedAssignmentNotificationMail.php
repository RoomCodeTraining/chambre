<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class SendValidatedAssignmentNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $assignment;    

    public function __construct($assignment)
    {
        $this->assignment = $assignment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $object = "Dossier d'expertise du véhicule immatriculé ".$this->assignment->vehicle->license_plate." - Expert 3D";
        return $this
        ->subject($object)
        ->markdown('email.assignment.validated');
    }
}
