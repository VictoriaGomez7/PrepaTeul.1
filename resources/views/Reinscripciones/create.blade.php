{{--<a href="interfazprinci">
    <button class="btn btn-success" style="position: absolute;top: 110%;left:5%"><--Atrás</button></a>--}}
@extends('layouts.app')

@section('title','Reinscripción Alumno')

@include('ControlEscolar.CEprincipal')
@section('content')
	
<style>
/*Al cuerpo de la
pagina se aplica el tamaño de fuente
 */
body{
	font-size: 12px;
}
/**
 * se aplica el ancho, margen centrado
 * borde de un pixel con redondeado, y rellenado
 * a la izquierda y derecha
 */
#Contenedor{
  width: 400px;
  margin: 50px auto;
  background-color: #EEF0F3;
        border: 1px solid #C9D0D9;
  height: 110px;
  border-radius:8px;
  padding: 0px 9px 0px 9px;
}

/**
 * Aplicando al icono de usuario el color de fondo,
 * rellenado de 20px y un redondeado de 120px en forma
 * de un circulo
 */
.Icon span{
      background: #A8A6A6;
      padding: 20px;
      border-radius: 120px;
}
/**
 * Se aplica al contenedor madre un margen de tamaño 10px hacia la cabecera y pie,
 * color de fuente blanco,un tamaño de fuente 50px y texto centrado.
 */
.Icon{
     margin-top: 10px;
     margin-bottom:10px;
     color: #FFF;
     font-size: 50px;
     text-align: center;
}
/**
 * Se aplica al contenedor donde muestra en el pie
 * la opción de olvidaste tu contraseña?
 */
.opcioncontra{
	text-align: center;
	margin-top: 20px;
	font-size: 14px;
}

/**
 * En las siguientes lineas
 * se define el diseño adaptable, para que
 * se muestre en los dispositivos móviles
 */

/******************************************/
/***    DISEÑO PARA MOVILES 320        ****/
/******************************************/
@media only screen and (max-width:320px){
#Contenedor{
	width: 100%;
	height: auto;
	margin: 0px;
}

/******************************************/
/***    DISEÑO PARA MOVILES 240        ****/
/******************************************/
@media only screen and (max-width:240px){

}


</style>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
			<!-- vinculo a bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
	@if (session()->has('msjCorrecto'))
        <div class="alert alert-success" role="alert" style="width: 30%; position:  absolute;top: 43%; left: 35%;z-index: 1;">
            <button class="close" data-dismiss="alert"><span>&times;</span></button>
            <strong>¡Correcto! </strong>{{ session('msjCorrecto') }}
        </div>
    @endif

	@if (session()->has('msj'))
	<div class="alert alert-danger" role="alert" style="width: 30%; position:  absolute;top: 43%; left: 35%;z-index: 1;">
		<button type="button" class="close" data-dismiss="alert" >&times;</button>
		<strong>¡Error! </strong>{{session('msj')}}
		</div>
	@endif

	@if (session()->has('re'))
		<div class="alert alert-danger" role="alert" style="width: 30%; position:  absolute;top: 43%; left: 35%;z-index: 1;">
			<button type="button" class="close" data-dismiss="alert" >&times;</button>
			<strong>¡Reinscrito! </strong>{{session('msj')}}
		</div>

	@endif


	<div id="Contenedor" style="position: absolute; top: 45%; left: 35%">

		<div class="ContentForm" style="text-align: center;">

			<form type="session" class="form-group"  method="GET" action="/Reinscripcion/show">
				<div class="input-group input-group-lg">
					<label for="Matricula" style="margin: 0px; padding: 0px;color: #4B5E7B; font-size:20px;">Buscar Alumno</label>

				</div>
				<div class="input-group input-group-lg">
					<input type="text" name="PMatri" class="form-control" placeholder="Matrícula" aria-describedby="sizing-addon1" required style="z-index: 0;">
				</div>
				
				<br><br>
				<p><button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Reinscribir</button></p>
		 	</form>
		</div>

		<a href="/ControlEscolarInicio">
    		<button class="btn btn-lg btn-success btn-block btn-signin">Cancelar</button></a>
	</div>
</body>

@endsection