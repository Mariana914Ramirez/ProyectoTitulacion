<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Estadisticas extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Estadísticas - Salud a un Click';

    public $oficinas;
    public $estadisticas;
    public $comentarios;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($oficinas, $estadisticas, $comentarios)
    {
        $this->oficinas = $oficinas;
        $this->estadisticas = $estadisticas;
        $this->comentarios = $comentarios;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correos.estadisticas');
    }
}
