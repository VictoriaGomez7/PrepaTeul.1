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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/interfazpri', function () {
    return view('interfazprincipal.Interfaz');
});

Route::get('/ControlEscolar', function () {
    return view('ControlEscolar.CEprincipal');
});

Route::get('/ControlEscolarInicio', function () {
    return view('ControlEscolar.CEprincipal2');
});

Route::get('/inscripcion', function () {
    return view('Inscripcion.create');
});

Route::get('/reinscripcion', function () {
    return view('Reinscripciones.create');
});

Route::get('/Eliminar', function () {
    return view('Alumnos.create');
});

Route::get('/compro', function () {
    return view('Inscripcion.consultar');
});

Route::get('/comprom', function () {
    return view('Inscripcion.consultar0');
});

Route::get('/Reinscripcion',function(){
    return view('Reinscripciones.form');
});
// ESTA PARTE AGREGUE YO PARA REGISTRAR DOCENTES
Route::get('/RegistraDocente', function () {
    return view('RegistrarDocentes.create');
});
// ESTA PARTE AGREGUE YO PARA REGISTRAR MATERIAS
Route::get('/RegistraMateria', function () {
    return view('RegistrarMaterias.create');
});

Route::get('/alumnosconsulta',function(){
    return view('Alumnos.consulta');
});

Route::get('/docenteconsulta' ,function(){
    return view('DocenteC.createC');
});


Route::resource('LoginAlumno','LoginAController');

Route::resource('LoginDocente','LoginMController');

Route::resource('LoginControlEscolar','LoginCEController');

Route::resource('LoginDirector','LoginDController');

Route::resource('Reinscripcion','ReinscripcionesController' );

Route::resource('Docente','DocenteController');

Route::resource('materia','MateriaController');

Route::resource('Alumnos','AlumnosController' );

Route::resource('compromisos','compromisoEstudianteController' );

Route::resource('compromisosFamilia','compromisoFamiliaController' );

Route::resource('PDF','PDFController' );

Route::resource('/formatoestudiantes', 'compromisoEstudianteController');

Route::resource('/formatofamilia', 'compromisoFamiliaController');
