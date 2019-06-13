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


               @foreach($CDocente as $doc)
               <?php $new7=$doc->Grupo; ?>
               <?php $new2=$doc->ClaveMateria.$new7; ?>
                <option value="<?php echo $new2; ?>">{{$doc->Materia}} {{$doc->Grupo}}</option>
               @endforeach
               </select>

              <script type="text/javascript">
function mostrar(id) {
  @foreach($CDocente as $doc)
  <?php $new1=$doc->ClaveMateria.$doc->Grupo; ?>
  if (id == "<?php echo $new1; ?>") {
    $("#<?php echo $new1; ?>").show();
    <?php $new=$doc->ClaveMateria .'_'. $doc->Grupo .'_'. $usua; ?>

  }
  if (id != "<?php echo $new1; ?>") {
    $("#<?php echo $new1; ?>").hide();
  }
  @endforeach

}
</script>

@foreach($CMateria as $mat)
@foreach( $CDocente as $doc)
@if($mat->Clave == $doc->ClaveMateria)
<?php $new4=$doc->ClaveMateria.$doc->Grupo; ?>
<?php $new=$doc->ClaveMateria .'_'. $doc->Grupo .'_'. $usua; ?>
<div class="element" id="{{$new4}}" style="display: none; position: absolute;top: 5%; left: 35%; width: 60%;height:70%;">
    <table id="alumn" class="table">
      <thead>
        <tr>
          <th  align="center">Clave</th>
          <th  align="center">Materia</th>
          <th  align="center">Tipo</th>
          <th  align="center">Horas</th>
          <th  align="center">Grupo</th>
          <th></th>

        </tr>
      </thead>
        <tbody>
          <tr>

            <form class="form-group" method="GET" action="/Asistencias/<?php echo($new) ?>">
              <label><?php echo($new4) ?></label>
              <td align="center">{{ $mat->Clave }}</td>
              <td align="center">{{ $mat->Nombre}}</td>
              <td align="center">{{ $mat->Tipo}}</td>
              <td align="center">{{ $mat->Horas}}</td>
              <td align="center">{{ $new7}}</td>
              <td><button class="btn btn-success">Asistencias</button></td>
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
