<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Consultorio;

class MandarMensajes extends Mailable
{
    use Queueable, SerializesModels;


    public $subject = 'Anuncios - Salud a un Click';

    public $consultorioMensaje;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($consultorioMensaje)
    {
        $this->consultorioMensaje = $consultorioMensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correos.anuncios');
    }
}
