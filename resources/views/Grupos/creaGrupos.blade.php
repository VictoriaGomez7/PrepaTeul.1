<!DOCTYPE html>

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <div class="alert alert-danger" role="alert">
      <button type="button" class="close" data-dismiss="alert" >&times;</button>
      <strong>¡Error! </strong>{{session('msj2')}}
    </div>
  @endif

 <section style="width: 100%; max-width: 100%; height:100%;max-height: 100%; background: #FFFFFF">
   <?php
          if(isset($semestre)){ 
         ?>
        <div class="card-header text-center" style="font-size:200%;width: 90%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 52%; left: 5%;" >{{ __('Grupos del '.$semestre) }}
        </div> <div style="position: absolute;top: 62%; left:5%; width: 90%; background-color:#aaa">
          {!! Form::open(['route'=>['grupos.show', $semestre ],'method'=>'GET','files'=>false]) !!}     {{ csrf_field() }}
        
         <table width="100%" left="5px" align="center" border="">
          <tr>
           <td  align="center" width="25%">Grupo A

           </td>
            <td  align="center" width="25%">Grupo B</td>
            <td  align="center" width="25%">Hombres</td>
            <td  align="center" width="25%">Mujeres</td>
          </tr>
          <tr>
            <td  align="center"> </td>
            <td  align="center"></td>
            <td  align="center"> </td>
            <td  align="center"></td>
          </tr>
          <tr>
            <td align="justify">
          <table>
              <?php
            
            foreach ($listaA as $r) {
                ?>
                <tr><td>
               <label for="eliminar{{ $r->id }}"> {{$r->Nombre_A}}</label>
                <input type="submit" name="eliminar{{$r->id}}" value=" x " > 
              </td></tr>
                <?php
              }  
          ?>
        </table>
        
            </td>
            <td align="justify">
          
                  <table>
              <?php
            
            foreach ($listaB as $r) {
                ?>
                <tr><td>
               <label for="eliminar{{ $r->id }}"> {{$r->Nombre_A}}</label>
                <input type="submit" name="eliminar{{$r->id}}" value=" x " > 
                </td></tr>
                <?php
              }  
          ?>
          </table>
      
            </td>
            <td  align="center">
          <table>
          <?php
            
            foreach ($alumnosHombres as $r) {
                ?>
                <tr><td>
               <label for="{{ $r->id }}"> {{ $r->Nombre_A }}</label>
               <select name="combo{{$r->id}}" >
                  <option value="A" >A</option>
                  <option value="B" >B</option>
              </select>
                <input type="submit" name="{{ $r->id }}" value="Aceptar" > 
                </td></tr>
                <?php
              }  
          ?>
        </table>
        </td>
        <td  align="center">
             <?php
         
            foreach ($alumnosMujeres as $r) {
                ?>
               <label for="{{ $r->id }}"> {{ $r->Nombre_A }}</label>
               <select name="combo{{$r->id}}" >
                  <option value="A">A</option>
                  <option value="B">B</option>
              </select>
                <input type="submit" name="{{ $r->id }}" value="Asignar" > 
                <br><br>

                <?php
              }  
          ?>

        </td>
        </tr>
        </table>
       <input type="submit" name="A" value="Guardar" class="btn btn-primary" top="20%" align="center" style="position: absolute;left: 45%">
             
        </div>
         <?php 
          }else{
        ?>
        <?php } ?>
              
      </div>

      {!! Form::close()!!}
      </section>

    </body>
    </html>