@extends('layouts.app')

@section('title','Inscripción Alumnos')

@section('frameTitulo')
  @if (Session()->has('msj'))
    <div class="alert alert-danger" role="alert" style="width: 90%; position:  absolute; top: 43%; left: 5%;z-index: 1;">
      <button class="close" data-dismiss="alert"><span>&times;</span></button>
      <strong>¡Error! </strong>{{Session('msj')}}
    </div>
  @endif

  {!! Form::open(['route'=>'PDF.create','method'=>'get','files'=>true]) !!}
    <div class="row" style="position: absolute;top: 265px; left: 340px; width: 1005px">

    <div class="col-lg-4" name='Columna' style="background-color:#aaa">
        <p style="font-size:22px">{{('Matrícula:')}}</p>
          <p><input type="text" id="id" name="id" style="font-size:18px; width: 100%" style="z-index: 0;"/></p>
          {!!Form::submit('PDF',['class'=>'btn btn-primary'])!!}
    </div>
  {!! form::close() !!}



@endsection()
