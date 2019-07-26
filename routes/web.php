<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::resource('/', 'ComentarioPrincipalController');
Route::post('sugerencias', 'ComentarioPrincipalController@saveSugerencias')->name('saveSugerencias');
Route::get('buscar', 'ComentarioPrincipalController@buscador')->name('buscador');
Route::any('editar-comentario/{idComentario}', 'ComentarioPrincipalController@vistaEditarComentario')->name('vistaEditarComentario');
Route::any('guardar-comentario-editado-principal/{idComentario}', 'ComentarioPrincipalController@editarComentario')->name('editarComentario');
Route::any('eliminar-comentario/{idComentario}', 'ComentarioPrincipalController@eliminarComentario')->name('eliminarComentario');




Route::get('cuentaConsultorio', 'ConsultorioController@cuenta')->name('cuenta');
Route::any('visitarConsultorio/{id}', 'ConsultorioController@PacientesVisitantes')->name('PacientesVisitantes');
Route::any('comentarConsultorios/{id}', 'ConsultorioController@comentarConsultorios')->name('comentarConsultorios');
Route::any('estadisticas/{id}', 'ConsultorioController@estadisticas')->name('estadisticas');
Route::any('modificar-informacion-consultorio', 'ConsultorioController@vistaModificar')->name('vistaModificar');
Route::any('guardar-cambios-consultorio', 'ConsultorioController@modificarConsultorio')->name('modificarConsultorio');
Route::any('ver-citas-del-doctor/{idDoctor}', 'ConsultorioController@mostrarCitasDoctor')->name('mostrarCitasDoctor');
Route::any('editar-comentario-consultorio/{idComentario}', 'ConsultorioController@vistaEditarComentario')->name('vistaEditarComentario');
Route::any('guardar-comentario-editado/{idComentario}/{idConsultorio}', 'ConsultorioController@editarComentario')->name('editarComentario');
Route::any('eliminar-comentario-consultorio/{idComentario}', 'ConsultorioController@eliminarComentario')->name('eliminarComentario');




Route::any('cal', 'CalendarioGoogleController@index');
Route::any('guardar-google/{titulo}/{descripcion}/{inicio}/{fin}/{cita}', 'CalendarioGoogleController@store');
Route::get('oauth', 'CalendarioGoogleController@oauth')->name('oauthCallback');
Route::get('eliminar-cita-google/{eventId}', 'CalendarioGoogleController@destroy');
Route::get('google-eliminar-cita/{eventId}/{doctorConsultorio}/{fecha}', 'CalendarioGoogleController@eliminarCitaDoctor');




Route::resource('administrador', 'AdministradorController');





Route::any('noCumpleRequisitosAnuncio/{id}/{anuncio}', 'CorreosController@NoCumpleRequisitos')->name('NoCumpleRequisitos');
Route::any('agregarAnuncio/{id}/{anuncio}', 'CorreosController@AgregarAnuncio')->name('AgregarAnuncio');
Route::any('especialdadAgregada/{id}', 'CorreosController@EspecialdadAgregada')->name('EspecialdadAgregada');



Route::any('eliminar-consultorio/{idConsultorio}', 'EliminarController@eliminarConsultorios')->name('eliminarConsultorios');
Route::any('eliminar-doctor/{idDoctor}', 'EliminarController@eliminarDoctor')->name('eliminarDoctor');
Route::any('eliminar-cuenta-consultorio', 'EliminarController@eliminarCuentaConsultorio')->name('eliminarCuentaConsultorio');
Route::any('eliminar-cuenta-doctor', 'EliminarController@eliminarCuentaDoctor')->name('eliminarCuentaDoctor');



Route::resource('imagenes', 'imagenController');
Route::any('anuncios', 'imagenController@anuncios')->name('anuncios');
Route::any('eliminar-foto-galeria/{idFoto}', 'imagenController@eliminarFotoGaleria')->name('eliminarFotoGaleria');






Route::resource('doctor', 'DoctorController');
Route::get('modificarHorarios', 'DoctorController@horario')->name('horario');
Route::any('precios', 'DoctorController@precios')->name('precios');
Route::any('visitantes/{doctor}/{consultorio}', 'DoctorController@visitantes')->name('visitantes');
Route::any('citas/{doctor}/{consultorio}', 'DoctorController@citas')->name('citas');
Route::any('generarCitas', 'DoctorController@generarCitas')->name('generarCitas');
Route::any('modificar-informacion-doctor', 'DoctorController@vistaModificarInformacion')->name('vistaModificarInformacion');
Route::any('eliminar-especialidad-doctor/{idEspecialidad}', 'DoctorController@eliminarEspecialidad')->name('eliminarEspecialidad');
Route::any('guardar-cambios-doctor', 'DoctorController@modificarDoctor')->name('modificarDoctor');
Route::any('eliminar-concepto/{idPrecio}', 'DoctorController@eliminarConcepto')->name('eliminarConcepto');
Route::any('eliminar-horario/{idHorario}', 'DoctorController@eliminarHorario')->name('eliminarHorario');




Route::any('guardar-cita/{horario}/{doctorConsultorio}/{fecha}', 'CitaController@guardarCita')->name('guardarCita');
Route::get('registro-cita/{horario}/{doctorConsultorio}/{fecha}', 'CitaController@registroCita')->name('registroCita');
Route::any('ver-agenda', 'CitaController@index')->name('index');
Route::any('ver-citas/{fecha}', 'CitaController@verCitas')->name('verCitas');
Route::any('cita-cancelada/{idCita}', 'CitaController@citaCancelada')->name('citaCancelada');
Route::any('cancelar-confirmacion/{idCita}', 'CitaController@confirmarCancelacion')->name('confirmarCancelacion');
Route::any('ver-informacion-citas', 'CitaController@verInformacionCitas')->name('verInformacionCitas');




Route::any('notificaciones', 'NotificacionController@index')->name('index');


Route::any('calificar/{idConsultorio}/{idNotificacion}', 'CalificacionController@index')->name('index');
Route::any('guardar-calificacion/{idConsultorio}/{idNotificacion}', 'CalificacionController@guardarCalificacion')->name('guardarCalificacion');
Route::any('mensaje-quejas/{idNotificacion}/{idConsultorio}', 'CalificacionController@mostrarQuejas')->name('mostrarQuejas');
Route::any('guardar-quejas/{idNotificacion}/{idConsultorio}', 'CalificacionController@guardarQuejas')->name('guardarQuejas');



Route::any('eliminar-notificacion/{idNotificacion}', 'NotificacionController@eliminarNotificacion')->name('eliminarNotificacion');



Route::get('modificarUsuario', 'UsuariosController@edit');



Route::get('/hola', function () {
    dd('holitas');
});

Route::resource('especialidades', 'EspecialidadController');

Route::get('formulario', 'FormularioController@index');
Route::get('municipio/{Registro}', 'FormularioController@getMunicipio')->name('getMunicipio');
Route::resource('usuario', 'UsuariosController');
Route::resource('consultorios', 'ConsultorioController');
Route::get('especialidad/{Registro}', 'ConsultorioController@getEspecialidad')->name('getEspecialidad');

Route::post('usuario/login','Auth\LoginController@login')->name('login');
Route::any('accede/{Correo}','Auth\LoginController@accederComo')->name('accederComo');
Route::any('accedeA/{Correo}','Auth\LoginController@accederComoA')->name('accederComoA');
Route::any('accedeAsis/{Correo}/{id}','Auth\LoginController@accedeAsis')->name('accedeAsis');

Route::any('accedeDoctor/{Correo}','Auth\LoginController@accederDoctor')->name('accederDoctor');
Route::any('accedeDoctorConsultorio/{Correo}/{Registro}/{Id}','Auth\LoginController@volverAccederDoctor')->name('volverAccederDoctor');
Route::any('accedeAsistente/{Correo}','Auth\LoginController@accederAsistente')->name('accederAsistente');
Route::any('accedeUsuario/{Correo}','Auth\LoginController@accederUsuario')->name('accederUsuario');

Route::any('accedeOpciones/{Correo}','Auth\LoginController@accederOpciones')->name('accederOpciones');

Route::any('salir','Auth\LoginController@logout')->name('logout');




Route::get('/signin', 'AuthController@signin');
Route::get('/authorize', 'AuthController@gettoken');





Route::get('usuarios/area', 'UsuariosController@secret');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
