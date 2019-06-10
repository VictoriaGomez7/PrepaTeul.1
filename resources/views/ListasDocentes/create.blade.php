<!DOCTYPE html>

<a href="VisualizaListas.show">
            <button class="btn btn-success" style="position: absolute;top: 100%;left:90%">Cancelar</button></a>

@extends('layouts.app')

@section('title','Lista')

@include('DocenteInterfazPrincipal.InterfazPrincipal')

<body>
    @section('VerListas')
	
	<div class="card-header text-center"
        style="font-size:200%;width: 70%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 52%; left: 15%;" >{{ __('Materia: '.$nombreM.', Grupo: '.$grupo) }}</div>

    <section style="position: absolute;top: 62%; left: 15%; width: 70%">{{-- " background: #aaa"> --}}
    	
    	<?php
    		$a=0;
    		$b=1;
    	?>
    	
		<table border="1" style="width: 100%">
			<tr style="font-size:120%; background: #000050; color: rgb(255, 255, 255)"> 
				<th style="width:30%">{{ ('Matrícula') }}</th>
				<th style="width:80%">{{ ('Nombre') }}</th>
			</tr>
			@for ($i = 0; $i <count($Lista) ; $i++)
				<tr style="background: #99A3A4">
					<td>{{ ($Lista[$i][$a]) }}</td>
					<td>{{ ($Lista[$i][$b]) }}</td>
				</tr>
			@endfor	
		</table>

    </section>


</body>