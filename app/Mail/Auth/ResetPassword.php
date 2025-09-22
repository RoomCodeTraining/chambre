<?php

namespace App\Mail\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $user;
     public $password;
     
     public function __construct($user,$password)
     {
         $this->user = $user;
         $this->password = $password;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $object = "Réinitialisation de compte utilisateur - Expert 3D";
        return $this
        ->subject($object)
        ->markdown('email.auth.reset-password');
    }
}
