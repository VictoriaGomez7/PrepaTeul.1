<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
   	<link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/estilos2.css">
    <link rel="stylesheet" type="text/css" href="/css/image.css">
    <link rel="icon" href="/images/escolarcono.ico">

	<title>Control Escolar</title>
</head>
<body>
	@include('interfazprincipal.image')

	
	{{--<section style="width: 100%; max-width: 90%; background: #FEEEEF"> --}}
		<header >
			<nav class="navegacion" style="width: 90%">
				<ul class="menu" >
					<li><a href="#">Alumnos</a>
							<ul class="submenu">
							<li><a href ="http://127.0.0.1:8000/inscripcion"> Inscripción</a></li>
							<li><a href="http://127.0.0.1:8000/reinscripcion">Reinscripión</a></li>
							<li><a href="http://127.0.0.1:8000/alumnosconsulta">Consultar</a></li>
						</ul>
					</li>
					<li><a href="#">Docentes</a>
						<ul class="submenu">
							<li><a href="http://127.0.0.1:8000/RegistraDocente">Registrar</a></li>
							<li><a href="http://127.0.0.1:8000/docenteconsulta">Consultar</a></li>
						</ul>
					</li>
					<li><a href="#">Directivo</a></li>
					<li><a href="#">Materias</a>
						<ul class="submenu">
							<li><a href="http://127.0.0.1:8000/RegistraMateria">Registrar</a></li>
							<li><a href="http://127.0.0.1:8000/materia">Consultar</a></li>
						</ul>
					</li>
					<li><a href="#">Compromisos</a>
							<ul class="submenu">
							<li><a href="http://127.0.0.1:8000/compromisos">Agregar Compromisos Estudiantes</a></li>
							<li><a href="http://127.0.0.1:8000/compromisosFamilia">Agregar Compromisos Familia</a></li>
							<li><a href="http://127.0.0.1:8000/compro">Formatos PDF</a></li>
						</ul>
					</li>
					<li><a href="#">Asignaciones</a>
						<ul class="submenu">
							<li><a href="http://127.0.0.1:8000/grupos">Crear Grupos</a></li>
							<li><a href="http://127.0.0.1:8000/Asigna">Docentes - Materias</a></li>
						</ul>
					</li>
				</ul>
			</nav>
			{{--@include('interfazprincipal.imagenn')--}}
		</header>
	{{-- </section> --}}
</body>
</html>