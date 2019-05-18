<!doctype html>

@extends('layouts.app')

@section('title','Consultar Docente')

{{--@include('interfazprincipal.image')--}}
@include('ControlEscolar.CEprincipal')

@section('frameTitulo')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<title>Alumnos</title>
<body>
  <div class="container">
    <table id="alumn" class="table">
      <thead>
        <tr>
          <th  align="center">Clave</th>
          <th  align="center">Docente</th>
          <th  align="center">Domicilio</th>
          <th  align="center">Teléfono</th>
          <th></th>
          <th></th>

        </tr>
      </thead>
        <tbody>
          @foreach($CDocente as $docente)
          <tr>
          	<form class="form-group" method="PUT" action="/Docente/{{$docente->id}}">
	          	<td><input type="hiddn" required readonly name="id" value="{{$docente->id}}"></td>
	            <!--<td align="center">{{ $docente->id }}</td>-->
	            <td align="center">{{ $docente->Nombre}}</td>
	            <td align="center">{{ $docente->Domicilio }}</td>
	            <td align="center">{{ $docente->Telefono}}</td>
	            <td><button class="btn btn-success">Modificar</button></td>
            </form>
            {!!Form::open(['route' => ['Docente.destroy',$docente->id],'method'=>'DELETE'])!!}
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
  $('#alumn').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
});
</script>
  </div>

</body>
</html>
@endsection
