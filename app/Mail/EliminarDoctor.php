<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EliminarDoctor extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Citas de Doctor - Salud a un Click';

    public $relacionCitasConsultorio;
    public $consultorio;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($consultorio, $relacionCitasConsultorio)
    {
        $this->relacionCitasConsultorio = $relacionCitasConsultorio;
        $this->consultorio = $consultorio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correos.eliminarDoctor');
    }
}
