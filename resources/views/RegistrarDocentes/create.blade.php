<!doctype html>

<a href="http://127.0.0.1:8000/ControlEscolarInicio">
            <button class="btn btn-success" style="position: absolute;top: 140%;left:65%">Cancelar</button></a>

@extends('layouts.app')

@section('title','Registrar Docentes')

@include('ControlEscolar.CEprincipal')

<body>
    @section('frameDocentes')

        @if (session()->has('msj'))
            <div class="alert alert-success" role="alert" style="width: 50%; position:  absolute;top: 43%; left: 25%;z-index: 1;">
                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                <strong>¡Correcto! </strong>{{ session('msj') }}
            </div>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert" style="width: 50%; position:  absolute;top: 43%; left: 25%;z-index: 1;">
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                        <strong>¡Error! </strong>{{ $error }}
                </div>
            @endforeach
        @endif

        <div class="card-header text-center" style="font-size:200%;width: 50%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 52%; left: 25%;" >{{ __('Registrar Docentes') }}</div> <!-- text-center ES PARA CENTRA EL TEXTO -->

        {!!Form::open(['route' => ['Docente.store'],'method'=>'POST'])!!}

            @csrf

            <div style="position: absolute;top: 62%; left: 25%; width: 50%;height:70%; background-color:#aaa">

                <p style="font-size:130%; position:  absolute;top: 10%; left: 10%">{{('Clave:')}}</p>
                <p style="font-size:130%; position:  absolute;top: 25%; left: 10%">{{('Nombre:')}}</p>
                <p style="font-size:130%; position:  absolute;top: 40%; left: 10%">{{('Dirección:')}}</p>
                <p style="font-size:130%; position:  absolute;top: 55%; left: 10%">{{('Teléfono:')}}</p>
                <p style="font-size:130%; position:  absolute;top: 70%; left: 10%">{{('Email:')}}</p>
                <p style="font-size:130%; position:  absolute;top: 85%; left: 10%">{{('CURP:')}}</p>

                <p><input type="text" placeholder="31145" value="{{ old('id') }}" required id="id" name="id" style="font-size:105%; width: 65%; position:  absolute;top: 10%; left: 30%"/></p>
                <p><input type="text" placeholder="Angélica Luna" value="{{ old('nombre') }}" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" id="nombre" name="nombre" style="font-size:105%; width: 65%; position:  absolute;top: 25%; left: 30%" /></h1>
                <p><input type="text" placeholder="Lomas #24" value="{{ old('direccion') }}" required id="direccion" name="direccion" style="font-size:105%; width: 65%; position:  absolute;top: 40%; left: 30%"/></p>
                <p><input type="tel" placeholder="4673562817" value="{{ old('telefono') }}" required pattern="[0-9]{10}" id="telefono" name="telefono" style="font-size:105%; width: 65%; position:  absolute;top: 55%; left: 30%"/></p>
                <p><input type="email" placeholder="Angie@gmail.com" value="{{ old('Email') }}" id="correo" pattern="^[a-z0-9_]+(?:\.[a-z0-9_]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" name="Email" style="font-size:105%; width:65%; position:  absolute;top: 70%; left: 30%" ></p>
                <p><input type="text" placeholder="ALRA030913MZSLRMA6" value="{{ old('Curp') }}" required id="curp" pattern="^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$" name="Curp"   style="font-size:105%; width:65%; position:  absolute;top: 85%; left: 30%"/></p>
            </div>

           <button type="submit" class="btn btn-primary" style="position: absolute;top: 140%;left:55%">Registrar</button>

</body>


@endsection