<!DOCTYPE html>
<a href="/DocenteInicios?valor={{ ($usua) }}">
    <button class="btn btn-success" style="position: absolute;top: 81.5%;left:50%;z-index: 1;">Cancelar</button></a>
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


  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <!-- vinculo a bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

@foreach($CDocente as $doc)
  <script type="text/javascript">
function mostrar(id) {
  @foreach($CDocente as $doc)
  if (id == "<?php echo $doc->ClaveMateria; ?>") {
    $("#<?php echo $doc->ClaveMateria; ?>").show();

  }
  if (id != "<?php echo $doc->ClaveMateria; ?>") {
    $("#<?php echo $doc->ClaveMateria; ?>").hide();
  }
  @endforeach

}
</script>

@endforeach

</head>

<body>
  <div class="card-header text-center" style="font-size:200%;width: 50%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 52%; left: 25%;" >{{ __('Materias') }}</div> <!-- text-center ES PARA CENTRA EL TEXTO -->
  <div style="position: absolute;top: 62%; left: 25%; width: 50%;height:30%; background-color:#aaa">
    <select name="transporte" size="10" onChange="mostrar(this.value);"style="position: absolute;top: 5%; left: 5%; width: 25%;height:53%;">

      @foreach($CDocente as $doc)

        <option value="{{$doc->ClaveMateria}}">{{$doc->Materia}} {{$doc->Grupo}}</option>
      @endforeach
    </select>

  @foreach($CMateria as $mat)
    @foreach( $CDocente as $doc)
      @if($mat->Clave == $doc->ClaveMateria)
        <?php $new=$mat->Clave .'_'. $doc->Grupo .'_'. $usua; ?>
        <div class="element" id="{{$mat->Clave}}" style="display: none; position: absolute;top: 5%; left: 35%; width: 20%;height:53%;">
        <table id="alumn" class="table">
          <thead>
            <tr>
              <th  align="center">Clave</th>
              <th  align="center">Materia</th>
              <th  align="center">Tipo</th>
              <th  align="center">Horas</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <form class="form-group" method="GET" action="/Asistencias/<?php echo($new) ?>">
                <td align="center">{{ $mat->Clave }}</td>
                <td align="center">{{ $mat->Nombre}}</td>
                <td align="center">{{ $mat->Tipo}}</td>
                <td align="center">{{ $mat->Horas}}</td>
                <td>
                <button class="btn btn-primary">Asistencias</button></td>
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

</body>
   <!-- vinculando a libreria Jquery-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <!-- Libreria java scritp de bootstrap -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
@endsection
