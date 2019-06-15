@include('ControlEscolar.CEprincipal')
@extends('layouts.app')
 <meta name="viewport" content="width=divice-width,user-scalable=no,initial-scale=1, maximum-scale=1, minimum-scale=1">
  <center>
    <h2> Nuestros Compromisos Como Familia</h2>
  
   @include('compromisosFamilia.mostrar')
  {!! Form::open(['route'=>'compromisosFamilia.store','method'=>'POST','files'=>true]) !!}
      

  			 <div class="form-group">
  			 	<label for="compromiso"  ><h2>Compromiso</h2></label>
				<textarea id="nombre" rows="5" name="compromiso" align="justify" minlength="1" required="true" style="font-size:105%; width: 95%;" >   {{ $compromiso->compromiso }}</textarea>
         
		  </div>
		   <div class="form-group">
				
		  		<input type="submit" name="guardar" class="btn btn-primary" value="Guardar compromiso">
		  </div><br>
      
  		<div clas="form-group"> 
  		<label for="cambios"> Número de compromiso</label>
  		<input type="number" name="cambios" min="1" value="{{$numero}}" required pattern="[1-9][0-9]?d?" >
  				<td><input type="submit" name="buscar" class="btn btn-primary" value="Buscar">
            <input type="submit" name="editar" class="btn btn-primary" value="Editar">
  				<input type="submit" name="eliminar" class="btn btn-primary" value="Eliminar">
 		</td></div>
    
  	{!! form::close() !!}
</center>