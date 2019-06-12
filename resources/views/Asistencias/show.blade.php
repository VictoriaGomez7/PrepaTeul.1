<a href="/DocenteInicio?valor={{ ($usua) }}">
    <button class="btn btn-success" style="position: absolute;top: 81.5%;left:50%;z-index: 1;">Cancelar</button></a>
@extends('layouts.app')

@section('title','Docente')

{{--@include('interfazprincipal.image')--}}
@include('DocenteInterfazPrincipal.InterfazPrincipal')
@section('content')
@if (Session()->has('msg'))
  <div class="alert alert-success" role="alert" style="width: 90%; position:  absolute; top: 43%; left: 5%;z-index: 1;">
    <button class="close" data-dismiss="alert"><span>&times;</span></button>
    <strong>Correcto</strong>{{Session('msg')}}
  </div>
@endif
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<title>Alumnos</title>
<body>

  <div class="container">
<script type="text/javascript">
  Arreglo=[];
</script>
    <table  id="alumn" class="table" >
      <thead>
        <tr>
          <th  align="center">Matrícula</th>
          <th  align="center">Alumno</th>
          <th  align="center">Periodo</th>
          <th>Asistencias</th>
          <th>Retardos</th>
          <th>Faltas</th>
        </tr>
      </thead>

        <tbody>
            {!!Form::open(['route' => 'Asistencias.create','method'=>'get'])!!}

          @foreach($arrayalumnos as $alumno)

          <tr>
            <td><input readonly type="text" name="id[]" value="{{ $alumno->id }}"></td>
            <td align="center">{{ $alumno->Nombre_A}}</td>
            <td align="center" name="peri">{{ $estep}}</td>
            <td><input required  type="text" name="Asist[]" ></td>
            <td><input required  type="text" name="Ret[]"> </td>
            <td><input required  type="text" name="Falt[]"> </td>
          </tr>

          @endforeach
          {!!Form::submit('Aceptar',['class'=>'btn btn-primary'])!!}
<input name='usua' value='{{$usua}} 'style="visibility:hidden;"></input>
<input name='periodo' value='{{$estep}} 'style="visibility:hidden;"></input>
          {!! Form::close()!!}
        </tbody>
    </table>







  </div>

</body>
</html>


@endsection
