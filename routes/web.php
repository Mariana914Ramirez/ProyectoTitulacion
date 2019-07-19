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


Route::get('cuentaConsultorio', 'ConsultorioController@cuenta')->name('cuenta');
Route::any('visitarConsultorio/{id}', 'ConsultorioController@PacientesVisitantes')->name('PacientesVisitantes');


Route::any('comentarConsultorios/{id}', 'ConsultorioController@comentarConsultorios')->name('comentarConsultorios');

Route::any('estadisticas/{id}', 'ConsultorioController@estadisticas')->name('estadisticas');





Route::resource('administrador', 'AdministradorController');


Route::any('noCumpleRequisitosAnuncio/{id}/{anuncio}', 'CorreosController@NoCumpleRequisitos')->name('NoCumpleRequisitos');
Route::any('agregarAnuncio/{id}/{anuncio}', 'CorreosController@AgregarAnuncio')->name('AgregarAnuncio');
Route::any('especialdadAgregada/{id}', 'CorreosController@EspecialdadAgregada')->name('EspecialdadAgregada');


Route::resource('imagenes', 'imagenController');
Route::any('anuncios', 'imagenController@anuncios')->name('anuncios');






Route::resource('doctor', 'DoctorController');
Route::get('modificarHorarios', 'DoctorController@horario')->name('horario');
Route::any('precios', 'DoctorController@precios')->name('precios');
Route::any('visitantes/{doctor}/{consultorio}', 'DoctorController@visitantes')->name('visitantes');
Route::any('citas/{doctor}/{consultorio}', 'DoctorController@citas')->name('citas');
Route::any('generarCitas', 'DoctorController@generarCitas')->name('generarCitas');


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







Route::get('usuarios/area', 'UsuariosController@secret');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
