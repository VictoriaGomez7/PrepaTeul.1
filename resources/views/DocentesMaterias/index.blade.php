@extends('layouts.app')

@section('title','Materia De Los Docentes')

@include('ControlEscolar.CEprincipal')
@section('content')
	<div class="card-header text-center" style="font-size:200%;width: 90%; height: 12%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 54%; left: 5%;" >{{ __('Materias por Docente') }}</div>

	<div class="row"style="width: 90%; margin-top:2%;position: absolute;top: 62%;left:6%">

		<?php $var1=array(); ?>
		@foreach($Docents as $Docentes)
		@foreach($Relacion as $Rela)
			@if($Rela->Docente == $Docentes->Nombre )
			
			
			
			@if(in_array($Docentes->Nombre, $var1)==False)
			<?php array_push($var1, $Docentes->Nombre); ?>
		<div class="col-sm" style="background:#aaa">
			
				<div class="card text-center" style="width:20rem; margin-top: 50px;">
					
				  <div class="card-body">  	
			
				    <h5 class="card-title" style="color: rgb(212, 172, 13)">{{$Docentes->Nombre}}</h5>
				    <p class="card text" style="position: absolute;left:5%;color: rgb(212, 172, 13);border-color:white">Materia</p>
				    <p class="card text" style="position: absolute;left:50%;color: rgb(212, 172, 13);border-color:white" >Grupo</p>
				    <br>

				    @foreach($Relacion as $Rela)
			@if($Rela->Docente == $Docentes->Nombre )
				    
					<div style="position: absolute;lef:5%,">
				    	
				    	<p class="card-text">{{$Rela->Materia}}</P>
				    </div>
				    <div style="position: absolute;left:50%">
				    	<p class="card-text">{{$Rela->Grupo}}</P>

				    </div>
				    <br>
				    	@endif
				    	@endforeach
				    

				  	
			
				  </div>
				</div>
			</div>
			@endif
			@endif
		@endforeach
		@endforeach
	</div>
	<div>
		<br>
	</div>	

@endsection