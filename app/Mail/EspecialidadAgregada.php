<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EspecialidadAgregada extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = '¡Una especialidad ha sido agregada! - Salud a un Click';

    public $usuario;
    public $especialidad;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario, $especialidad)
    {
        $this->usuario = $usuario;
        $this->especialidad = $especialidad;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correos.especialidadAgregada');
    }
}
