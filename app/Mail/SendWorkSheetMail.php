<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class SendWorkSheetMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $file;
    public $assignment;
    public $photos_path;

    public function __construct($file,$assignment,$photos_path)
    {
        $this->file = $file;
        $this->assignment = $assignment;
        $this->photos_path = $photos_path;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $object = "Fiche des travaux du véhicule immatriculé ".$this->assignment->vehicle->license_plate." - BCA-CI";

        $mail = $this->view('email.work_sheet.index')
                     ->subject($object)
                     ->attach(
                        $this->file
                    );

        foreach ($this->photos_path as $photo) {
            $mail->attach($photo); // ✅ ici on passe chaque fichier individuellement
        }

        return $mail;

        // return $this
        // ->subject($object)
        // ->attach(
        //     $this->file
        // );
        // foreach ($this->photos_path as $photo) {
        //     $mail->attach($photo); // $file doit être une string (chemin complet du fichier)
        // }
        // ->markdown('email.work_sheet.index');
    }
}
