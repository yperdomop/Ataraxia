<?php

namespace App\Mail;

use App\Models\Company_datum;
use App\Models\Document;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class confirdocumentoMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $document;


    public $subject = 'Confirmación actualización del documento';
    public function __construct(Document $document)
    {
        $this->document = $document;
    }

    public function build()
    {
        return $this->view('emails.confirdocumento');
    }
}
