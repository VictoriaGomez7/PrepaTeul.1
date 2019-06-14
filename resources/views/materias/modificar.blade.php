<!DOCTYPE html>

<a href="http://127.0.0.1:8000/materiaConsulta">
            <button class="btn btn-success" style="position: absolute;top: 115%;left:65%">Cancelar</button></a>
<html>

@include('ControlEscolar.CEprincipal')
@extends('layouts.app')
<body>
      @if (session()->has('msj2'))
        <div class="alert alert-danger" role="alert">
              <button type="button" class="close" data-dismiss="alert" >&times;</button>
              <strong>¡Error! </strong>{{session('msj2')}}
        </div>
      @endif

      <div class="card-header text-center" style="font-size:200%;width: 50%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 52%; left: 25%;" >{{ __('Modificar Materia') }}</div>

      <div style="position: absolute;top: 62%; left: 25%; width: 50%;height:50%; background-color:#aaa">
      {!! Form::open(['route'=>['materia.store',$materia->Clave],'method'=>'POST','files'=>false]) !!}     {{ csrf_field() }}
   	
   			<p><label  style="font-size:130%; position:  absolute;top: 10%; left: 10%">Clave:</label></p>
    		<p><input type="text" name="Clave" value="{{ $materia->Clave }}" required="true" min="1" readonly style="font-size:105%; width: 65%; position:  absolute;top: 10%; left: 30%"></p>
        <p><input type="input" name="claveOriginal" value="{{ $materia->Clave }}"  hidden="true"></p>

        <p><label  style="font-size:130%; position:  absolute;top: 25%; left: 10%">Tipo:</label><p>
        <p><select name="Tipo" required="true"  style="font-size:105%; width: 65%; position:  absolute;top: 25%; left: 30%"><?php
            echo $opciones;
             ?></select></p>

        <p><label style="font-size:130%; position:  absolute;top: 40%; left: 10%">Nombre:</label><p>
        <p><input type="input" name="Nombre" value="{{ $materia->Nombre }}" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required="true" style="font-size:105%; width: 65%; position:  absolute;top: 40%; left: 30%"></p>

        <p><label  style="font-size:130%; position:  absolute;top: 55%; left: 10%">Semestre:</label></p>

        <p><select name="Semestre" required="true" style="font-size:105%; width: 65%; position:  absolute;top: 55%; left: 30%" ><?php
            echo $opciones2;
             ?></select></p>

        <p><label  style="font-size:130%; position:  absolute;top: 70%; left: 10%">Horas:</label><p>
        <p><input type="number" name="Horas"  min="1"  max="12" value="{{ $materia->Horas }}" required="true" style="font-size:105%; width: 65%; position:  absolute;top: 70%; left: 30%"></p>
    
    <!--<input type="submit" class="btn btn-primary" name="editar" value="Editar">-->
    </div>
</body>
    {!!Form::submit('Modificar',['class'=>'btn btn-primary', 'style'=>'position:  absolute;top: 115%; left: 55%'])!!}
    {!! form::close() !!}
