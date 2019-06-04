@extends('layouts.app')

@section('title','Reinscripción Alumno')
 @include('ControlEscolar.CEprincipal')
@section('content')

		@include('Reinscripciones.form',compact('CAlumno'))


@endsection()