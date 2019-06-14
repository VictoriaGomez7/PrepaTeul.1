<!DOCTYPE html>


@section('title','Consultar')

@include('ControlEscolar.CEprincipal')


@extends('layouts.app')

@section('frameTitulo')
@if (Session()->has('msj'))
  <div class="alert alert-danger" role="alert" style="width: 30%; position:  absolute;top: 43%; left: 35%;z-index: 1;">
    <button class="close" data-dismiss="alert"><span>&times;</span></button>
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
      <!-- vinculo a bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>

    <body>
     <div id="Contenedor" style="position: absolute; top: 45%; left: 35%">
<div class="ContentForm" style="text-align: center;" >
  {!! Form::open(['route'=>'PDF.index','method'=>'get','files'=>true]) !!}


      <div class="input-group input-group-lg" style="padding:10px; text-align: center; ">
      
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

      
{!! form::close() !!}
     </div>
<a href="ControlEscolarInicio">
    <button class="btn btn-lg btn-success btn-block btn-signin">Cancelar</button></a>

     </div>

</body>

@endsection()

