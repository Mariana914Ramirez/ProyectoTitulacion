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


Route::resource('administrador', 'AdministradorController');



Route::get('cuentaConsultorio', 'ConsultorioController@cuenta')->name('cuenta');



Route::resource('doctor', 'DoctorController');
Route::get('modificarHorarios', 'DoctorController@horario')->name('horario');



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
//Route::any('elegirDoctor/{Correo}','Auth\LoginController@elegirDoctor')->name('elegirDoctor');
Route::any('accedeAsis/{Correo}/{id}','Auth\LoginController@accedeAsis')->name('accedeAsis');

Route::any('accedeDoctor/{Correo}','Auth\LoginController@accederDoctor')->name('accederDoctor');
Route::any('accedeDoctorConsultorio/{Correo}/{Registro}/{Id}','Auth\LoginController@volverAccederDoctor')->name('volverAccederDoctor');
Route::any('accedeAsistente/{Correo}','Auth\LoginController@accederAsistente')->name('accederAsistente');
Route::any('accedeUsuario/{Correo}','Auth\LoginController@accederUsuario')->name('accederUsuario');

Route::any('salir','Auth\LoginController@logout')->name('logout');







Route::get('usuarios/area', 'UsuariosController@secret');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
