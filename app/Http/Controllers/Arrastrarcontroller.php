<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docentes;
use App\Materia;
use App\RelacionDocenteMateriaGrupo;
use App\materia_grupo;
use Carbon\Carbon;


class Arrastrarcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Docentes = Docentes::all();

        $now= Carbon::now();
        $fecha=$now-> format('m');
        $Materias_Grupo=materia_grupo::get('Clave');


        if ($fecha>='07' and $fecha<='12'){
            $Materias=array();

            $Nom_Mat = Materia::where('Semestre','=','SEGUNDO SEMESTRE')->orWhere('Semestre','=','CUARTO SEMESTRE')->orWhere('Semestre','=','SEXTO SEMESTRE')->get();

            $Materias=array();
            $bandera=False;
            for ($i=0; $i < count($Materias_Grupo); $i++) {
                $Clave_Mat=$Materias_Grupo[$i]->Clave;

                for ($j=0; $j <count($Nom_Mat) ; $j++) { 
                    //return $Nom_Mat[$j]->Clave;
                    $Clave_2=$Nom_Mat[$j]->Clave;

                    if ($Clave_Mat == $Clave_2){
                        $dato=$Nom_Mat[$j];
                        $bandera=True;
                        //print_r("Salio. ");
                       
                    }
                }
                if ($bandera==True){
                    array_push($Materias,$dato);
                    $bandera=False;
                }
                
            }
            
            $M_P_S=Materia::where('Semestre','PRIMER SEMESTRE')->get();
            $M_S_S=Materia::where('Semestre','SEGUNDO SEMESTRE')->get();
            $M_T_S=Materia::where('Semestre','TERCER SEMESTRE')->get();
            $M_C_S=Materia::where('Semestre','CUARTO SEMESTRE')->get();
            $M_Q_S=Materia::where('Semestre','QUINTO SEMESTRE')->get();
            $M_SIX_S=Materia::where('Semestre','SEXTO SEMESTRE')->get();
            $num=1;

            

            return view('RegistrarDocentes.asignar',compact('Materias','Docentes','M_S_S','M_C_S','M_SIX_S','num','M_P_S','M_T_S','M_Q_S'));
        }
        else if ($fecha>='01' and $fecha<='06'){

            $Materias=array();

            $Nom_Mat = Materia::where('Semestre','=','PRIMER SEMESTRE')->orWhere('Semestre','=','TERCER SEMESTRE')->orWhere('Semestre','=','QUINTO SEMESTRE')->get();
            //return $Nom_Mat;
            $Materias=array();
            $bandera=False;
            for ($i=0; $i < count($Materias_Grupo); $i++) {
                $Clave_Mat=$Materias_Grupo[$i]->Clave;

                for ($j=0; $j <count($Nom_Mat) ; $j++) { 
                    //return $Nom_Mat[$j]->Clave;
                    $Clave_2=$Nom_Mat[$j]->Clave;

                    if ($Clave_Mat == $Clave_2){
                        $dato=$Nom_Mat[$j];
                        $bandera=True;
                        //print_r("Salio. ");
                       
                    }
                }
                if ($bandera==True){
                    array_push($Materias,$dato);
                    $bandera=False;
                }
                
            }

            $M_P_S=Materia::where('Semestre','PRIMER SEMESTRE')->get();
            $M_S_S=Materia::where('Semestre','SEGUNDO SEMESTRE')->get();
            $M_T_S=Materia::where('Semestre','TERCER SEMESTRE')->get();
            $M_C_S=Materia::where('Semestre','CUARTO SEMESTRE')->get();
            $M_Q_S=Materia::where('Semestre','QUINTO SEMESTRE')->get();
            $M_SIX_S=Materia::where('Semestre','SEXTO SEMESTRE')->get();
            $num2=1;

            //return $M_Q_S;
            return view('RegistrarDocentes.asignar',compact('Materias','Docentes','M_P_S','M_T_S','M_Q_S','num2','M_S_S','M_C_S','M_SIX_S'));
        }


        //return route->()

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return 'esta en create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $arreglo1=array();
        $var=($request->Arreglo).",";
        $tam=strlen($var);
        $conca="";
        $c=0;
        while ($c<$tam) { //este while mete las materias y los cudros(identidficadores) en el primer arreglo
             if ($var[$c]==","){
                array_push($arreglo1, $conca);
                $conca="";
            } else {
                $conca=$conca.($var[$c]);
            }
            $c=$c+1;
        }

        $arreglo2=array();
        $var2=($request->Arreglo2).",";
        $tam2=strlen($var2);
        $conca="";
        $c=0;
        while ($c<$tam2) { //Este while mete los docentes obtenidos en un arreglo
             if ($var2[$c]==","){
                array_push($arreglo2, $conca);
                $conca="";
            } else {
                $conca=$conca.($var2[$c]);
            }
            $c=$c+1;
        }
        //print_r($arreglo1);
       // print_r($arreglo2);
        $arregloSinRepetidos=array();
        $arregloMaterias=array();
        $arregloCuadros=array();
        $tamArreglo1V1=count($arreglo1);
        $i=0;
         while ($i <$tamArreglo1V1) { //Este while solo separa las materias y los cuadros
            if ($i%2==0){

                array_push($arregloMaterias, $arreglo1[$i]);
            } else {

                array_push($arregloCuadros, $arreglo1[$i]);
            }
            $i=$i+1;
        }
        //print_r($arregloCuadros);
        //print_r($arregloMaterias);
        $tamArreglo1V2=count($arregloCuadros);
        for ($i=0; $i < $tamArreglo1V2 ; $i++) {//Este for borra todos los movimietos anteriores de las cajitas

            if (in_array($arregloMaterias[$i],$arregloSinRepetidos)){
                //print "si estoy";
                $buscar=$arregloMaterias[$i];
                $posi=array_search ($buscar , $arregloSinRepetidos );
                //print_r("Soy la posicion en la que se repite");
                //print_r($posi);
                array_splice($arregloSinRepetidos, $posi,1);
                array_splice($arregloSinRepetidos, $posi,1);

                array_push($arregloSinRepetidos, $arregloMaterias[$i]);
                array_push($arregloSinRepetidos, $arregloCuadros[$i]);

            } else {
                //print "no estoy";
                array_push($arregloSinRepetidos, $arregloMaterias[$i]);
                array_push($arregloSinRepetidos, $arregloCuadros[$i]);
            }
        }
        //print "Holaaaaaaaaaa";
        //print_r($arregloSinRepetidos);

        $tamArreglo1=count($arregloSinRepetidos);
        //print_r($tamArreglo1);
        for ($i=0; $i < $tamArreglo1; $i++) {//Este For cuadra las materias con el docente de el segundo arreglo
            if ($i%2==0){
            //print "Hola soy un par";
            //print $i;
            } else {
                $cuadro=$arregloSinRepetidos[$i];
                $materiaasignada=$arregloSinRepetidos[$i-1];
                $doce=$cuadro[strlen($cuadro)-2].$cuadro[strlen($cuadro)-1];
                //print "Soy el docente del arreglo ".$doce;
                $docenteselec=$arreglo2[intval($doce)-1];
                print "Docente: ".$docenteselec." Materia asignada--> ".$materiaasignada."  ";
                $Relacion=new RelacionDocenteMateriaGrupo();
                $Relacion->Materia=$materiaasignada;
                $Relacion->Docente=$docenteselec;
                $Relacion->save();
                //print "Hola soy un inpar";
                //print $i;
            }
        }
        return back()->with('msj','Datos guardados con éxito.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return ' esta en show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return 'esta en edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return 'esta eb destroy';
    }
}
