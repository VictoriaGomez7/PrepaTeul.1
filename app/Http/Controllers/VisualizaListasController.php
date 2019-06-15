<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RelacionDocenteMateriaGrupo;
use App\materia_grupo;
use App\Docentes;
use App\Grupo;
use App\Alumno;

class VisualizaListasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
        $id=$_GET['valor'];
        $usua=$_GET['valor'];
        $otro_id=$id;
        return $this->show($id);
        

        
        //return view('DocenteInterfazPrincipal.InterfazPrincipal',compact('usua'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //return 'En el create:'. $request;
        //return $request['NombreM'].$request['NomDocente'];
        $id=$request['NomDocente']; //ESTE ESTA
        $NOMBRE_MATERIA_CON_GRUPO=$request['NombreM'];

        //ESTA PARTE ES PARA SEPARAR EL GRUPO DE LA MATERIA
        $nueva_materia='';
        $nuevo_grupo='';
        $ban=True;
        for ($m=0; $m < strlen($NOMBRE_MATERIA_CON_GRUPO); $m++) {

            if ($NOMBRE_MATERIA_CON_GRUPO[strlen($NOMBRE_MATERIA_CON_GRUPO)-1]=='A' or $NOMBRE_MATERIA_CON_GRUPO[strlen($NOMBRE_MATERIA_CON_GRUPO)-1]=='B') {

                if ($m==strlen($NOMBRE_MATERIA_CON_GRUPO)-2){
                $nuevo_grupo=$NOMBRE_MATERIA_CON_GRUPO[strlen($NOMBRE_MATERIA_CON_GRUPO)-1];
                }
                else if ($m<strlen($NOMBRE_MATERIA_CON_GRUPO)-2){
                    $nueva_materia=$nueva_materia.$NOMBRE_MATERIA_CON_GRUPO[$m];
                }
            }
            else{
                if ($m==0){
                        $dijito=$NOMBRE_MATERIA_CON_GRUPO[$m];
                        $dijitoMa=$NOMBRE_MATERIA_CON_GRUPO[$m+1];
                    }
                    elseif($m==strlen($NOMBRE_MATERIA_CON_GRUPO)-1){
                        $dijito=$NOMBRE_MATERIA_CON_GRUPO[$m];
                        $dijitoMe=$NOMBRE_MATERIA_CON_GRUPO[$m-1];
                    }
                    else{
                        $dijito=$NOMBRE_MATERIA_CON_GRUPO[$m];
                        $dijitoMa=$NOMBRE_MATERIA_CON_GRUPO[$m+1];
                        $dijitoMe=$NOMBRE_MATERIA_CON_GRUPO[$m-1]; 
                    }
                    
                    if ($ban==True and $dijito!='-' and $dijitoMa!='-'){
                        $nueva_materia=$nueva_materia.$NOMBRE_MATERIA_CON_GRUPO[$m];
                    }
                    else if ($ban==False and $dijitoMe!='-'){
                        $nuevo_grupo=$nuevo_grupo.$NOMBRE_MATERIA_CON_GRUPO[$m];
                    }
                    if ($dijito=='-'){
                        $ban=False;
                    }
                }
            }

        // SE SCAN LOS DATOS PARA MOSTRAR LOS ALUMNOS
        $nombreM=$nueva_materia;
        $grupo=$nuevo_grupo;

        $usua=$id;
        //return $usua;
        $Nombre_Docente=Docentes::where('id',$usua)->get('Nombre');
        //return $Nombre_Docente;
        $Materias=RelacionDocenteMateriaGrupo::where('Docente',$Nombre_Docente[0]->Nombre)->get('Materia');
        //return $Materias;

        $Claves=RelacionDocenteMateriaGrupo::where('Docente',$Nombre_Docente[0]->Nombre)->get('ClaveMateria');
        //return $Claves;

        $bandera=True;
        foreach ($Materias as $Materia){
            //print $nombreM.$Materia->Materia;
            if ($nombreM==$Materia->Materia){
                //print'aqui';
                $bandera=False;
            }
        }

        $banderaClave=True;
        foreach ($Claves as $Cla){
            //print $nombreM.$Materia->Materia;
            if ($nombreM==$Cla->ClaveMateria){
                //print'aqui';
                $banderaClave=False;
            }
        }
        //return 'finnnnn';

        $ba=0;
        if ($banderaClave==False){
            $busca_nom=RelacionDocenteMateriaGrupo::where('ClaveMateria',$nombreM)->get('Materia');
            $gru=RelacionDocenteMateriaGrupo::where('ClaveMateria',$nombreM)->get('Grupo');
            if (count($gru)==1){
                //return 'd'.$grupo.'d';
                if ($grupo==''){
                    //return 'es nada';
                    $grupo=$gru[0]->Grupo;
                    if ($gru[0]->Grupo!=$grupo){
                        $ba=1;
                    }
                }
                else{
                    if ($gru[0]->Grupo!=$grupo){
                        $ba=1;
                    }
                }
            }
            $nombreM=$busca_nom[0]->Materia;
        }
        elseif ($bandera==False){
            //return 'entroooooooooo';
            $gru=RelacionDocenteMateriaGrupo::where('Materia',$nombreM)->get('Grupo');
            //return count($gru);
            if (count($gru)==1){
                //return $gru[0]->Grupo.$grupo;
                if (count($gru)==1){
                    if ($grupo==''){
                    //return 'es nada';
                    $grupo=$gru[0]->Grupo;
                    if ($gru[0]->Grupo!=$grupo){
                        $ba=1;
                    }
                }
                else{
                    if ($gru[0]->Grupo!=$grupo){
                        $ba=1;
                    }
                }
                }
            }
        }
        //return $grupo;
        //return $nombreM;
        //return $ba;

        if ($bandera==True and $banderaClave==True){
            //return 'esto'.$bandera.$banderaClave;
            view('DocenteInterfazPrincipal.InterfazPrincipal',compact('usua'));
            return back()->with('msjERROR','Materia no asignada');
        }
        elseif ($ba==1){
            view('DocenteInterfazPrincipal.InterfazPrincipal',compact('usua'));
            return back()->with('msjERROR','Materia no asignada');
        }
        else{
            //return 'en el else';
            $Materia_Clave=RelacionDocenteMateriaGrupo::where('Materia',$nombreM)->get('ClaveMateria');
            //return $Materia_Clave;

            $Materia_Semestre=materia_grupo::where('Clave',$Materia_Clave[0]->ClaveMateria)->get('Semestre');
            //return $Materia_Semestre;

            
            if (count($Materia_Semestre)==2){
                //return $Materia_Semestre[0]->Semestre;
                $alum=Alumno::where('Semestre',$Materia_Semestre[0]->Semestre)->get();
                $Lista=array();

                foreach ($alum as $alumno) {
                    //print $alumno->id;
                    $Alum=Grupo::where('id',$alumno->id)->get('Grupo');
                    //return $Alum;
                    //return $Alum[0]->Grupo.$grupo;
                    if ($Alum[0]->Grupo==$grupo){
                        $Dat=array();
                        //print $grupo;
                        array_push($Dat,$alumno->id,$alumno->Nombre_A);
                        array_push($Lista,$Dat);
                        //print_r($Lista);
                    }
                }
                //return $grupo;
                view('DocenteInterfazPrincipal.InterfazPrincipal',compact('usua'));
                return view('ListasDocentes.create',compact('Lista','grupo','nombreM','usua'));
            }
            else{
                $alum=Alumno::where('Semestre',$Materia_Semestre[0]->Semestre)->get();
                $Lista=array();
                foreach ($alum as $alumno) {
                    //return $alumno->id;
                    $Alum=Grupo::where('id',$alumno->id)->get('Grupo');
                    if ($Alum[0]->Grupo==$grupo){
                        $Dat=array();
                        //print $grupo;
                        array_push($Dat,$alumno->id,$alumno->Nombre_A);
                        array_push($Lista,$Dat);
                        //print_r($Lista);
                    }
                }
                //return $grupo;
                view('DocenteInterfazPrincipal.InterfazPrincipal',compact('usua'));
                return view('ListasDocentes.create',compact('Lista','grupo','nombreM','usua'));
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usu=$id;
        $usua=$id;
        $Nom_Do=Docentes::where('id',$usu)->get('Nombre');
        $Ma=RelacionDocenteMateriaGrupo::where('Docente',$Nom_Do[0]->Nombre)->get();
        $M=RelacionDocenteMateriaGrupo::where('Docente',$Nom_Do[0]->Nombre)->get('Materia');
        $G=RelacionDocenteMateriaGrupo::where('Docente',$Nom_Do[0]->Nombre)->get('Grupo');
        //return $M.$G;
        if (count($Ma)==0){
            view('DocenteInterfazPrincipal.InterfazPrincipal',compact('usua'));
            return back()->with('MsjERR','No tiene materias cargadas',compact('id'));
        }
        else{
            $OpcionesNombres='';
            $OpcionesGrupos='';
            $Nombres=array();
            $Grupos=array();
            for ($i=0; $i < count($M); $i++) { 
                $DM=$M[$i]->Materia;
                $DG=$G[$i]->Grupo;
                if ($DG=='A' or $DG=='B'){
                    $OpcionesNombres=$OpcionesNombres.'<option value="'.$DM.' '.$DG.'">'.$DM.' '.$DG.'</option>';
                }
                else{
                    $OpcionesNombres=$OpcionesNombres.'<option value="'.$DM.' '.$DG.'">'.$DM.' - '.$DG.'</option>';
                }
                array_push($Nombres,$DM);
                array_push($Grupos,$DG);
            }
            view('DocenteInterfazPrincipal.InterfazPrincipal',compact('usua'));
            return view('ListasDocentes.show',compact('id','OpcionesNombres','Nombres','Grupos','usua'));
        }
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
    }
}
