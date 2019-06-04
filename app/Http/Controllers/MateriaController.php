<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTrainerRequest;
use App\materia;
use App\materia_grupo;
use App\Http\Requests\TagStoreRequestMaterias;
class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      
      return view('materias.consulta');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TagStoreRequestMaterias $request)
    {       //return $request;
            //Arreglo de numero romanos
     
            $Romanos=array('I','II','III',"IV",'V','VI' );
            $Quitar=array('a','del','la',"para",'de','y','el' );
            $Auxiliar=array();
            //Extraer el nombre se la materia en una variable($Nombremat)
            $Nombremat=$request['nombre'];
            //Extraer el tipo de materia en una varible ($Tipomat)
            $Tipomat=$request['tipo'];
            $Clavemat='';
            //Comparaciones del tipo de materia para sacar la primer parte
            switch ($Tipomat) {
              case 'Formación Básica':
                $Clavemat=$Clavemat.'FB-';
                break;
              case 'Formación Propedéutica':
                  $Clavemat=$Clavemat.'FP-';
                break;
              case 'Formación Profesional':
                    $Clavemat=$Clavemat.'FT-';
                break;

              default:
                $Clavemat=$Clavemat.'AP-';
                break;
            }

            //proceso para dividir el nombre
            $letras3='';
            $letras=str_split($Nombremat);
            $concatena='';
            $arreglonombre= array();
            for ($i=0; $i < count($letras) ; $i++) {
              switch ($letras[$i]) {
                case ' ':
                  array_push ( $arreglonombre , $concatena );
                  $concatena='';
                  break;

                default:

                  $concatena=$concatena.$letras[$i];
                  break;
              }

            }
              array_push ( $arreglonombre , $concatena );
          //Comparaciones de cuantas palabras son
          $bandera='0';
          switch (count($arreglonombre)) {
            case 1:
              $letras2=str_split($arreglonombre[0]);
              $Clavemat=$Clavemat.strtoupper($letras2[0]).strtoupper($letras2[1]).strtoupper($letras2[2]);
              break;

              case 2:
                $letras2=str_split($arreglonombre[0]);
                $letras3=($arreglonombre[1]);
                trim($letras3);
                $Clavemat=$Clavemat.strtoupper($letras2[0]).strtoupper($letras2[1]);
                //Ciclo para saber si hay un numero Romano
                for ($i=0; $i <count($Romanos) ; $i++) {
                  if ($letras3==$Romanos[$i]) {
                    $bandera='1';
                  }
                }
                if ($bandera=='0') {
                  $Clavemat=$Clavemat.strtoupper($letras3[0]);
                }
                else {
                    $Clavemat=$Clavemat.strtoupper($letras2[2]);

                    switch ($letras3) {
                      case 'I':
                        $Clavemat=$Clavemat.'1';
                        break;
                      case 'II':
                        $Clavemat=$Clavemat.'2';
                        break;
                      case 'III':
                        $Clavemat=$Clavemat.'3';
                        break;
                      case 'IV':
                        $Clavemat=$Clavemat.'4';
                        break;
                      case 'V':
                        $Clavemat=$Clavemat.'5';
                        break;

                      default:
                        $Clavemat=$Clavemat.'6';
                        break;
                    }
                }
                break;

            default:
              $b=False;
              for ($i=0; $i <count($arreglonombre) ; $i++) {
                for ($j=0; $j <count($Quitar) ; $j++){
                  if ($arreglonombre[$i]==$Quitar[$j]){
                    $b=False;
                    break;
                  }else{
                    $b=True;

                  }
                }
                if ($b==True){
                      array_push ( $Auxiliar , $arreglonombre[$i] );

                }

              }
              $banderita=False;
              if (count($Auxiliar)==2) {
                $letras=str_split($Auxiliar[0]);
                $letras2=str_split($Auxiliar[1]);
                $Clavemat=$Clavemat.strtoupper($letras[0]).strtoupper($letras[1]).strtoupper($letras2[0]);
              }
              else {
                  for ($i=0; $i <count($Romanos) ; $i++) {
                    if ($Auxiliar[count($Auxiliar)-1]==$Romanos[$i]) {
                      $banderita=True;
                  }
                }
              }
            if ($banderita==True) {
              if (count($Auxiliar)-1==2) {
                $letras=str_split($Auxiliar[0]);
                $letras2=str_split($Auxiliar[1]);
                $letras3=($Auxiliar[2]);
                $Clavemat=$Clavemat.strtoupper($letras[0]).strtoupper($letras[1]).strtoupper($letras2[0]);
                switch ($Auxiliar[count($Auxiliar)]) {
                  case 'I':
                    $Clavemat=$Clavemat.'1';
                    break;
                  case 'II':
                    $Clavemat=$Clavemat.'2';
                    break;
                  case 'III':
                    $Clavemat=$Clavemat.'3';
                    break;
                  case 'IV':
                    $Clavemat=$Clavemat.'4';
                    break;
                  case 'V':
                    $Clavemat=$Clavemat.'5';
                    break;

                  default:
                    $Clavemat=$Clavemat.'6';
                    break;
                }
              }

              else {
                for ($i=0; $i <count($Auxiliar)-1 ; $i++) {
                  $letras=str_split($Auxiliar[$i]);
                  $Clavemat=$Clavemat.strtoupper($letras[0]);
            }
            switch ($Auxiliar[count($Auxiliar)-1]) {
              case 'I':
                $Clavemat=$Clavemat.'1';
                break;
              case 'II':
                $Clavemat=$Clavemat.'2';
                break;
              case 'III':
                $Clavemat=$Clavemat.'3';
                break;
              case 'IV':
                $Clavemat=$Clavemat.'4';
                break;
              case 'V':
                $Clavemat=$Clavemat.'5';
                break;

              default:
                $Clavemat=$Clavemat.'6';
                break;
            }
          }
        }
            else {
              for ($i=0; $i <count($Auxiliar) ; $i++) {
                $letras=str_split($Auxiliar[$i]);
                $Clavemat=$Clavemat.strtoupper($letras[0]);
              }
            }

              break;
          }

            $materia=new Materia();
            $materia->Clave=$Clavemat;
            $materia->Tipo=$request['tipo'];
            $materia->Nombre=$request['nombre'];
            $materia->Semestre=$request['semestre'];
            $materia->Bachillerato=$request['bachillerato'];
            $materia->Horas=$request['horas'];
            $materia->save();
            
            
            if ($request['tipo']=="Actividades Paraescolares" or $request['tipo']=="Formación Básica"){
                //return $request['semestre'];

                $materia_grupo=new Materia_Grupo();
                $materia_grupo->Clave=$Clavemat;
                $materia_grupo->Grupo='A';
                $materia_grupo->Semestre=$request['semestre'];
                $materia_grupo->save();

                $materia_Grupo=new Materia_Grupo();
                $materia_Grupo->Clave=$Clavemat;
                $materia_Grupo->Grupo='B';
                $materia_Grupo->Semestre=$request['semestre'];
                $materia_Grupo->save();
                //
            }

            else if ($request['tipo']=="Formación Para El Trabajo")
            {
                $materia_Grupo=new Materia_Grupo();
                $materia_Grupo->Clave=$Clavemat;
                $materia_Grupo->Grupo=$request['nombre'];
                $materia_Grupo->Semestre=$request['semestre'];
                $materia_Grupo->save();
                //return "Formación hola";

            }
               else if ($request['tipo']=="Formación Propedéutica")
            {
                $materia_Grupo=new Materia_Grupo();
                $materia_Grupo->Clave=$Clavemat;
                $materia_Grupo->Grupo=$request['bachillerato'];
                $materia_Grupo->Semestre=$request['semestre'];
                $materia_Grupo->save();

            }      
            return back()->with('msj','Materia registrada con éxito. Clave: '.$Clavemat);
            
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
      $materia=[];
      $materias=materia::where([['Clave',$r->claveOriginal]])->get();
      foreach ($materias as $row ) {
        $materia=$row;
        
     }


      if(strlen($materia)){
                if(($r->Tipo=="Formación Propedéutica")){
                    if ($r->Semestre=="QUINTO SEMESTRE" or $r->Semestre=="SEXTO SEMESTRE") {
                              $materia->fill($r->all());
                            $materia->save();
                            return redirect('materia')->with('msj','Materia Modificada Correctamente');

                    }else{

                        return back()->with('msjERROR','El semestre seleccionado no coincide para el tipo de materia.' );
                    }


                }
                if ($r->Tipo=="Formación Para El Trabajo"){
                if ($r->Semestre=="TERCER SEMESTRE" or $r->Semestre=="CUARTO SEMESTRE" or $r->Semestre=="QUINTO SEMESTRE" or $r->Semestre=="SEXTO SEMESTRE") {
                     $materia->fill($r->all());
                            $materia->save();
                           return redirect('materia')->with('msj','Materia Modificada Correctamente');
                                           }
                else{
                    return back()->with('msj','El semestre seleccionado no coincide para el tipo de materia.' );
                }
            }


                else{
                   $materia->fill($r->all());
                   $materia->save();
                return redirect('materia')->with('msj','Materia Modificada Correctamente');
            }


        }else {

         return redirect('materia')->with('msj2','Materia Modificada Correctamente1');

        }
         //return redirect('materia')->with('msj','Materia Modificada Correctamente');
         return redirect('materia')->with('msj2','Materia Modificada Correctamente2');

     }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($r)
    {
        $opciones2="";
         $opciones="";
        ///return $r;//
       $materia="";
     $materias=materia::where([

            ['Clave',$r]
        ])->get();
      foreach ($materias as $row ) {
         # code...


        $materia=$row;
        if($materia->Tipo=='Formación Propedéutica'){
                    $opciones=' <option value="Formación Propedéutica" selected="true">Formación Propedéutica</option>
                      <option value="Formación Para El Trabajo">Formación Para El Trabajo</option>
                      <option value="Actividades Paraescolares">Actividades Paraescolares</option>
                      <option value="Formación Básica">Formación Básica</option>';

                }else if($materia->Tipo=='Formación Para El Trabajo'){
                    $opciones=' <option value="Formación Propedéutica" >Formación Propedéutica</option>
                      <option value="Formación Para El Trabajo" selected="true">Formación Para El Trabajo</option>
                      <option value="Actividades Paraescolares">Actividades Paraescolares</option>
                      <option value="Formación Básica">Formación Básica</option>';

                }else if($materia->Tipo=='Actividades Paraescolares'){
                    $opciones=' <option value="Formación Propedéutica" >Formación Propedéutica</option>
                      <option value="Formación Para El Trabajo">Formación Para El Trabajo</option>
                      <option value="Actividades Paraescolares" selected="true">Actividades Paraescolares</option>
                      <option value="Formación Básica">Formación Básica</option>';

                }else if($materia->Tipo=='Formación Básica'){
                    $opciones=' <option value="Formación Propedéutica" >Formación Propedéutica</option>
                      <option value="Formación Para El Trabajo">Formación Para El Trabajo</option>
                      <option value="Actividades Paraescolares">Actividades Paraescolares</option>
                      <option value="Formación Básica" selected="true">Formación Básica</option>';
                }

                if($materia->Semestre=='PRIMER SEMESTRE'){
                    $opciones2='<option value="PRIMER SEMESTRE" selected="true">PRIMER SEMESTRE</option>
                            <option value="SEGUNDO SEMESTRE">SEGUNDO SEMESTRE</option>
                            <option value="TERCER SEMESTRE">TERCER SEMESTRE</option>
                            <option value="CUARTO SEMESTRE">CUARTO SEMESTRE</option>
                            <option value="QUINTO SEMESTRE">QUINTO SEMESTRE</option>
                            <option value="SEXTO SEMESTRE">SEXTO SEMESTRE</option>';
                }else if($materia->Semestre=='SEGUNDO SEMESTRE'){
                    $opciones2='<option value="PRIMER SEMESTRE">PRIMER SEMESTRE</option>
                            <option value="SEGUNDO SEMESTRE" selected="true">SEGUNDO SEMESTRE</option>
                            <option value="TERCER SEMESTRE">TERCER SEMESTRE</option>
                            <option value="CUARTO SEMESTRE">CUARTO SEMESTRE</option>
                            <option value="QUINTO SEMESTRE">QUINTO SEMESTRE</option>
                            <option value="SEXTO SEMESTRE">SEXTO SEMESTRE</option>';
                }else if($materia->Semestre=='TERCER SEMESTRE'){
                    $opciones2='<option value="PRIMER SEMESTRE">PRIMER SEMESTRE</option>
                            <option value="SEGUNDO SEMESTRE" >SEGUNDO SEMESTRE</option>
                            <option value="TERCER SEMESTRE" selected="true">TERCER SEMESTRE</option>
                            <option value="CUARTO SEMESTRE">CUARTO SEMESTRE</option>
                            <option value="QUINTO SEMESTRE">QUINTO SEMESTRE</option>
                            <option value="SEXTO SEMESTRE">SEXTO SEMESTRE</option>';
                }else if($materia->Semestre=='CUARTO SEMESTRE'){
                    $opciones2='<option value="PRIMER SEMESTRE">PRIMER SEMESTRE</option>
                            <option value="SEGUNDO SEMESTRE" >SEGUNDO SEMESTRE</option>
                            <option value="TERCER SEMESTRE" >TERCER SEMESTRE</option>
                            <option value="CUARTO SEMESTRE" selected="true">CUARTO SEMESTRE</option>
                            <option value="QUINTO SEMESTRE">QUINTO SEMESTRE</option>
                            <option value="SEXTO SEMESTRE">SEXTO SEMESTRE</option>';
                }else if($materia->Semestre=='QUINTO SEMESTRE'){
                    $opciones2='<option value="PRIMER SEMESTRE">PRIMER SEMESTRE</option>
                            <option value="SEGUNDO SEMESTRE" >SEGUNDO SEMESTRE</option>
                            <option value="TERCER SEMESTRE" >TERCER SEMESTRE</option>
                            <option value="CUARTO SEMESTRE" >CUARTO SEMESTRE</option>
                            <option value="QUINTO SEMESTRE" selected="true">QUINTO SEMESTRE</option>
                            <option value="SEXTO SEMESTRE">SEXTO SEMESTRE</option>';
                }else if($materia->Semestre=='SEXTO SEMESTRE'){
                    $opciones2='<option value="PRIMER SEMESTRE">PRIMER SEMESTRE</option>
                            <option value="SEGUNDO SEMESTRE" >SEGUNDO SEMESTRE</option>
                            <option value="TERCER SEMESTRE" >TERCER SEMESTRE</option>
                            <option value="CUARTO SEMESTRE" >CUARTO SEMESTRE</option>
                            <option value="QUINTO SEMESTRE" >QUINTO SEMESTRE</option>
                            <option value="SEXTO SEMESTRE" selected="true">SEXTO SEMESTRE</option>';
                }


           }
           return view('materias.modificar' ,compact('materia','opciones','opciones2'));
          }

              /**
               * Show the form for editing the specified resource.
               *
               * @param  int  $id
               * @return \Illuminate\Http\Response
               */
    public function edit($g, Request $r)
    {
      $materia=[];
      $materias=Materia::where([['Clave',$r->Clave]
        ])->get();
        foreach ($materias as $row ) {
            $materia=$row;

        }
       //return $materia->Clave;

        if($materia!=null)  {
            return view('materias.vista',compact('materia'));
         }else{

            return back()->with('msj2','La materia no existe' );
         }
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($r)
    {
        //
        return "h";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        materia::where('Clave',$id)->delete();
       materia::get();
       materia_grupo::where('Clave',$id)->delete();
       materia_grupo::get();
       return redirect('materia')->with('msj','Materia Eliminada Correctamente');
        //return  view('Alumnos.index',compact('alumnos'));
       //return view('materias.consulta');
    }
}