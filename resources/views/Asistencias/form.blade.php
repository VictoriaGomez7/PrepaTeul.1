<!DOCTYPE html>
{{--<a href="interfazprinci">
    <button class="btn btn-success" style="position: absolute;top: 110%;left:5%">Atras</button></a>--}}
@extends('layouts.app')

@section('title','Docente')

{{--@include('interfazprincipal.image')--}}
@include('ControlEscolar.CEprincipal')
@section('content')
@foreach($Alumno as $alumno)
{!!Form::open(['route' => ['Asistencias.create'],'method'=>'get'])!!}
<p>Clave del Alumno</p>
<p><input type="text" required readonly  name="id" value="{{$alumno->id}}" style="font-size:105%; width: 95%"/></p>
<p>Nombre</p>
<p><input type="text" required readonly  name="Nombre" value="{{$alumno->Nombre_A}}" style="font-size:105%; width: 95%"/></p>
<p>Asistencias</p>
<p><input type="text" required  pattern="[0-9]{1-2}" name="Asist"  style="font-size:105%; width: 95%"/></p>
<p>Retardos</p>
<p><input type="text" required  pattern="[0-9]{1-2}" name="Ret"  style="font-size:105%; width: 95%"/></p>
<p>Faltas</p>
<p><input type="text" required  pattern="[0-9]{1-2}" name="Falt"  style="font-size:105%; width: 95%"/></p>
@endforeach

{!!Form::submit('Aceptar',['class'=>'btn btn-primary'])!!}
{!! Form::close()!!}

@endsection
