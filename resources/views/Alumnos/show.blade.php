@extends('layouts.app')

@section('title','Alumno')

@section('content')
		@include('alumnos.form',compact('CAlumno'))
@endsection()
