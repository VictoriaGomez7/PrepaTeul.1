<!DOCTYPE html>

<a href="http://127.0.0.1:8000/DocenteInicio">
            <button class="btn btn-success" style="position: absolute;top: 140%;left:65%">Cancelar</button></a>

@extends('layouts.app')

@section('title','Listas')

@include('DocenteInterfazPrincipal.InterfazPrincipal')

<body>
    @section('VerListas')
        
        <div class="card-header text-center" style="font-size:200%;width: 90%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 52%; left: 5%;" >{{ __('LISTADOS') }}</div>


    @endsection
</body>