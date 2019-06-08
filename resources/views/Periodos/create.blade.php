
{{--<a href="interfazprinci">
    <button class="btn btn-success" style="position: absolute;top: 110%;left:5%">Atras</button></a>--}}
@extends('layouts.app')

@section('title','Docente')

{{--@include('interfazprincipal.image')--}}
@include('ControlEscolar.CEprincipal')
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

  <script type="text/javascript">
function mostrar(id) {
  if (id == "Primer") {
    $("#Primer").show();
    $("#Segundo").hide();
    $("#Tercer").hide();
    $("#boton").show();
  }
  
  if (id == "Segundo") {
    $("#Primer").hide();
    $("#Segundo").show();
    $("#Tercer").hide();
    $("#boton").show();
  }
  
  if (id == "Tercer") {
    $("#Primer").hide();
    $("#Segundo").hide();
    $("#Tercer").show();
    $("#boton").show();
  }

  if (id == "ningun") {
    $("#Primer").hide();
    $("#Segundo").hide();
    $("#Tercer").hide();
    $("#boton").hide();
  }
  
}
</script>

  </head>

<body>
  <div id="Contenedor" style="position: absolute; top: 45%; left: 35%">
  <div class="ContentForm" style="text-align: center;" >

  {!!Form::open(['route' => ['Periodos.store'],'method'=>'POST','id'=>'elForm'])!!}
  @csrf
<div>
  <select name="periodo" id="periodo" onChange="mostrar(this.value);">
<option value="ningun" >Seleccione un periodo</option>
<option value="Primer">Primer Periodo</option>

<option value="Segundo">Segundo Periodo</option>

<option  value="Tercer">Tercer Periodo</option>

</select>

@foreach($no_p as $per)
@endforeach
<div id="Primer" class="element" style="display: none;">

  <label>Fecha inicio</label>
  <input 
   id="fecha1" 
   type="date" name="fecha1" onChange="sinDomingos();" 
   onblur="obtenerfechafinf1();" style="height:30px;" value="{{$no_p[0]->fecha1}}" />
   <input
    id="elSubmit1"  type="submit" style="display:none;" />

    <label>Fecha Final</label>
  <input 
   id="fecha2" 
   type="date" name="fecha2" onChange="sinDomingos2();" 
   onblur="obtenerfechafinf2();" style="height:30px;" value="{{$no_p[0]->fecha2}}" />
   <input
    id="elSubmit2"  type="submit" style="display:none;" />   

  </div>



  <div id="Segundo" class="element" style="display: none;">

  <label>Fecha inicio</label>
  <input 
   id="fecha3" 
   type="date" name="fecha3" onChange="sinDomingos3();" 
   onblur="obtenerfechafinf3();" style="height:30px;"value="{{$no_p[1]->fecha1}}" />
   <input
    id="elSubmit3"  type="submit" style="display:none;" />

    <label>Fecha Final</label>
  <input 
   id="fecha4" 
   type="date" name="fecha4" onChange="sinDomingos4();" 
   onblur="obtenerfechafinf4();" style="height:30px;"value="{{$no_p[1]->fecha2}}" />
   <input
    id="elSubmit4"  type="submit" style="display:none;" />   

    

  </div>



<div id="Tercer" class="element" style="display: none;">

  <label>Fecha inicio</label>
  <input 
   id="fecha5" 
   type="date" name="fecha5" onChange="sinDomingo5();" 
   onblur="obtenerfechafinf5();" style="height:30px;" value="{{$no_p[2]->fecha1}}"/>
   <input
    id="elSubmit5"  type="submit" style="display:none;" />

    <label>Fecha Final</label>
  <input 
   id="fecha6" 
   type="date" name="fecha6" onChange="sinDomingos6();" 
   onblur="obtenerfechafinf6();" style="height:30px;"value="{{$no_p[2]->fecha2}}"/>
   <input
    id="elSubmit6"  type="submit" style="display:none;" />   


  </div>

<button type="submit" class="btn btn-primary" id="boton" style="display:none;">Guardar</button>


</div>



<script type="text/javascript">
var elDate = document.getElementById('fecha1');
var elForm = document.getElementById('elForm');
var elSubmit = document.getElementById('elSubmit1');



function sinDomingos(){
    var day = new Date(elDate.value ).getUTCDay();
    // Días 0-6, 0 es Domingo 6 es Sábado
    elDate.setCustomValidity(''); // limpiarlo para evitar pisar el fecha inválida
    if( day == 0 || day == 6 ){
       elDate.setCustomValidity('Fines de semana no disponibles, por favor seleccione otro día');
    } else {
       elDate.setCustomValidity('');
    }
    if(!elForm.checkValidity()) {elSubmit.click()};
}

function obtenerfechafinf1(){
    sinDomingos();
}

var elDate2 = document.getElementById('fecha2');
var elForm2 = document.getElementById('elForm');
var elSubmit2 = document.getElementById('elSubmit2');



function sinDomingos2(){
    var day = new Date(elDate2.value ).getUTCDay();
    // Días 0-6, 0 es Domingo 6 es Sábado
    elDate2.setCustomValidity(''); // limpiarlo para evitar pisar el fecha inválida
    if( day == 0 || day == 6 ){
       elDate2.setCustomValidity('Fines de semana no disponibles, por favor seleccione otro día');
    } else {
       elDate2.setCustomValidity('');
    }
    if(!elForm2.checkValidity()) {elSubmit2.click()};
}

function obtenerfechafinf2(){
    sinDomingos2();
}
</script>

<script type="text/javascript">
var elDate3 = document.getElementById('fecha3');
var elForm3 = document.getElementById('elForm');
var elSubmit3 = document.getElementById('elSubmit3');



function sinDomingos3(){
    var day = new Date(elDate3.value ).getUTCDay();
    // Días 0-6, 0 es Domingo 6 es Sábado
    elDate3.setCustomValidity(''); // limpiarlo para evitar pisar el fecha inválida
    if( day == 0 || day == 6 ){
       elDate3.setCustomValidity('Fines de semana no disponibles, por favor seleccione otro día');
    } else {
       elDate3.setCustomValidity('');
    }
    if(!elForm3.checkValidity()) {elSubmit3.click()};
}

function obtenerfechafinf3(){
    sinDomingos3();
}

var elDate4 = document.getElementById('fecha4');
var elForm4 = document.getElementById('elForm');
var elSubmit4 = document.getElementById('elSubmit4');



function sinDomingos4(){
    var day = new Date(elDate4.value ).getUTCDay();
    // Días 0-6, 0 es Domingo 6 es Sábado
    elDate4.setCustomValidity(''); // limpiarlo para evitar pisar el fecha inválida
    if( day == 0 || day == 6 ){
       elDate4.setCustomValidity('Fines de semana no disponibles, por favor seleccione otro día');
    } else {
       elDate4.setCustomValidity('');
    }
    if(!elForm4.checkValidity()) {elSubmit4.click()};
}

function obtenerfechafinf4(){
    sinDomingos4();
}
</script>



<script type="text/javascript">
var elDate5 = document.getElementById('fecha5');
var elForm5 = document.getElementById('elForm');
var elSubmit5 = document.getElementById('elSubmit5');



function sinDomingos5(){
    var day = new Date(elDate5.value ).getUTCDay();
    // Días 0-6, 0 es Domingo 6 es Sábado
    elDate5.setCustomValidity(''); // limpiarlo para evitar pisar el fecha inválida
    if( day == 0 || day == 6 ){
       elDate5.setCustomValidity('Fines de semana no disponibles, por favor seleccione otro día');
    } else {
       elDate5.setCustomValidity('');
    }
    if(!elForm5.checkValidity()) {elSubmit5.click()};
}

function obtenerfechafinf5(){
    sinDomingos5();
}

var elDate6 = document.getElementById('fecha6');
var elForm6 = document.getElementById('elForm');
var elSubmit6 = document.getElementById('elSubmit6');



function sinDomingos6(){
    var day = new Date(elDate6.value ).getUTCDay();
    // Días 0-6, 0 es Domingo 6 es Sábado
    elDate6.setCustomValidity(''); // limpiarlo para evitar pisar el fecha inválida
    if( day == 0 || day == 6 ){
       elDate6.setCustomValidity('Fines de semana no disponibles, por favor seleccione otro día');
    } else {
       elDate6.setCustomValidity('');
    }
    if(!elForm6.checkValidity()) {elSubmit6.click()};
}

function obtenerfechafinf6(){
    sinDomingos6();
}
</script>

</div>
</div>


  </body>
   <!-- vinculando a libreria Jquery-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <!-- Libreria java scritp de bootstrap -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
@endsection