
@extends('layouts.app')

@section('title','Consultar')

@include('ControlEscolar.CEprincipal')


@section('frameTitulo')
@if (Session()->has('msj'))
  <div class="alert alert-danger" role="alert" style="width: 30%; position:  absolute;top: 43%; left: 35%;z-index: 1;">
    <strong>¡Error! </strong>{{Session('msj')}}
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
  height: 150px;
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
  {!! Form::open(['route'=>'PDF.index','method'=>'get','files'=>true]) !!}


      <div class="input-group input-group-lg" style="padding:10px; text-align: center; ">
      {{--<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
      <input type="text" class="form-control" name="Usuario" placeholder="Usuario" id="Usuario" aria-describedby="sizing-addon1" required>--}}
      <label for="Matrícula"  style="margin: 0px; padding: 0px;color: #4B5E7B; font-size:20px;">Buscar Formato</label>

    </div>
    <div class="input-group input-group-lg">

      <p><input type="text" id="id" name="id" placeholder="Matrícula del alumno" class="form-control" style="font-size:18px; width: 100%;z-index: 0"/></p>
      <br>
        <h4><input type="radio" required  id="opcion" name="opcion" style="color: #4B5E7B; width:26%; height=50% z-index: 2;" value="2">Inscripción</h4>
        <h4><input type="radio" required id="opcion" name="opcion" style="color: #4B5E7B;width:26%; height=50%; z-index: 2;" value="1">Reinscripción</h4>

    </div>
    <br>
    <p><button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Generar documento</button></p>

        {{--
          <p><button class="btn btn-lg btn-primary btn-block btn-signin" id="IngresoLog" type="submit">Entrar</button></p>

          <div class="opcioncontra"><a href="">Olvidaste tu contraseña?</a></div>--}}
{!! form::close() !!}
     </div>
<a href="ControlEscolarInicio">
    <button class="btn btn-lg btn-success btn-block btn-signin">Cancelar</button></a>

     </div>

</body>
 <!-- vinculando a libreria Jquery-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <!-- Libreria java scritp de bootstrap -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  {{--<form type="session" class="form-group"  method="GET" action="/DocenteC/show">
      <div class="text-center">
      <label for="Clave1" style="/*posicion->*/position: absolute;top:260px; left:500px; margin: 0px; padding: 0px;/*color: #696969;*/ font-size:20px;">Clave</label>

      <input type="text" id="id1" name="id1"  style="/*ancho->*/width: 25%; padding: 7px 20px;margin: 8px 0;/*posicion->*/position: absolute; top: 280px; left: 500px;/*ancho y color del borde->*/border: 1px solid #646464;border-radius: 10px;box-sizing: border-box;right: 500px;/*alinacion del texto->*/text-align: center; color:#646464;">

      <label for="nomb" style="/*posicion->*/position: absolute;top:340px; left:500px; margin: 0px; padding: 0px;/*color: #696969;*/ font-size:20px;">Nombre</label>

      <input type="text" id="name" name="name" style="/*ancho->*/width: 25%; padding: 7px 20px;margin: 8px 0;/*posicion->*/position: absolute; top: 360px; left: 500px;/*ancho y color del borde->*/border: 1px solid #646464;border-radius: 10px;box-sizing: border-box;right: 500px;/*alinacion del texto->*/text-align: center; color:#646464;">

      <button  class="btn btn-primary" style="/*posicion->*/position: absolute; top: 410px; left: 550px; /*ancho->*/width: 200; /*color del boton->*/background-color:#000080;/*color del dexto->*/color:white; padding: 7px 20px;margin: 8px 0;border: none;border-radius: 20px;/*evento->*/cursor: pointer;font-size:18px;">Buscar</button>
    </div>
  </form>--}}
@endsection()

