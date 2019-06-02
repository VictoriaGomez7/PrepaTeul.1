{{--<a href="interfazprinci">
    <button class="btn btn-success" style="position: absolute;top: 110%;left:5%">Atras</button></a>--}}
@extends('layouts.app')

@section('title','Docente')

{{--@include('interfazprincipal.image')--}}
@include('ControlEscolar.CEprincipal')
@section('content')
	@if (session()->has('msj'))
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<div class="alert alert-danger" role="alert" style="width: 30%; position:  absolute;top: 43%; left: 35%;z-index: 1;">
			<button type="button" class="close" data-dismiss="alert" >&times;</button>
			<strong>¡Error! </strong>{{session('msj')}}
		</div>
	@endif
	@if (session()->has('re'))
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	@endif
	    @if (session()->has('msj1'))
        <div class="alert alert-success" role="alert" style="width: 30%; position:  absolute;top: 43%; left: 35%;z-index: 1;">
            <button class="close" data-dismiss="alert"><span>&times;</span></button>
            <strong>¡Correcto! </strong>{{ session('msj1') }}
        </div>
    @endif
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
  height: 170px;
  border-radius:8px;
  padding: 0px 9px 0px 9px;
}

/**
 * Aplicando al icono de usuario el color de fondo,
 * rellenado de 20px y un redondeado de 120px en forma
 * de un circulo
 */

/**
 * Se aplica al contenedor madre un margen de tamaño 10px hacia la cabecera y pie,
 * color de fuente blanco,un tamaño de fuente 50px y texto centrado.
 */

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
  <!-- Temas--
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
   se vincula al hoja de estilo para definir el aspecto del formulario de login--
  <link rel="stylesheet" type="text/css" href="estilo.css"-->
  </head>

<body>
  <div id="Contenedor" style="position: absolute; top: 45%; left: 35%">
  <div class="ContentForm" style="text-align: center;" >
    <form type="session" class="form-group"  method="GET" action="/Docente">


        <div class="input-group input-group-lg" style="padding:10px; text-align: center; ">
        <label for="Matricula"  style="margin: 0px; padding: 0px;color: #4B5E7B; font-size:20px;">Buscar Docente</label>

      </div>
      <div class="input-group input-group-lg">

        <input type="text" class="form-control" name="id1" placeholder="Clave" id="Usuario" aria-describedby="sizing-addon1" style="z-index: 0;">

      </div>
      <br>
      <div class="input-group input-group-lg">

        <input type="text" name="name" class="form-control" placeholder="Nombre" aria-describedby="sizing-addon1" style="z-index: 0;">
      </div>
      <br>
      <p><button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Buscar</button></p>

        </form>
       </div>

    <a href="ControlEscolarInicio">
    <button class="btn btn-lg btn-success btn-block btn-signin">Cancelar</button></a>
  </div>

  </body>
   <!-- vinculando a libreria Jquery-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <!-- Libreria java scritp de bootstrap -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
@endsection