<!doctype html>

@extends('layouts.app')

@section('title','Consultar Materias')



@section('frameTitulo')

   @if (session()->has('msj'))
        <div class="alert alert-success" role="alert" style="width: 50%; position:  relative;text-align: center; left: 25%;">
            <button class="close" data-dismiss="alert"><span>&times;</span></button>
            <strong>¡Correcto! </strong>{{ session('msj') }}
        </div>
    @endif


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<title>Materias</title>
<body>
  <div class="container">
    <table id="Mat" class="table">
      <thead>
        <tr>
          <th  align="center">Clave</th>
          <th  align="center">Tipo</th>
          <th  align="center">Nombre:</th>
          <th  align="center">Semestre:</th>
          <th  align="center">Horas:</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
        <tbody>
          @foreach($CMateria as $materia)
          <tr>
          	<form class="form-group" method="PUT" action="/MateriaC/{{$materia->Clave}}">
	          	<td><input type="hiddn" required readonly name="id" value="{{$materia->Clave}}"></td>
	            <!--<td align="center">{{ $materia->clave }}</td>-->

	            <td align="center">{{ $materia->Tipo }}</td>
	            <td align="center">{{ $materia->Nombre}}</td>
              <td align="center">{{ $materia->Semestre}}</td>
              <td align="center">{{ $materia->Horas}}</td>

            </form>
             {!!Form::open(['route' => ['materia.show',$materia->Clave],'method'=>'GET'])!!}
            <td>{!!Form::submit('Modificar',['class'=>'btn btn-success'])!!}</td>
            {!! Form::close()!!}

             {!!Form::open(['route' => ['materia.destroy',$materia->Clave],'method'=>'DELETE'])!!}
            <td>{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}</td>
            {!! Form::close()!!}
          </tr>
          @endforeach
        </tbody>

    </table>



<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
  $('#Mat').DataTable();
});
</script>
  </div>

</body>
</html>
@endsection
