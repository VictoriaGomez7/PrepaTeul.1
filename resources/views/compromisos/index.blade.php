<!DOCTYPE html>
<html>
<head>
	@include('ControlEscolar.CEprincipal')
	<title></title>
	
	
	@extends('layouts.app')


</head>
<body>

	<center>
		<h2> Mis compromisos como estudiante:</h2>

	@include('compromisos.mostrar')

	@if(!session('status1'))
		@include('compromisos.reinscripcionCompromisos')
	@endif

	@if(session('status1'))
		{{ $compromisoEstudiante }}
		@include('compromisos.busqueda')

	@endif
	</center>
</body>

@if (session()->has('msj2'))

    <div class="alert alert-danger" role="alert" style=" position: absolute; top: 22%; left: 40%">
      <button type="button" class="close" data-dismiss="alert" ><span>&times;</span></button>
      <strong>¡Error! </strong>{{session('msj2')}}
    </div>
  @endif
</html>