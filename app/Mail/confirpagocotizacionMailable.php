<?php

namespace App\Mail;

use App\Models\Quotation;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class confirpagocotizacionMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $quotation;

    public $subject = 'Confirmación de pago de cotización';
    public function __construct(Quotation $quotation)
    {
        $this->quotation = $quotation;
    }

    public function build()
    {
        return $this->view('emails.confirpagocotizacion');
    }
}
