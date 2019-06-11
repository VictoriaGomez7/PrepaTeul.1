{{--<a href="interfazprinci">
    <button class="btn btn-success" style="position: absolute;top: 110%;left:5%">Atras</button></a>--}}
@extends('layouts.app')

@section('title','Docente')

{{--@include('interfazprincipal.image')--}}
@include('DocenteInterfazPrincipal.interfazprincipal')
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<title>Alumnos</title>
<body>
  <div class="container">
    <table  id="alumn" class="table" >
      <thead>
        <tr>
          <th  align="center">Matrícula</th>
          <th  align="center">Alumno</th>
          <th></th>
        </tr>
      </thead>
        <tbody>
          @foreach($arrayalumnos as $alumno)
          <tr>
            <td align="center">{{ $alumno->id }}</td>
            <td align="center">{{ $alumno->Nombre_A}}</td>

            {!!Form::open(['route' => ['Asistencias.edit',$alumno->id],'method'=>'get'])!!}
            <td>{!!Form::submit('Captura Asistencia',['class'=>'btn btn-primary'])!!}</td>
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
