<html>

    <head>
     <script src="http://code.jquery.com//jquery.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

     
        

          <img src="{{public_path('images\logo_Zacatecas.jpg')}}" style="width: 120px; height: 50px;position: absolute;top: 35px; left: 10px">
        <img src="{{public_path('images/logo_Prepas.png')}}" style="width: 100px; height: 70px; position: absolute;top: 35px; left: 380px"> <!-- EL left es de manera horizontal-->
        <img src="{{public_path('images/datos_Prepa_Negro.jpg')}}" style="width: 180px; height: 80px; position: absolute;top: 35px; left: 150px"> <!-- EL left es de manera horizontal-->
        <img src="{{public_path('images/logo_Prepa_Teul.jpg')}}" style="width: 123px; height: 129px; position: absolute;top: 5px; left: 550px">
        <br>
        <br>
        <br><br>
<body>

    <br>
    <br><br>
             <left>
              <h2>{{$titulo}} </h2>
               <table width="100%" left="5px" align="left" border="1">
          <tr>
           
            <td width="15%" align="left">Matricula</td>
             <td width="85%" align="left">Alumno</td>
          </tr>
          
        
           
          
          <?php
            
            foreach ($listaA as $r) {
                ?>
                <tr><td>
               <label > {{ $r->id }}</label> </td>
                  <td>
               <label > {{ $r->Nombre_A }}</label> </td></tr>
                <?php
              }  
          ?>
       
             
          </table>
          </left>

              </div></div>
         </div>



        </div> 
      </body>
    </head>