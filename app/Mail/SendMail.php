<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $file;
    public $license_plate;
    public $repair;
    public $vehicle;
    

    public function __construct($file,$license_plate,$repair,$vehicle)
    {
        $this->file = $file;
        $this->license_plate = $license_plate;
        $this->repair = $repair;
        $this->vehicle = $vehicle;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $object = "Fiche des travaux du véhicule immmatriculé ".$this->license_plate." - Expert 3D";
        return $this
        ->subject($object)
        ->attach(
            $this->file
        )
        ->markdown('email.repair.index');
    }
}
