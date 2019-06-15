<!DOCTYPE html>

<a href="http://127.0.0.1:8000/materiaConsulta">
            <button class="btn btn-success" style="position: absolute;top: 115%;left:65%">Cancelar</button></a>
<html>

@include('ControlEscolar.CEprincipal')
@extends('layouts.app')
<body>
    <script type="text/javascript">
      function habilitar(valor){
        if (valor=="Formación Propedéutica"){
          document.getElementById("Bachillerato").disabled = false;
        }
        else{
          document.getElementById("Bachillerato").disabled = true;
        }
      }
    </script>
      @if (session()->has('msjERROR'))
        <div class="alert alert-danger" role="alert" style="width: 50%; position:  absolute;top: 43%; left: 25%;z-index: 1;">
          <button class="close" data-dismiss="alert"><span>&times;</span></button>
          <strong>¡Error! </strong>{{ session('msjERROR') }}
        </div>
      @endif

      <div class="card-header text-center" style="font-size:200%;width: 50%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 52%; left: 25%;" >{{ __('Modificar Materia') }}</div>

      <div style="position: absolute;top: 62%; left: 25%; width: 50%;height:50%; background-color:#aaa">
      {!! Form::open(['route'=>['materia.store',$materia->Clave],'method'=>'POST','files'=>false]) !!}     {{ csrf_field() }}
   	
   			<p><label  style="font-size:130%; position:  absolute;top: 10%; left: 5%">Clave:</label></p>
    		<p><input type="text" name="Clave" value="{{ $materia->Clave }}" required="true" min="1" readonly style="font-size:105%; width: 65%; position:  absolute;top: 10%; left: 30%"></p>
        <p><input type="input" name="claveOriginal" value="{{ $materia->Clave }}"  hidden="true"></p>

        <p><label  style="font-size:130%; position:  absolute;top: 25%; left: 5%">Tipo:</label><p>
        <p><select name="Tipo" required="true"  style="font-size:105%; width: 65%; position:  absolute;top: 25%; left: 30%" onchange="habilitar(this.value)"><?php
            echo $opciones;
             ?></select></p>

        <p><label style="font-size:130%; position:  absolute;top: 40%; left: 5%">Nombre:</label><p>
        <p><input type="input" name="Nombre" value="{{ $materia->Nombre }}" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required="true" style="font-size:105%; width: 65%; position:  absolute;top: 40%; left: 30%"></p>
        
        <p><label style="font-size:130%; position:  absolute;top: 51%; left: 5%">Área</label><p>
        <p><label style="font-size:130%; position:  absolute;top: 57%; left: 5%">Propedéutica:</label><p>
        <p><select name="Bachillerato" id="Bachillerato" required style="font-size:110%;width: 65%; position:  absolute;top: 55%; left: 30%" disabled="true">
          <option value="{{ $materia->Bachillerato }}">{{ $materia->Bachillerato }}</option>
          <option value="Químico Biológica">Químico-Biológica</option>
          <option value="Físico Matemática">Físico-Matemática</option>
          <option value="Humanidades y Ciencias Sociales">Humanidades y Ciencias Sociales</option>
          <option value="Económico Administrativa">Económico-Administrativa</option>
        </select><p>

        <p><label  style="font-size:130%; position:  absolute;top: 70%; left: 5%">Semestre:</label></p>

        <p><select name="Semestre" required="true" style="font-size:105%; width: 65%; position:  absolute;top: 70%; left: 30%" ><?php
            echo $opciones2;
             ?></select></p>

        <p><label  style="font-size:130%; position:  absolute;top: 85%; left: 5%">Horas:</label><p>
        <p><input type="number" name="Horas"  min="1"  max="12" value="{{ $materia->Horas }}" required="true" style="font-size:105%; width: 65%; position:  absolute;top: 85%; left: 30%"></p>
    
    <!--<input type="submit" class="btn btn-primary" name="editar" value="Editar">-->
    </div>
</body>
    {!!Form::submit('Modificar',['class'=>'btn btn-primary', 'style'=>'position:  absolute;top: 115%; left: 55%'])!!}
    {!! form::close() !!}
