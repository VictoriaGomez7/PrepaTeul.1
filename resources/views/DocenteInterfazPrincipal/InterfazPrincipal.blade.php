<!DOCTYPE html>
@extends('layouts.app')
@include('interfazprincipal.image')
<html>
<head>
	<meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="/css/style.css">
     <link rel="stylesheet" type="text/css" href="/css/estilos2.css">
      <link rel="stylesheet" type="text/css" href="/css/image.css">
     <link rel="icon" href="/images/images.ico">

	<title>Docente Inicio</title>
</head>
<body>
	

	<header>
		<nav class="navegacion" style="width: 90%">
			<ul class="menu">
				<li><a href="#">Listas</a>
						<ul class="submenu">
						<li><a href ="http://127.0.0.1:8000/VisualizaMaGr?valor={{ ($usua) }}">Visualizar</a></li>
					</ul>
				</li>
				<li><a href="#">Calificaciones</a>
						<ul class="submenu">
						<li><a href ="http://127.0.0.1:8000/AsignarCalificacion?valor={{ ($usua) }}">Capturar</a></li>

					</ul>
				</li>
				<li><a href="#">Asistencias</a>
						<ul class="submenu">
						<li><a href ="http://127.0.0.1:8000/Asistencias?valor={{ ($usua) }}">Capturar</a></li>
					</ul>
				<?php use App\Docentes;
					$Docente=Docentes::where('id',$usua)->get('Nombre');
				?>
				<li style="left: 55%;"><a  href="#" >Docente: {{$Docente[0]->Nombre}}</a>
					<ul class="submenu">
						<li><a href="http://127.0.0.1:8000/interfazpri">CERRAR SESION</a>
					</ul>
				</li>

			</ul>
		</nav>


	</header>

</body>
</html>
