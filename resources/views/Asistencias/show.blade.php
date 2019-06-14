
@extends('layouts.app')

@section('title','Docente')

{{--@include('interfazprincipal.image')--}}

@include('DocenteInterfazPrincipal.InterfazPrincipal')


@section('content')
@if (session()->has('msj'))
    <div class="alert alert-warning" role="alert" style="width: 50%; position:  absolute;top: 43%; left: 25%;z-index: 1;">
        <button class="close" data-dismiss="alert"><span>&times;</span></button>
        <strong>¡Incorrecto! </strong>{{ session('msj') }}
    </div>
@endif
@if (session()->has('msj1'))
    <div class="alert alert-success" role="alert" style="width: 50%; position:  absolute;top: 43%; left: 25%;z-index: 1;">
        <button class="close" data-dismiss="alert"><span>&times;</span></button>
        <strong>¡Correcto! </strong>{{ session('msj1') }}
    </div>
@endif
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<title>Alumnos</title>
<body>
<div class="card-header text-center" style="font-size:200%;width: 50%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 45%; left: 25%;" >Control de Asistencias: {{$Materia[0]->Nombre}}</div>

  <div class="container"  style=" position:  absolute;top: 50%; left: 10%;">

    <table  id="alumn" class="table" >
      <thead>
        <tr>
          <th  align="justify">Matrícula</th>
          <th  align="justify">Alumno</th>
          <th  align="justify">Periodo</th>
          <th  align="justify">Días hábiles</th>
          <th align="justify">Asistencias</th>
          <th align="justify">Retardos</th>
          <th align="justify">Faltas</th>
        </tr>
      </thead>

        <tbody>
            {!!Form::open(['route' => 'Asistencias.create','method'=>'get'])!!}

          @foreach($arrayalumnos as $alumno)

          <tr>
            <td align="justify"><input readonly type="text" name="id[]" value="{{ $alumno->id }}" style="width: 50%;"></td>
            <td align="justify">{{ $alumno->Nombre_A}}</td>
            <td align="justify" name="peri">{{ $estep[0]}}</td>
            <td align="justify" name="dias">{{ $estep[1]}}</td>
            <td align="justify"><input required  type="text" name="Asist[]"  style="width: 40%;"></td>
            <td align="justify"><input required  type="text" name="Ret[]" style="width: 40%;"> </td>
            <td align="justify"><input required  type="text" name="Falt[]" style="width: 40%;"> </td>

          </tr>

          @endforeach

<input name='usua' value='{{$usua}} 'style="visibility:hidden;"></input>
<input name='periodo' value='{{$estep[0]}} 'style="visibility:hidden;"></input>
<input name='clavem' value='{{$Materia[0]->Clave}} 'style="visibility:hidden;"></input>

<div class="container"  style=" position:  absolute;top: -10%; left: -5%;">
 {!!Form::submit('Aceptar',['class'=>'btn btn-primary'])!!}

          {!! Form::close()!!}
          <a href="/DocenteInicio?valor={{ ($usua) }}">
    <button class="btn btn-success" >Regresar</button></a>
     </div>
        </tbody>
    </table>







  </div>

</body>
</html>


@endsection
