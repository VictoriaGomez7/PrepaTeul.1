<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="/css/style.css">
     <link rel="stylesheet" type="text/css" href="/css/estilos2.css">
      <link rel="stylesheet" type="text/css" href="/css/image.css">
     <link rel="icon" href="/images/images.ico">
	@extends('layouts.app')

	<title>Docente Inicio</title>
</head>

<body>
	@include('interfazprincipal.image')

    @if (session()->has('MsjERR'))
        <div class="alert alert-danger" role="alert" style="width: 90%; position:  absolute;top: 45%; left: 5%;z-index: 1;">
            <button class="close" data-dismiss="alert"><span>&times;</span></button>
            <strong>¡ERROR! </strong>{{ session('MsjERR') }}
        </div>
    @endif

	<header>
		<?php use App\Docentes;
			$Docente=Docentes::where('id',$usua)->get('Nombre');
		?>
		<div class="alert alert-success" role="alert" style="width: 90%; position:  absolute;top: 45%; left: 5%;z-index: 1;">
				<button class="close" data-dismiss="alert"><span>&times;</span></button>
				<strong>Bienvenido </strong> {{$Docente[0]->Nombre}}
			</div>
		<nav class="navegacion" style="width: 90%">

			<ul class="menu" style="width: 1000px;">
				<li><a href="#">Listas</a>
						<ul class="submenu">
						<li><a href ="http://127.0.0.1:8000/VisualizaMaGr?valor={{ ($usua) }}">Visualizar</a></li>
					</ul>
				<li><a href="#">Calificaciones</a>
						<ul class="submenu">
						<li><a href ="http://127.0.0.1:8000/AsignarCalificacion?valor={{ ($usua) }}">Capturar</a></li>
					</ul>
				</li>
				<li><a href="#">Asistencias</a>
						<ul class="submenu">
						<li><a href ="http://127.0.0.1:8000//Asistencias?valor={{ ($usua) }}">Capturar</a></li>
						</ul>

				<li style="left: 65%;"><a  href="#" >Docente: {{$Docente[0]->Nombre}}</a>
					<ul class="submenu">
						<li><a href="http://127.0.0.1:8000/interfazpri">CERRAR SESION</a>
					</ul>
				</li>


			</ul>
		</nav>

		@include('interfazprincipal.imagenn')
	</header>

	<p align="center" style="color: black; font-size: 1.3em;position: absolute;top: 110%;left:5%; background: #EEF0F3; width: 90%">
		</br>
		Constitución #100 Teul de González Ortega.<br/>
	    Zac. C.P. 99800 <br/>
	    Teléfono (467)-952-71-83 <br/>
	    Correo-e:prepateul@yahoo.com.mx
    </p >
</body>
</html>
