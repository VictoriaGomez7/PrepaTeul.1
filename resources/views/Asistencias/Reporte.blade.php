<!DOCTYPE html>
<a href="/DocenteInicios?valor={{ ($usua) }}">
    <button class="btn btn-success" style="position: absolute;top: 105%;left:50%;z-index: 1;">Cancelar</button></a>
@extends('layouts.app')

@section('title','Docente')

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

<body>
 <div class="card-header text-center" style="font-size:200%;width: 90%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 52%; left: 5%;" >{{ __('Asistencias ') }}{{$Materia[0]->Nombre}} {{$Grupo}}</div> <!-- text-center ES PARA CENTRA EL TEXTO -->
<div style="position: absolute;top: 62%; left: 5%; width: 90%;height:50%; border: 2px solid gray;">
              <select name="transporte" size="10" onChange="mostrar(this.value);"style="position: absolute;top: 5%; left: 5%; width: 25%;height:53%;">
              <!--<option value="otro">Seleccione uno</option>-->


               @foreach( $asis as $doc)
              @foreach($arrayalumnos as $alumn)
              @if($doc->id == $alumn->id)

                <option value="{{$doc->Periodo}}">{{$doc->Periodo}}</option>
                
               @endif
              @endforeach
              @endforeach
               </select>

<script type="text/javascript">
function mostrar(id) {
  @foreach($asis as $doc)
  
  if (id == "{{$doc->Periodo}}") {
    $("#{{$doc->Periodo}}").show();
    

  }
  if (id != "{{$doc->Periodo}}") {
    $("#{{$doc->Periodo}}").hide();
  }
  @endforeach

}
</script>


@foreach( $asis as $doc)
@foreach($arrayalumnos as $alumn)
@if($doc->id == $alumn->id)

<div class="element" id="{{$doc->Periodo}}" style="display: none; position: absolute;top: 5%; left: 35%; width: 60%;height:70%;">
    <table id="alumn" class="table">
      <thead>
        <tr>
          <th  align="center">Clave</th>
          <th  align="center">Nombre</th>
          <th  align="center">Asistencias</th>
          <th  align="center">Retardos</th>
          <th  align="center">Faltas</th>
          <th  align="center">Grupo</th>
          <th></th>

        </tr>
      </thead>
        <tbody>
          <tr>

            <form class="form-group" method="GET">
              <td align="center">{{ $doc->id }}</td>
              <td align="center">{{ $alumn->Nombre_A}}</td>
              <td align="center">{{ $doc->Asistencias}}</td>
              <td align="center">{{ $doc->Retardos}}</td>
              <td align="center">{{ $doc->Faltas}}</td>
              <td align="center">{{ $Grupo}}</td>
              
            </form>
            
          </tr>
        </tbody>

    </table>



<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
  $('#alumn').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
});
</script>
  </div>
@endif
@endforeach
@endforeach











  </div>












  </body>
   <!-- vinculando a libreria Jquery-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <!-- Libreria java scritp de bootstrap -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
@endsection
