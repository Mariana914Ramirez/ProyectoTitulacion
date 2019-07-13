<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CitaCancelada extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Su cita ha sido cancelada - Salud a un Click';

    public $usuario;
    public $doctor;
    public $consultorio;
    public $horario;
    

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario, $doctor, $consultorio, $horario)
    {
        $this->usuario = $usuario;
        $this->doctor = $doctor;
        $this->consultorio = $consultorio;
        $this->horario = $horario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correos.citaCancelada');
    }
}
