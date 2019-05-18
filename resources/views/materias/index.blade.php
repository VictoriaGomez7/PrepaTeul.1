<html>
    <head>




        <script src="http://code.jquery.com//jquery.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">



       <img src={{ asset('/images/logo_Zacatecas.jpg') }} style="width: 25%; height: 20%;position: absolute;top: 5%; left: 5%">
        <img src={{ asset('/images/logo_Prepas.png') }} style="width:18%; height: 20%; position: absolute;top:  5%; left: 65%">
      <img src={{ asset('/images/logo_Prepa_Teul.jpg') }} style="width: 10%; height: 20%; position: absolute;top:  5%; left: 85%">
       <img src={{ asset('/images/datos_Prepa_Negro.jpg') }} style="width: 30%; height: 25%; position: absolute;top:  5%; left: 33%">



    </head>



<body>
	<br><br><br><br><br><br><br><br><br><br>
{!! Form::open(['route'=>'materia.store','method'=>'POST','files'=>false]) !!}     {{ csrf_field() }}
    <div class="form-group">
    <label value="matricula">Clave  </label>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <input type="number" name="claveOriginal">
    <input type="submit" name="eliminar" class="btn btn-primary" value="Eliminar">
    <input type="submit" name="btnActualizar" class="btn btn-primary" value="Editar">
  </div>

  {{--//materiaConsulta--}}
{!! form::close() !!}
<div>

</body>
</html>