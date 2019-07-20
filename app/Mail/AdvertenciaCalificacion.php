<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdvertenciaCalificacion extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Advertencia - Salud a un Click';

    public $consultorio;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($consultorio)
    {
        $this->consultorio = $consultorio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correos.advertenciaCalificacion');
    }
}
