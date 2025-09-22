<?php

namespace App\Mail\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class Otp extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $user;
     public $pin_code;
     public $pin_code_params;
     public $front_otp_url;
     public $expiry_minutes;

     public function __construct($user, $expiry_minutes)
     {
        $this->user = $user;
        $this->expiry_minutes = $expiry_minutes;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $object = "Code de vérification - Expert 3D";
        return $this
        ->subject($object)
        ->markdown('email.auth.otp');
    }
}
