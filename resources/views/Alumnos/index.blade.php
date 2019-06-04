<!doctype html>

@extends('layouts.app')

@section('title','Consultar Alumnos')
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
    <table  id="alumn" class="table" >
      <thead>
        <tr>
          <th  align="center">Matrícula</th>
          <th  align="center">Alumno</th>
          <th  align="center">Padre</th>
          <th  align="center">Madre</th>
          <th  align="center">Domicilio</th>
          <th  align="center">Semestre</th>
          <th  align="center">Teléfono Tutor</th>
          <th  align="center">Edad</th>
          <th   align="center">Email</th>

          <th></th>
          <th></th>
        </tr>
      </thead>
        <tbody>
          @foreach($CAlumno as $alumno)
          <tr>
            <td align="center">{{ $alumno->id }}</td>
            <td align="center">{{ $alumno->Nombre_A}}</td>
            <td align="center">{{ $alumno->Nombre_P }}</td>
            <td align="center">{{ $alumno->Nombre_M}}</td>
            <td align="justify">{{ $alumno->Domicilio}}</td>
            <td align="justify">{{ $alumno->Semestre }}</td>
            <td align="justify">{{ $alumno->Telefono_T }}</td>
            <td align="justify">{{ $alumno->Edad}}</td>
            <td align="justify">{{ $alumno->Email}}</td>
            {!!Form::open(['route' => ['Alumnos.update',$alumno->id],'method'=>'PUT'])!!}
            <td>{!!Form::submit('Modificar',['class'=>'btn btn-primary'])!!}</td>
            {!! Form::close()!!}
            
            {!!Form::open(['route' => ['Alumnos.destroy',$alumno->id],'method'=>'DELETE'])!!}
            {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
            {!! Form::close()!!}
                      </div>
                    </div>
                </div>
            </div></td>-->
            {!!Form::open(['route' => ['Alumnos.destroy',$alumno->id],'method'=>'DELETE'])!!}
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
