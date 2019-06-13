<a href="/DocenteInicio?valor={{ ($usua) }}">
    <button class="btn btn-success" style="position: absolute;top: 81.5%;left:50%;z-index: 1;">Cancelar</button></a>
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


  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <!-- vinculo a bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">





  </head>

<body>
 <div class="card-header text-center" style="font-size:200%;width: 90%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 35%; left: 5%;" >{{ __('Materias') }}</div> <!-- text-center ES PARA CENTRA EL TEXTO -->
<div style="position: absolute;top: 44.5%; left: 5%; width: 90%;height:50%; border: 2px solid gray;">
              <select name="transporte" size="10" onChange="mostrar(this.value);"style="position: absolute;top: 5%; left: 5%; width: 25%;height:53%;">
              <!--<option value="otro">Seleccione uno</option>-->


               @foreach($asis as $doc)
               
                <option value="{{$doc->Periodo}}">{{$doc->Periodo}}</option>
                
               @endforeach
               </select>

  </div>












  </body>
   <!-- vinculando a libreria Jquery-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <!-- Libreria java scritp de bootstrap -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
@endsection
