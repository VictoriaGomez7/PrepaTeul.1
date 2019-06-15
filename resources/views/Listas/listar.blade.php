<!DOCTYPE html>

<a href="ControlEscolarInicio">
            <button class="btn btn-success" style="font-size:120%; position: absolute;top: 119%;left:67%">Cancelar</button></a>
<html>

    <head>
     <script src="http://code.jquery.com//jquery.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

          {{--@include('interfazprincipal.image')--}}
          @include('ControlEscolar.CEprincipal')
          @extends('layouts.app')
    </head>
<body>


  @if (session()->has('msj2'))
    <div class="alert alert-danger" role="alert" style="width: 50%; position:  relative;text-align: center; left: 25%;">
      <button type="button" class="close" data-dismiss="alert" >&times;</button>
      <strong>¡Error! </strong>{{session('msj2')}}
    </div>
  @endif

 <section style="width: 100%; max-width: 100%; height:100%;max-height: 100%; background: #FFFFFF">

  <div class="card-header text-center" style="font-size:200%;width: 50%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 54%; left: 25%;" >Listar
  </div> <div style="position: absolute;top: 64%; left: 25%; width: 50%;height:50%; background-color:#aaa">

{!! Form::open(['route'=>['Imprimelistas.show','a'],'method'=>'GET','files'=>false]) !!}     {{ csrf_field() }}
  <script type="text/javascript">
      function verifica(){
        var opciones1=document.getElementsByName('grupoAB');
        var resultado="";
        for (var i =0; i<opciones1.length; i++) {
          if(opciones1[i].checked){
            resultado=opciones1[i].value;
          }

        }



        var opciones2=document.getElementsByName('semestre');
        var resultado2="";
        for (var i =0; i<opciones2.length; i++) {
          if(opciones2[i].checked){
            resultado2=opciones2[i].value;
          }

        }
        if(resultado=='formacion'  && (resultado2=='PRIMER SEMESTRE' ||
          resultado2=="SEGUNDO SEMESTRE")){

            alert('Unicamente los alumnos de Tercero y Cuarto Semestre  tienen asignado una Formación Para el Trabajo');

        }


         if(resultado=='bachillerato'  && (resultado2=='PRIMER SEMESTRE' ||
          resultado2=="SEGUNDO SEMESTRE" || resultado2=='TERCER SEMESTRE' ||
          resultado2=="CUARTO SEMESTRE")){

            alert('Unicamente los alumnos de Quinto y Sexto Semestre  tienen asignado una Área Propedéutica');
        }
          //alert(resultado);
         // alert(resultado2);
      }
    </script>
    <label style="font-size:130%; position:  absolute;top: 10%; left: 4%" >
          <input type="radio" id="opcion" name="grupos" class="with-gap" value="crear" required="true" onclick="verifica()">
      <span>Grupos</span>
    </label>
      <label style="font-size:130%; position:  absolute;top: 25%; left: 4%" >
          <input type="radio" id="opcion" name="grupos" class="with-gap" value="formacion" required="true" onclick="verifica()">
      <span>Formación Para El Trabajo</span>
    </label>

      <label style="font-size:130%; position:  absolute;top: 40%; left: 4%" >
          <input type="radio" id="opcion" name="grupos" class="with-gap" value="bachillerato" required="true" onclick="verifica()">
      <span>Área Propedéutica</span>
    </label>

    <label style="font-size:130%; position:  absolute;top: 10%; left: 46%" >
          <input type="radio" name="semestre" onclick="verifica()" class="with-gap" value="PRIMER SEMESTRE" required="true" >
      <span>PRIMER SEMESTRE</span>
    </label>

    <label style="font-size:130%; position:  absolute;top: 25%; left: 46%">
          <input type="radio" name="semestre" onclick="verifica()" class="with-gap"  value="SEGUNDO SEMESTRE" >
      <span>SEGUNDO SEMESTRE</span>
    </label>


    <label style="font-size:130%; position:  absolute;top: 40%; left: 46%">
          <input type="radio" name="semestre" onclick="verifica()" class="with-gap" value="TERCER SEMESTRE" >
      <span>TERCER SEMESTRE</span>
    </label>

       <label style="font-size:130%; position:  absolute;top: 55%; left: 46%" >
          <input type="radio" name="semestre" onclick="verifica()" class="with-gap" value="CUARTO SEMESTRE" required="true" >
      <span>CUARTO SEMESTRE</span>
    </label>

    <label style="font-size:130%; position:  absolute;top: 70%; left: 46%">
          <input type="radio" name="semestre" onclick="verifica()" class="with-gap" value="QUINTO SEMESTRE" >
      <span>QUINTO SEMESTRE</span>
    </label>


    <label style="font-size:130%; position:  absolute;top: 85%; left: 46%">
          <input type="radio" name="semestre" onclick="verifica()" class="with-gap" value="SEXTO SEMESTRE" >
      <span>SEXTO SEMESTRE</span>
    </label>


<label style="font-size:130%; position:  absolute;top: 10%; left: 85%">
          <input type="radio" name="Grupo" onclick="verifica()" class="with-gap" value="A" >
      <span>A</span>
    </label>


    <label style="font-size:130%; position:  absolute;top: 25%; left: 85%">
          <input type="radio" name="Grupo" onclick="verifica()" class="with-gap" value="B" >
      <span>B</span>
    </label>
     <input type="submit"  name="aceptar" value="Aceptar" class="btn btn-primary" style="font-size:120%; position :absolute;top: 110%; left: 65%" >

     {!! form::close() !!}
    </div>
  </section>
</body>
</html>
