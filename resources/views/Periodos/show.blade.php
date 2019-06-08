
@extends('layouts.app')

@section('title','Asistencias')

@include('DocenteInterfazPrincipal.InterfazPrincipal')
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
          <th  align="center">Grupo</th>
          <th  align="center">Nombre</th>
          <th  align="center">Asistencias</th>
          <th  align="center">Retardos</th>
          <th  align="center">Faltas</th>
        </tr>
      </thead>
        <tbody>
          @foreach($alumnos as $alumno)
          <tr>
            <td align="center">{{ $alumno->id }}</td>
            <td align="center">{{ $alumno->Grupo }}</td>
            <td align="center">'deberia estar'</td>
            <td align="center">{{ $alumno->id }}</td>
            <td align="center">{{ $alumno->Grupo }}</td>
            <td align="center">'deberia estar'</td>

            </div>
          </div>
                </div>
            </div></td>
            {!!Form::open(['route' => ['Alumnos.destroy',$alumno->id],'method'=>'DELETE'])!!}
            <td>{!!Form::submit('Guardar',['class'=>'btn btn-danger'])!!}</td>
            {!! Form::close()!!}


          </tr>
          @endforeach
        </tbody>

    </table>




  </div>

</body>
</html>
@endsection
