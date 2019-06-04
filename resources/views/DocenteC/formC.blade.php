<!DOCTYPE html>
<a href="http://127.0.0.1:8000/docenteconsulta">
            <button class="btn btn-success " style="position: absolute;top: 120%;left:25%">Cancelar</button></a>
<html>
@extends('layouts.app')

@section('title','Docente')

@include('ControlEscolar.CEprincipal')

<body>
    @section('frameDocentes')

    @foreach($CDocente as $docente)



    <div class="card-header text-center" style="font-size:200%;width: 50%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 52%; left: 25%;" >{{ __('Modificar Docente') }}</div> <!-- text-center ES PARA CENTRA EL TEXTO -->


    <form class="form-group" method="PUT" action="/Docente/{{$docente->id}}">
        {{--@method('PUT')--}}
    @csrf

        <div style="position: absolute;top: 62%; left: 25%; width: 50%;height:50%;background-color:#aaa">
            <p></p>
            <p style="font-size:130%">{{('Clave:')}}</p>
            <p style="font-size:130%">{{('Nombre:')}}</p>
            <p style="font-size:130%">{{('Domicilio:')}}</p>
            <p style="font-size:130%">{{('Teléfono:')}}</p>
            <p style="font-size:130%">{{('Email:')}}</p>
            <p style="font-size:130%">{{('Clave CURP:')}}</p>

        </div>

        <div style="position: absolute;top: 62%; left: 45%; width: 25%;height:53%;">
            <p></p>
            <p><input type="number" required pattern="[1-9]{1-5}[0-9]{9}"  min="1"  id="id" name="id" value="{{$docente->id}}" style="position: absolute;top: 6%;left:0%; width:105%"/></p>

            <p><input type="text" required readonly id="nombre1" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" name="nombre1" value="{{$docente->Nombre}}" style="position: absolute;top: 20%;left:0%; width:105%" /></h1>

            <p><input type="address" required readonly=”readonly” id="domicilio1" name="domicilio1" value="{{$docente->Domicilio}}" style="position: absolute;top: 32%;left:0%; width:105%"/></p>

            <p><input type="text"required readonly=”readonly” pattern="[1-9]{1}[0-9]{9}" id="telefono1" name="telefono1" value="{{$docente->Telefono}}"  style="position: absolute;top: 46%;left:0%; width:105%"/></p>

            <p><input type="text" required readonly=”readonly” id="Email1" name="Email1" value="{{$docente->Email}}"  style="position: absolute;top: 60%;left:0%; width:105%"/></p>

            <p><input type="text"required readonly=”readonly” pattern="[1-9]{1}[0-9]{9}" id="Curp1" name="Curp1" value="{{$docente->Curp}}"  style="position: absolute;top: 74%;left:0%; width:105%"/></p>


        </div>

        <button type="submit" class="btn btn-primary" href="#" style="position: absolute;top: 120%;left:59%">Modificar</button>


    </form>


    @endforeach()
    @endsection
</body>

</html>


    {!!Form::open(['route' => ['Docente.destroy',$docente->id],'method'=>'DELETE'])!!}
    {!!Form::submit('Eliminar',['class'=>'btn btn-danger', 'style'=>'position: absolute;top: 120%;left:69%'])!!}
    {!! Form::close()!!}