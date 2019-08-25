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
		<title>Asignar Calificaciones</title>
	</head>

	<body>
		<style type="text/css">
			.NombreMateria{
				cursor: pointer;}
		</style>
		
		@include('DocenteInterfazPrincipal.InterfazPrincipal')

	 	<div class="card-header text-center" style="font-size:200%;width: 20%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 48%; left: 5%;" >{{ __('Materias') }}</div>
		<section style="background: #aaa; width:20%; height: 42%; position: absolute; top: 58%; left: 5%; overflow-y: scroll; text-align:  center;">

			@foreach($MateriasDelDocente as $MateriasDelDocent)

				{!!Form::open(['route' => ['AsignarCalificacion.store'],'method'=>'POST'])!!}
				<input type="submit" value="{{$MateriasDelDocent->Materia." ".$MateriasDelDocent->Grupo}}" name="MateriaSeleccionada" class="NombreMateria" style="background-color: #85C1E9; border: 2px solid #0000000; width: 200px;height: 40px; margin: 5px;" readonly>
				<input type="hidden" value="{{$MateriasDelDocent->ClaveMateria}}" name="ClaveMateriaSelec" >
				<input type="hidden" value="{{$MateriasDelDocent->Grupo}}" name="Grupo" >
				<input type="hidden" value="{{$id}}" name="idDocente" >
				<input type="hidden" value="{{$usua}}" name="usua" >
				{!! Form::Close() !!}

			@endforeach

		</section>
		<?php 
			view('DocenteInterfazPrincipal.InterfazPrincipal',compact('usua'));
		?>

		@if($visibility==1)
			{!! Form::open(['route'=>['AsignarCalificacion.edit',$usua],'method'=>'GET']) !!}
				<div class="card-header text-center" style="font-size:200%;width: 69%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 48%; left: 26%;" >{{ __($Materiasele)}}</div>

				<div class="card-header text-center" style="font-size:100%;width: 70%; height:51%; background: white; overflow-y: scroll; color: rgb(212, 172, 13); position:  absolute;top: 58%; left: 25%;" >
					<table  id="alumn" class="table" style="width: 100%">
				        <tr style="font-size:120%">
				        	<th  align="center" style="width:2%">{{ ('Matrícula') }}</th>
				        	<th  align="center">{{ ('Alumno') }}</th>
				          	<th  align="center">{{ ('Parcial 1') }}</th>
				          	<th  align="center">{{ ('Parcial 2') }}</th>
				        </tr>
			        
			        	<?php $contador=0;
			        		$Con_cal=0; ?>
				        	
					        @foreach($AlumnosEnMismoSemestre as $AlumnosEnMismoSemestr)

						        <input type="hidden" name="ClaveA[]" value="{{ $AlumnosEnMismoSemestr[$contador]->id }}">
						        <input type="hidden" name="ClaveM" value="{{$Calif_Extraidas[$contador]->ClaveM}}">
						        <input type="hidden" name="Semestre" value="{{$Calif_Extraidas[$contador]->Semestre}}">
						        <input type="hidden" name="Año" value="{{$Calif_Extraidas[$contador]->Año}}">
						        <input type="hidden" name="Usua" value="{{ __($usua)}}">

							    <tr>
						            <td>{{ $AlumnosEnMismoSemestr[$contador]->id }}</td>
						            <td >{{ $AlumnosEnMismoSemestr[$contador]->Nombre_A}}</td>
						            @if($PeriodoActivo==1)
						            	<td><input type="number" step="0.1" name="Calif1[]" min="0" max="10" value="{{$Calif_Extraidas[$Con_cal]->Parcial1}}"> </td>

						            	<td><input hidden="" type="number" step="0.1" name="Calif2[]" min="0"  max="10" value="{{$Calif_Extraidas[$Con_cal]->Parcial2}}">

						            	<input disabled="" type="number" step="0.1" min="0"  max="10" name="Calif2[]" value="{{$Calif_Extraidas[$Con_cal]->Parcial2}}"></td>
						            @elseif($PeriodoActivo==2)
					            		<input hidden="" type="number" step="0.1" min="0"  max="10" name="Calif1[]" value="{{$Calif_Extraidas[$Con_cal]->Parcial1}}">
					            		<td><input disabled type="number" min="0"  max="10" step="0.1" name="Calif1[][]" value="{{$Calif_Extraidas[$Con_cal]->Parcial1}}"> </td>
					            		<td><input type="number" step="0.1" min="0"  max="10" name="Calif2[]" value="{{$Calif_Extraidas[$Con_cal]->Parcial2}}"></td>
					            	@else
							            <input hidden="" type="number" step="0.1" min="0"  max="10" name="Calif1[]" value="{{$Calif_Extraidas[$Con_cal]->Parcial1}}">
							            <input hidden="" type="number" step="0.1" min="0" max="10" name="Calif2[]" value="{{$Calif_Extraidas[$Con_cal]->Parcial2}}">
					            		<td><input disabled type="number" step="0.1" min="0" max="10" name="Calif1[]" value="{{$Calif_Extraidas[$Con_cal]->Parcial1}}"> </td>
					            		<td><input disabled type="number" step="0.1" min="0" max="10" name="Calif2[]" value="{{$Calif_Extraidas[$Con_cal]->Parcial2}}"></td>
					            	@endif
				          		</tr>
				        		<?php $contador=$contador+0;
				        		$Con_cal=$Con_cal+1; ?>
				        	@endforeach

			    	</table>
			    	
				</div>
				{!!Form::submit('Guardar',['class'=>'btn btn-primary','style'=>'position: absolute; top: 100%;left:80%;'])!!}
			{!! Form::close()!!}

		@elseif($visibility==2)
			<div class="card-header text-center" style="font-size:135%;width: 30%; height:15%; background: #FFFFFF; color: rgb(26, 35, 126); position:  absolute;top: 70%; left: 45%;" >{{ __(' ') }}</div>
		@else
			<div class="card-header text-center" style="font-size:200%;width: 69%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 48%; left: 26%;" >{{ __($Materiasele)}}</div>
			<div class="card-header text-center" style="font-size:135%;width: 30%; height:15%; background: #839192; color: rgb(26, 35, 126); position:  absolute;top: 70%; left: 45%;" >{{ __('No hay alumnos registrados en esta materia.') }}</div>
		@endif
	</body>
</html>