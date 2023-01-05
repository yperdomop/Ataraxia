<?php

namespace App\Mail;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class asistircotizacionMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $event;

    public $subject = 'Requerimiento de proveedores ';
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    public function build()
    {
        return $this->view('emails.asistircotizacion');
    }
}
