<!doctype html>
<a href="http://127.0.0.1:8000/docenteconsulta">
            <button class="btn btn-success" style="position: absolute;top: 120%;left:69%">Cancelar</button></a>

@extends('layouts.app')



{{--@include('interfazprincipal.image')--}}
@include('ControlEscolar.CEprincipal')

<body>
    @section('title','Docente')

    @if (session()->has('msj1'))
            <div class="alert alert-success" role="alert" style="width: 50%; position:  absolute;top: 43%; left: 25%;z-index: 1;">
                <button type="button" class="close" data-dismiss="alert" >&times;</button>
                <strong>¡Correcto! </strong>{{session('msj1')}}
            </div>

    @endif()

    @foreach($CDocente as $docente)

        <div class="card-header text-center" style="font-size:200%;width: 50%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 52%; left: 25%;" >{{ __('Modificar Docente') }}</div> <!-- text-center ES PARA CENTRA EL TEXTO -->


        <form class="form-group" method="PUT" action="/Docente/{{$docente->id}}/edit">
            {{--@method('PUT')--}}
            @csrf

            <div style="position: absolute;top: 62%; left: 25%; width: 50%;height:45%;background-color:#aaa">
                <p></p>
                <p style="font-size:130%">{{('Clave:')}}</p>
                <p style="font-size:130%">{{('Nombre:')}}</p>
                <p style="font-size:130%">{{('Domicilio:')}}</p>
                <p style="font-size:130%">{{('Teléfono:')}}</p>
                <p style="font-size:130%">{{('Email:')}}</p>
                <p style="font-size:130%">{{('Clave CURP:')}}</p>

            </div>

            <div style="position: absolute;top: 62%; left: 45%; width: 25%;height:45%;background-color:#aaa">
                <p></p>
                <p><input type="number" required readonly min="1" max="9999999999" id="clave1" name="clave1" value="{{$docente->id}}" style="font-size:105%; width: 105%"/></p>

                <p><input type="text" required id="nombre1" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" name="nombre1" value="{{$docente->Nombre}}"style="font-size:105%; width: 105%;" /></h1>

                <p><input type="address" required id="domicilio1" name="domicilio1"  value="{{$docente->Domicilio}}" style="font-size:105%; width: 105%"/></p>

                <p><input type="text"required pattern="[1-9]{1}[0-9]{9}" id="telefono1" name="telefono1" value="{{$docente->Telefono}}" style="font-size:105%; width: 105%;"/></p>

                <p><input type="text"required pattern="^[a-z0-9_]+(?:\.[a-z0-9_]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" id="email1" name="email1" value="{{$docente->Email}}" style="font-size:105%; width: 105%;"/></p>

                <p><input type="text"required pattern="^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$" id="curp1" name="curp1" value="{{$docente->Curp}}" style="font-size:105%; width: 105%;"/></p>

            </div>

              <button type="submit" class="btn btn-primary" href="#" style="position: absolute;top: 120%;left:59%">Modificar</button>



        </form>

</body>

@endforeach()
