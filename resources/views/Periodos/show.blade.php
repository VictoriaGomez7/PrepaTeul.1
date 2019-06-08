{{--<a href="interfazprinci">
    <button class="btn btn-success" style="position: absolute;top: 110%;left:5%">Atras</button></a>--}}
@extends('layouts.app')

@section('title','Asistencias')

@include('DocenteInterfazPrincipal.InterfazPrincipal')
@section('content')
<h1>Aqui se van a vizualisar las materias que da el docente</h1>
<h2>Y al seleccionar la materia deben aparecer los alumnos</h2>
<h3>Y el como capturar su asistencia</h3>
@endsection
