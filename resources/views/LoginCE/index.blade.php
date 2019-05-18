
@extends('layouts.app')

@section('title','Control Escolar')
@include('interfazprincipal.image')

@section('content')
	@if (session()->has('msj'))
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert" >&times;</button>
			<strong>¡¡Error!!</strong>{{session('msj')}}
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
	background-color: #F3EDED;
        border: 1px solid #ECE8E8;
	height: 400px;
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
<!-- Temas--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- se vincula al hoja de estilo para definir el aspecto del formulario de login--
<link rel="stylesheet" type="text/css" href="estilo.css"-->
		</head>
		<body>
		 <div id="Contenedor">
		 <div class="Icon">
                    <!--Icono de usuario-->
                   <span class="glyphicon glyphicon-user"></span>
                 </div>
<div class="ContentForm">
	<form type="session" class="form-group"  method="GET" action="/LoginControlEscolar/show">
		<div class="input-group input-group-lg">
				  <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
				  <input type="text" class="form-control" name="Usuario" placeholder="Usuario" id="Usuario" aria-describedby="sizing-addon1" required>
				</div>
				<br>
				<div class="input-group input-group-lg">
				  <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
				  <input type="password" name="Contraseña" class="form-control" placeholder="Contraseña" aria-describedby="sizing-addon1" required>
				</div>
				<br>
				<p><button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Entrar</button></p>

				{{--
					<p><button class="btn btn-lg btn-primary btn-block btn-signin" id="IngresoLog" type="submit">Entrar</button></p>

					<div class="opcioncontra"><a href="">Olvidaste tu contraseña?</a></div>--}}
		 	</form>
		 </div>

		 <a href="interfazpri">
    <button class="btn  btn-lg btn-success btn-block btn-signin">Cancelar</button></a>
		 </div>
     <br><br><br><br><br>
      <p align="center" style="color: black; font-size: 1.3em;"> Constitución s/n Teúl de González Ortega.<br/>
     Zac. C.P. 99800 <br/>
    Teléfono (467)-952-71-83 <br/>
      Correo-e:prepateul@yahoo.com.mx
     </p >
</body>
 <!-- vinculando a libreria Jquery-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <!-- Libreria java scritp de bootstrap -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	{{--<form type="session" class="form-group"  method="GET" action="/LoginControlEscolar/show">
	    <div class="row" style="position: absolute;top: 261px; left: 440px; width: 1500px; height:250px">
		    <div class="col-lg-4" name='Columna' style="background-color:#aaa">

				<p><label style="/*posicion->*/position: absolute; top:10%; left: 5%; font-size:130% " >Usuario:</label></p>

				<input type="text" id="Usuario" name="Usuario" required style="/*ancho->*/width: 50%; padding: 7px 20px;margin: 8px 0;/*posicion->*/position: absolute; top: 5%; left: 30%;/*ancho y color del borde->*/border: 1px solid #646464;border-radius: 10px;box-sizing: border-box;right: 500px;/*alinacion del texto->*/text-align: center; color:#646464;">

				<p><label style="/*posicion->*/position: absolute; top: 50%; left: 5%; font-size:130% " >Contraseña:</label></p>

				<p><input type="password" required  id="contraseña" name="Contraseña" style="/*ancho->*/width: 50%; padding: 7px 20px;margin: 8px 0;/*posicion->*/position: absolute; top: 45%; left: 30%;/*ancho y color del borde->*/border: 1px solid #646464;border-radius: 10px;box-sizing: border-box;right: 500px;/*alinacion del texto->*/text-align: center; color:#646464;"/></p>

					<p><button  type="submit" class="btn btn-primary" style="position: absolute;top: 80%;left:35%" >Aceptar</button></p>
			</div>
		</div>
	</form>--}}
@endsection