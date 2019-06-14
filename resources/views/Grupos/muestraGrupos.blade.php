<!DOCTYPE html>
<html>

    <head>
     <script src="http://code.jquery.com//jquery.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

          {{--@include('interfazprincipal.image')--}}
          @include('ControlEscolar.CEprincipal')
    </head>
<body>

    
        @if (session()->has('msj2'))
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <div class="alert alert-danger" role="alert">
      <button type="button" class="close" data-dismiss="alert" >&times;</button>
      <strong>¡Error! </strong>{{session('msj2')}}
    </div>
  @endif

 <section style="width: 100%; max-width: 100%; height:100%;max-height: 100%; background: #FFFFFF">

        <div class="card-header text-center" style="font-size:200%;width: 50%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 35.5%; left: 25%;" >{{ __(' Grupos: '.$semestre) }}

           </div> <div style="position: absolute;top: 45%; left: 25%; width: 50%; background-color:#aaa">
             
               <table width="90%" left="5px" align="center">
          <tr>
            <td width="50%" align="center">Grupo A</td>
            <td width="50%" align="center">Grupo B</td>
          </tr>
          <tr>
            <td width="50%" align="center"> </td>
            <td width="50%" align="center"></td>
          </tr>
          <tr>
            <td width="50%" align="center">
          
          <br><?php
            
            foreach ($listaA as $r) {
                ?>
               <label > {{ $r }}</label> <br><br>
                <?php
              }  
          ?>
        </td>
        <td width="50%" align="center">
             <?php
         
            foreach ($listaB as $r) {
                ?>
               <label > {{ $r }}</label> <br><br>
                <?php
              }  
          ?>

        </td>
        </tr>
        </table>
              

              </div></div>
         </div>



        </div> 