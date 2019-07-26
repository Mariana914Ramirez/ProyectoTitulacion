<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Cita;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventDateTime;
use Illuminate\Http\Request;

class CalendarioGoogleController extends Controller
{
    protected $client;
    public function __construct()
    {
        $client = new Google_Client();
        $client->setAuthConfig('credentials.json');
        
        $client->addScope(Google_Service_Calendar::CALENDAR);
        $client->addScope("https://www.googleapis.com/auth/calendar.events");
        $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false)));
        $client->setHttpClient($guzzleClient);
        $this->client = $client;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);
            $calendarId = 'primary';
            $results = $service->events->listEvents($calendarId);
            return redirect('/')->with(['mensaje' => 'Se ha logrado la conexión']);
        } else {
            return redirect()->route('oauthCallback');
        }
    }
    public function oauth()
    {
        session_start();
        $rurl = action('CalendarioGoogleController@oauth');
        $this->client->setRedirectUri($rurl);
        if (!isset($_GET['code'])) {
            $auth_url = $this->client->createAuthUrl();
            $filtered_url = filter_var($auth_url, FILTER_SANITIZE_URL);
            return redirect($filtered_url);
        } else {
            $this->client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $this->client->getAccessToken();
            return redirect('cal');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('calendar.crearEvento');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($titulo, $descripcion, $inicio, $fin, $cita, Request $request)
    {
        session_start();
        $startDateTime = Carbon::parse($inicio)->toRfc3339String();
        $endDateTime = Carbon::parse($fin)->toRfc3339String();

        if ($request->session()->has('mexicanada')){
        	$correo=$request->session()->get('mexicanada');
        }

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);
            $calendarId = 'primary';
            $event = new Google_Service_Calendar_Event([
                'summary' => $titulo,
                'description' => $descripcion,
                'start' => ['dateTime' => $startDateTime],
                'end' => ['dateTime' => $endDateTime],
                'attendees'=> array(
				    array('email'=> $correo)
			    ),
                'reminders' => ['useDefault' => true],
            ]);
            
            $results = $service->events->insert($calendarId, $event);
            $results->setGuestsCanModify(true);

            $updatedEvent = $service->events->update('primary', $results->getId(), $results);
            $google = $results->getId();

            Cita::where('Registro', '=', $cita)->update(array('Google'=>$google,));

            if ($request->session()->has('mexicanada')){
	        	$request->session()->forget('mexicanada');
	        }
            if (!$results) {
                return redirect('/')->with(['mensaje' => 'Cita creada, aunque no se logró la sincronización con Google Calendar']);
            }
            return redirect('/')->with(['mensaje' => 'Cita creada']);
        } else {
            return redirect('/')->with(['mensaje' => 'Cita creada']);
        }
    }




    public function destroy($eventId)
    {
        session_start();
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);
            $service->events->delete('primary', $eventId);
            return redirect('ver-informacion-citas')->with(['mensaje' => 'Cita eliminada']);
        } else {
            return redirect('ver-informacion-citas');
        }
    }




    public function eliminarCitaDoctor($eventId, $doctorConsultorio, $fecha)
    {
        session_start();
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);
            $service->events->delete('primary', $eventId);
            
            if(Cita::select('*')->where('DoctorConsultorio', '=', $doctorConsultorio)->where('Fecha', '=', $fecha)->where('Asistir', '=', 1)->count() == 0)
            {
                return redirect('ver-agenda')->with(['mensaje' => 'Cita eliminada']);
            }
            return redirect('ver-citas/'.$fecha)->with(['mensaje' => 'Cita eliminada']);


        } else {
            if(Cita::select('*')->where('DoctorConsultorio', '=', $doctorConsultorio)->where('Fecha', '=', $fecha)->where('Asistir', '=', 1)->count() == 0)
            {
                return redirect('ver-agenda')->with(['mensaje' => 'Cita eliminada']);
            }
            return redirect('ver-citas/'.$fecha)->with(['mensaje' => 'Cita eliminada']);

        }
    }



    public function stop()
    {
        session_start();
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            session_unset();
            return redirect('/')->with(['mensaje' => 'Se ha detenido la sincronización']);
        } else {
            return redirect('/');
        }
    }



    public function logout(Request $request)
    {
        if ($request->session()->has('asistenteSession') || $request->session()->has('doctorSession') || $request->session()->has('usuarioSession'))
        { 
            session_start();
            if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
                session_unset();
            }
        } 
        return redirect('logout');
    }

}
