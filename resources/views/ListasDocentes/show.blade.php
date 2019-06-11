<!DOCTYPE html>

<a href="/DocenteInicio?valor={{ ($usua) }}">
    <button class="btn btn-success" style="position: absolute;top: 81.5%;left:50%;z-index: 1;">Cancelar</button></a>

@extends('layouts.app')

@section('title','Listas')

@include('DocenteInterfazPrincipal.InterfazPrincipal')

<body>
    @section('BuscarListas')

        @if (session()->has('msjERROR'))
            <div class="alert alert-danger" role="alert" style="width: 40%; position:  absolute;top: 43%; left: 30%;z-index: 1;">
                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                <strong>¡Error! </strong>{{ session('msjERROR') }}
            </div>
        @endif
        
        {!!Form::open(['route' => ['VisualizaListas.create'],'method'=>'GET'])!!}
            <div class="card-header text-center"
            style="font-size:200%;width: 25%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 52%; left: 38%;" >{{ __('Materia') }}</div>
    		
            <section style="background: #aaa; width: 25%;height: 30%; position: absolute;top: 62%;left: 38%">
        		
                <select name="NombreM" required="NombreM" style="font-size:105%; width: 80%; position:  absolute;top: 20%; left: 8%" >
                    <?php
                        echo $OpcionesNombres;
                    ?>
                </select>

                <input type="text" required value="{{ ($id) }}" id="NomDocente" name="NomDocente" style="position: absolute;top: 80%; left: 8%; width: 0%;height: 0%;border: 0px">

                <button class="btn btn-primary" style="position: absolute;top: 65%;left:20%">Buscar</button>
                
            </section>

            
		{!! Form::close()!!}
        
</body>