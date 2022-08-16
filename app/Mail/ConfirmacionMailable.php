<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmacionMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $subject = 'Confirmación de creación de usuarios';
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function build()
    {
        return $this->view('emails.confirmacion');
    }
}
