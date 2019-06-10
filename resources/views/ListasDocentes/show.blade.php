<!DOCTYPE html>

<a href="/DocenteInicio">
    <button class="btn btn-success" style="position: absolute;top: 98%;left:63%">Cancelar</button></a>

@extends('layouts.app')

@section('title','Listas')

@include('DocenteInterfazPrincipal.InterfazPrincipal')

<body>
    @section('BuscarListas')

        <script type="text/javascript">
           function habilitar(valor){
            if (valor=="Formación Básica" || valor=="Actividades Paraescolares"){
                document.getElementById("grup").disabled = false;
            }else{
                
                document.getElementById("grup").disabled = true;
            }
           }
        </script>

        @if (session()->has('msjERROR'))
            <div class="alert alert-danger" role="alert" style="width: 40%; position:  absolute;top: 43%; left: 30%;z-index: 1;">
                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                <strong>¡Error! </strong>{{ session('msjERROR') }}
            </div>
        @endif
        
        {!!Form::open(['route' => ['VisualizaListas.create'],'method'=>'GET'])!!}
            <div class="card-header text-center"
            style="font-size:200%;width: 40%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 52%; left: 30%;" >{{ __('Materia') }}</div>
    		
            <section style="background: #aaa; width: 40%;height: 35%; position: absolute;top: 62%;left: 30%">
        		
                
                <label style="position: absolute;top: 9%;left: 12%;font-size:150%">Tipo: </label>
                <select name="tipo" required di="tipo" required style="font-size:110%;width: 50%; position:  absolute;top: 9%; left: 32%" onchange="habilitar(this.value)">
                        <option value="{{ old('tipo') }}">{{ old('tipo') }}</option>
                        <option value="Formación Propedéutica">Formación Propedéutica</option>
                        <option value="Formación Para El Trabajo">Formación Para El Trabajo</option>
                        <option value="Actividades Paraescolares">Actividades Paraescolares</option>
                        <option value="Formación Básica">Formación Básica</option>
                </select>

                <input type="text" required value="{{ ($id) }}" id="NomDocente" name="NomDocente" style="position: absolute;top: 80%; left: 8%; width: 0%;height: 0%;border: 0px">
                
                <label style="position: absolute;top: 33%;left: 12%;font-size:150%">Nombre:</label>
        		<input type="text" required placeholder="Matemáticas" id="nombreM" name="nombreM" value="{{ old('nombreM') }}" style="position: absolute;top: 36%; left: 32%; width: 50%">

                <label style="position: absolute;top: 59%;left: 12%;font-size:150%">Grupo: </label>
                <select name="grup" id="grup" required style="font-size:110%;width: 50%; position:  absolute;top: 62%; left: 32%" disabled="true">
                    <option value="{{ old('grup') }}">{{ old('grup') }}</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                </select>

            </section>

            <button class="btn btn-primary" style="position: absolute;top: 98%;left:55%">Buscar</button>
		{!! Form::close()!!}
        
</body>