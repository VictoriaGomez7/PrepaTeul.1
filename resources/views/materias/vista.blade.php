<!doctype html>
<html>

    <head>
     <script src="http://code.jquery.com//jquery.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

          {{--@include('interfazprincipal.image')--}}
          @include('ControlEscolar.CEprincipal')
          @extends('layouts.app')
    </head>

<body>
        @if (session()->has('msj2'))
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

          <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" >&times;</button>
            <strong>¡Error! </strong>{{session('msj2')}}
          </div>
        @endif

        <div class="card-header text-center" style="font-size:200%;width: 50%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 52%; left: 25%;" >{{ __(' Materia: ' .$materia->Nombre ) }}

        </div> <div style="position: absolute;top: 62%; left: 25%; width: 50%;height:50%; background-color:#aaa">

        {!! Form::open(['route'=>['materia.show',$materia->Clave],'method'=>'GET','files'=>false]) !!}     {{ csrf_field() }}

          <p style="font-size:130%; position:  absolute;top: 10%; left: 5%">{{('Clave:')}}</p>
          <p style="font-size:130%; position:  absolute;top: 25%; left: 5%">{{('Tipo:')}}</p>
          <p style="font-size:130%; position:  absolute;top: 38%; left: 5%">{{('Área')}}</p>
          <p style="font-size:130%; position:  absolute;top: 44%; left: 5%">{{('Propedéutica:')}}</p>
          <p style="font-size:130%; position:  absolute;top: 57%; left: 5%">{{('Semestre:')}}</p>
          <p style="font-size:130%; position:  absolute;top: 72%; left: 5%">{{('Horas:')}}</p>


          <p><input type="text" name="Clave" value="{{ $materia->Clave }}" style="font-size:105%; width: 65%; position:  absolute;top: 10%; left: 30%" disabled="true"/></p>

          <p><input name="Tipo" type="input" disabled="true" value="{{ $materia->Tipo }}" style="font-size:105%; width: 65%; position:  absolute;top: 25%; left: 30%"></p>

          <p><input type="input" name="claveOriginal" value="{{ $materia->Clave }}"  hidden="true"></p>

          <p><input type="input" name="Bachillerato" value="{{ $materia->Bachillerato }}" style="font-size:105%; width: 65%; position:  absolute;top: 44%; left: 30%" disabled="true"></p>
      	
          <p><input type="input" name="Semestre" value="{{ $materia->Semestre}}" style="font-size:105%; width: 65%; position:  absolute;top: 59%; left: 30%" disabled="true"></p>

          <p><input type="number" name="Horas"  min="1"  max="12" value="{{ $materia->Horas }}" required="true" style="font-size:105%; width: 65%; position:  absolute;top: 74%; left: 30%" disabled="true"></p>
        

         {!!Form::submit('Modificar',['class'=>'btn btn-primary', 'style'=>'width: 20%; position:  absolute;top: 105%; left: 55%'])!!}
         {!! form::close() !!}
        {!!Form::open(['route' => ['materia.destroy',$materia->Clave],'method'=>'DELETE'])!!}
        <td>{!!Form::submit('Eliminar',['class'=>'btn btn-danger','style'=>'width: 20%; position:  absolute;top: 105%; left: 80%'])!!}</td>
                {!! Form::close()!!}
        <a href="http://127.0.0.1:8000/materia">
                <button class="btn btn-success " style="position: absolute;top: 105%;left:0%">Cancelar</button></a></div>
    <div>

</body>