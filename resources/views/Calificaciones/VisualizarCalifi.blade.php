<!DOCTYPE html>
<a href="/DocenteInicios?valor={{ ($usua)}}">
    <button class="btn btn-success" style="position: absolute;top: 103%;left:5%;z-index: 1;">Cancelar</button></a>

<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/estilos2.css">
    <link rel="stylesheet" type="text/css" href="/css/image.css">
	@extends('layouts.app')
	<title>Visualizar</title>
</head>
<body>
	<style type="text/css">
			.NombreMateria{
				cursor: pointer;
			}
		</style>
	@include('DocenteInterfazPrincipal.InterfazPrincipal')

	 <div class="card-header text-center" style="font-size:200%;width: 20%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 48%; left: 5%;" >{{ __('Materias') }}</div>
	<section style="background: #aaa; width:20%; height: 42%; position: absolute; top: 58%; left: 5%; overflow-y: scroll; text-align:  center;">

		@foreach($MateriasDelDocente as $MateriasDelDocent)
			<!--<?php print_r($MateriasDelDocent->Materia); ?>-->


			{!!Form::open(['route' => ['AsignarCalificacion.store'],'method'=>'POST'])!!}
			<input type="submit" value="{{$MateriasDelDocent->Materia." ".$MateriasDelDocent->Grupo}}" name="MateriaSeleccionada" class="NombreMateria" style="background-color: #85C1E9; border: 2px solid #0000000; width: 200px;height: 40px; margin: 5px;" readonly>
			<input type="hidden" value="{{$MateriasDelDocent->ClaveMateria}}" name="ClaveMateriaSelec" >
			<input type="hidden" value="{{$MateriasDelDocent->Grupo}}" name="Grupo" >
			<input type="hidden" value="{{$id}}" name="idDocente" >
			<input type="hidden" value="{{$usua}}" name="usua" >
			{!! Form::Close() !!}

		@endforeach

	</section>
	<?php //print $visibility;
	//print $usua;
	view('DocenteInterfazPrincipal.InterfazPrincipal',compact('usua'));
	?>
	@if($visibility==1)
		<div class="card-header text-center" style="font-size:200%;width: 69%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 48%; left: 26%;" >{{ __($Materiasele)}}</div>

		<div class="card-header text-center" style="font-size:100%;width: 70%; height:50%; background: white; overflow-y: scroll; color: rgb(212, 172, 13); position:  absolute;top: 58%; left: 25%;" >
			<table  id="alumn" class="table" style="width: 100%">
		        <tr style="font-size:120%">
		          <th  align="center" style="width:2%">{{ ('Matrícula') }}</th>
		          <th  align="center">{{ ('Alumno') }}</th>
		          <th  align="center">{{ ('Parcial 1') }}</th>
		          <th  align="center">{{ ('Parcial 2') }}</th>
		        </tr>
		        	<?php $contador=0;?>
		        @foreach($AlumnosEnMismoSemestre as $AlumnosEnMismoSemestr)
		          <tr>
		            <td>{{ $AlumnosEnMismoSemestr[$contador]->id }}</td>
		            <td >{{ $AlumnosEnMismoSemestr[$contador]->Nombre_A}}</td>
		            <td><input type="number" step="0.1" name="Parcial1" placeholder="0"> </td>
		            <td><input type="number" step="0.1" name="Parcial2" placeholder="0"></td>
		          </tr>
		         @endforeach
		    </table>
		</div>

		@foreach($AlumnosEnMismoSemestre as $AlumnosEnMismoSemestr)
		<?php //print $AlumnosEnMismoSemestr[0]->Nombre_A; ?>
		@endforeach
	@elseif($visibility==2)
		<div class="card-header text-center" style="font-size:135%;width: 30%; height:15%; background: #FFFFFF; color: rgb(26, 35, 126); position:  absolute;top: 70%; left: 45%;" >{{ __(' ') }}</div>
	@else
		<div class="card-header text-center" style="font-size:200%;width: 69%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 48%; left: 26%;" >{{ __($Materiasele)}}</div>
		<div class="card-header text-center" style="font-size:135%;width: 30%; height:15%; background: #839192; color: rgb(26, 35, 126); position:  absolute;top: 70%; left: 45%;" >{{ __('No hay alumnos registrados en esta materia.') }}</div>
	@endif
	</div>
</body>
</html>