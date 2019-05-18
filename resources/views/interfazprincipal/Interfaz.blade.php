<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/style_ed.css">
    <link rel="stylesheet" type="text/css" href="/css/backend.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="/css/estilos.css">
    <link rel="stylesheet" href="/css/index_style2.css">
  <title>Bienvenido</title>
</head>
<script>
  function rotar_imagen(){
  var tiempo = 8000;//tiempo en milisegundos
  var arrImagenes = ['/images/img7.png','/images/img2.jpg','/images/img7.png','/images/img2.jpg','/images/img7.png','/images/img2.jpg',];

  _img = document.getElementById('rotativo');

  _img.src = arrImagenes[0];
  var i=0;
  setInterval(function(){
    _img.src = arrImagenes[i];
    i = (i == arrImagenes.length-1)? 0 : (i+1);
  }, tiempo);
}
</script>
<body   onload="rotar_imagen();" >
        @include('interfazprincipal.image')
        <header>
      {{--<a href="interfazprinci">--}}
        <a href="LoginAlumno">
          <div class="Contenedor" id="uno">
            <img class="icon" src="/images/icon66.png">
            <p class="texto1">Estudiantes</p>
          </div>
      </a>

      <a href="LoginDocente">
          <div class="Contenedor" id="dos">
            <img class="icon" src="/images/icon44.png">
            <p class="texto2">Maestros</p>
          </div>
        </a>
        {{--<a  href="interfazprinci">--}}
       <a  href="LoginControlEscolar">
          <div class="Contenedor" id="tres">
            <img class="icon" src="/images/icon22.png">
            <p class="texto3">Control Escolar</p>
          </div>
       </a>

         <a href="LoginDirector">
          <div class="Contenedor" id="cuatro">
            <img class="icon" src="/images/icon11.png">
            <p class="texto4">Directivo</p>
          </div>
        </a>
        </header>
         <div class="content-all">
            <div class="content-carrousel">
         <img id="rotativo"  />
       </div>
     </div>
     <br>
     <br><br><br><br><br><br><br>
      <p align="center" style="color: white; font-size: 1.3em;"> Constitución s/n Teúl de González Ortega.</p>
      <p align="center" style="color: white; font-size: 1.3em;"> Zac. C.P. 99800</p>
      <p align="center" style="color: white; font-size: 1.3em;">Teléfono (467)-952-71-83  </p>
      <p align="center" style="color: white; font-size: 1.3em;">Correo-e:prepateul@yahoo.com.mx
     </p >
</body>
</html>