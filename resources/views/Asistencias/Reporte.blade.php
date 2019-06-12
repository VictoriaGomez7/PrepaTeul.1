<!doctype html>
<a href="http://127.0.0.1:8000/Asistencias">
            <button class="btn btn-success" style="position: absolute;top: 100%;left:75%">Cancelar</button></a>
<body>
	@extends('layouts.app')

    @section('title','Docente')
    <div class="card-header text-center" style="font-size:200%;width: 90%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 42%; left: 5%;" >{{ __('REPORTE DE ASISTENCIA') }}</div>

    @include('ControlEscolar.CEprincipal')
    @foreach($CAlumno as $alumno)
    @section('content')
     <form class="form-group" method="PUT" action="/Asistencia/{{$alumno->id}}/edit">
                {{--@method('PUT')--}}
     @csrf
    	<div style="position: absolute;top: 55%; left: 25%; width: 20%;height:39%; ">
    	    <p style="font-size:130%">{{('Número de control:')}}</p>
    	    <p style="font-size:130%">{{('Asistencia:')}}</p>
    	    <p style="font-size:130%">{{('Falta:')}}</p>
    	    <p style="font-size:130%">{{('Retardo:')}}</p>
    	    <p style="font-size:130%">{{('Periodo:')}}</p>
    	</div>
    	<div style="position: absolute;top: 55%; left: 39%; width: 17%;height:39%;  ">
    		<p><input type="text" required  pattern="[0-9]{1-2}" readonly name="NumC" value="{{$alumno->id}}"  style="font-size:105%; width: 45%"/></p>
    		<p><input type="text" required  pattern="[0-9]{1-2}" readonly name="Asiss" value="{{$alumno->Asistencias}}"  style="font-size:105%; width: 45%"/></p>
    		<p><input type="text" required  pattern="[0-9]{1-2}" readonly name="Faltt" value="{{$alumno->Faltas}}"  style="font-size:105%; width: 45%"/></p>
    		<p><input type="text" required  pattern="[0-9]{1-2}" readonly name="rett"  value="{{$alumno->Retardos}}" style="font-size:105%; width: 45%"/></p>
    		<p><input type="text" required  pattern="[0-9]{1-2}" readonly name="perr" value="{{$alumno->Periodo}}" style="font-size:105%; width: 45%"/></p>

    	</div>
        <div style="position: absolute;top: 55%; left: 50%; width: 20%;height:39%;">
            <p style="font-size:130%">{{('Porcentaje por periodo')}}</p>
            <p style="font-size:130%">{{('Porcentaje:')}}</p>
            <p style="font-size:130%">{{('Porcentaje:')}}</p>
            <p style="font-size:130%">{{('Porcentaje:')}}</p>
            <p style="font-size:130%">{{('')}}</p>
        </div>
        <div style="position: absolute;top: 63%; left: 69%; width: 17%;height:39%;  ">
          
            <p><input type="text" required  pattern="[0-9]{1-2}" readonly name="Asiss"   style="font-size:105%; width: 45%"/></p>
            <p><input type="text" required  pattern="[0-9]{1-2}" readonly name="Faltt"   style="font-size:105%; width: 45%"/></p>
            <p><input type="text" required  pattern="[0-9]{1-2}" readonly name="rett"  style="font-size:105%; width: 45%"/></p>
           

        </div>
     </form>}
</body>
@endforeach
