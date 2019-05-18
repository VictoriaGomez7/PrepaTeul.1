<Doctype html>

  <html>
  <head>
	 <title >Compromisos</title>

	 <meta name="viewport" content="width=divice-width,user-scalable=no,initial-scale=1, maximum-scale=1, minimum-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body >
       @if (session()->has('msj2'))

    <div class="alert alert-danger" role="alert" style=" position: absolute; top: 22%; left: 40%">
      <button type="button" class="close" data-dismiss="alert" ><span>&times;</span></button>
      <strong>¡Error! </strong>{{session('msj2')}}
    </div>
  @endif

{!! Form::open(['route'=>'compromisos.store','method'=>'POST','files'=>true]) !!}
  			 <div class="form-group">
  			 	<label for="compromiso"  ><h2>Compromiso</h2></label>
      <textarea id="nombre" rows="5" name="compromiso" align="justify" minlength="1" required="true" style="font-size:105%; width: 95%;" ></textarea>
      @if(session('status'))
<br>


@endif
      <label></label>
		  </div>

		   <div class="form-group">

		  		<input type="submit" name="guardar" class="btn btn-primary" value="Guardar compromiso">
		  </div><br>
    {!! Form::close() !!}
      {!! Form::open(['route'=>'compromisos.store','method'=>'POST','files'=>true]) !!}
  		<div clas="form-group">
  		<label for="cambios"> Número de compromiso</label>
  		<input type="number" name="cambios" min="1" value="1">
  				<td><input type="submit" name="buscar" class="btn btn-primary" value="Buscar">
            <input type="submit" name="editar" class="btn btn-primary" value="Editar">
  				<input type="submit" name="eliminar" class="btn btn-primary" value="Eliminar">
 		</td></div>
  	{!! form::close() !!}
</body>