<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CalificacionesParciales;
use App\Docentes;
use App\RelacionDocenteMateriaGrupo;
use App\Alumno;
use App\Grupo;
use App\Materia_Grupo;
use App\Periodo;

class CalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$idtemporal=1800110001;
        $id=$_GET['valor'];
        $usua=$id;
        //return $id;
        $NombreDoc=Docentes::where('id',$id)->get();
        $MateriasDelDocente=RelacionDocenteMateriaGrupo::where('Docente',$NombreDoc[0]->Nombre)->get();
        $Periodo1ini=Periodo::where('id','1')->get('fecha1');
        $Periodo1fin=Periodo::where('id','1')->get('fecha2');
        $Periodo2ini=Periodo::where('id','2')->get('fecha1');
        $Periodo2fin=Periodo::where('id','2')->get('fecha2');
        $visibility=2;
        //return $Periodo1ini[0]->fecha1.$Periodo1fin[0]->fecha2.$Periodo2ini[0]->fecha1.$Periodo2fin[0]->fecha2;
        //return count($Periodo1ini).count($Periodo1fin).count($Periodo2ini).count($Periodo2fin);
        
        if (count($MateriasDelDocente)==0){
            return redirect('/DocenteInicios?valor='.$usua)->with('MsjERR','No tiene materias asignadas');
        }
        elseif ($Periodo1ini[0]->fecha1=='' or $Periodo1fin[0]->fecha2=='' or $Periodo2ini[0]->fecha1=='' or $Periodo2fin[0]->fecha2==''){
            return redirect('/DocenteInicios?valor='.$usua)->with('MsjERR','Los períodos no han sido asignados');
        }
        else{
            view('DocenteInterfazPrincipal.InterfazPrincipal',compact('usua'));
            return view('Calificaciones.VisualizarCalif',compact('MateriasDelDocente','visibility','id','usua'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "MEMD";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->ClaveMateriaSelec;
        

        $PeriodoActivo=0;
        $Periodo1ini=Periodo::where('id','1')->get('fecha1');
        $Periodo1fin=Periodo::where('id','1')->get('fecha2');
        $dia=date('o-m-d');
        $Periodo2ini=Periodo::where('id','2')->get('fecha1');
        $Periodo2fin=Periodo::where('id','2')->get('fecha2');
        $dia=date('o-m-d');
        $year_DATE=date('o');
        //return $year_DATE;
        //return $dia." ".$Periodo1ini[0]->fecha1;
        //return count($Periodo1ini);

        if (($Periodo1ini[0]->fecha1<=$dia) && ($Periodo1fin[0]->fecha2>=$dia)){
        $PeriodoActivo=1;
    
        } else if (($Periodo2ini[0]->fecha1<=$dia) && ($Periodo2fin[0]->fecha2>=$dia)){
            $PeriodoActivo=2;
        }

        $Materiasele=$request->MateriaSeleccionada;
        //return $Materiasele;
        $id=$request->idDocente;
        $usua=$id;

        $NombreDoc=Docentes::where('id',$id)->get();
        $MateriasDelDocente=RelacionDocenteMateriaGrupo::where('Docente',$NombreDoc[0]->Nombre)->get();


        $AlumnoEnGrupo=Grupo::where('Grupo',$request->Grupo)->get();
        $AlumnoEnGRupoSemestre=Materia_Grupo::where('Grupo',$request->Grupo)->get();
        $SemestreMateria=Materia_Grupo::where('Clave',$request->ClaveMateriaSelec)->where('Grupo',$request->Grupo)->get();
        //return $SemestreMateria[0]->Semestre;
        $AlumnosEnMismoSemestre=array();
        //return $AlumnoEnGrupo;

        for ($i=0; $i < count($AlumnoEnGrupo); $i++) {
            $SemestreAlumno=Alumno::where('id',$AlumnoEnGrupo[$i]->id)->get('Semestre');
            //print $SemestreAlumno[0]->Semestre;

            //return $SemestreAlumno;
            //return $SemestreMateria->Semestre;
            if (($SemestreAlumno[0]->Semestre)==($SemestreMateria[0]->Semestre)) {
                $AlumnoParaTabla=Alumno::where('id',$AlumnoEnGrupo[$i]->id)->get();
                //print $AlumnoEnGrupo[$i]->id;
                //print $AlumnoParaTabla;
                array_push($AlumnosEnMismoSemestre,$AlumnoParaTabla );

            }
        }
        if (count($AlumnosEnMismoSemestre)==0) {
             $visibility=0;
        } else {
             $visibility=1;
        }

        //return count($AlumnosEnMismoSemestre);
        $DatosCalificaciones=CalificacionesParciales::get('ClaveM',$request->ClaveMateriaSelec);
        //return 'Hi1'.$DatosCalificaciones.count($DatosCalificaciones);
        //return $ClaveMateriaSelec;
        
        if (count($DatosCalificaciones)=='0'){
            //return 'Logo entrar';
            for ($i=0; $i < count($AlumnosEnMismoSemestre); $i++)
            {
                $Calif=new CalificacionesParciales();
                $Calif->ClaveA=$AlumnosEnMismoSemestre[$i][0]->id;
                $Calif->ClaveM=$request->ClaveMateriaSelec;
                $Calif->Parcial1=0;
                $Calif->Parcial2=0;
                $Calif->Semestre=$AlumnosEnMismoSemestre[$i][0]->Semestre;
                $Calif->Año=$year_DATE;
                $Calif->save();
            }
        }
        else
        {

            $Calif_Extraidas=CalificacionesParciales::where('ClaveM',$request->ClaveMateriaSelec)->get();
            if (count($AlumnosEnMismoSemestre)!=count($Calif_Extraidas)){

                for ($i=0; $i < count($AlumnosEnMismoSemestre); $i++)
                {
                    $Alumno1=$AlumnosEnMismoSemestre[$i][0]->id;
                    $cont=0;
                    for ($j=0; $j < count($Calif_Extraidas); $j++)
                    {
                        $Alumno2=$Calif_Extraidas[$j]->ClaveA;
                        if ($Alumno1==$Alumno2){
                            $cont=$cont+1;
                        }
                    }
                    if ($cont==0){
                        $Calif=new CalificacionesParciales();
                        $Calif->ClaveA=$AlumnosEnMismoSemestre[$i][0]->id;
                        $Calif->ClaveM=$request->ClaveMateriaSelec;
                        $Calif->Parcial1=0;
                        $Calif->Parcial2=0;
                        $Calif->Semestre=$AlumnosEnMismoSemestre[$i][0]->Semestre;
                        $Calif->Año=$year_DATE;
                        $Calif->save();

                        $cont=0;
                    }
                }
            }
        }
        $Calif_Extraidas=CalificacionesParciales::where('ClaveM',$request->ClaveMateriaSelec)->get();
        //return count($AlumnosEnMismoSemestre).count($Calif_Extraidas);
        //return $Calif_Extraidas;
        //User::destroy($id);

        view('DocenteInterfazPrincipal.InterfazPrincipal',compact('usua'));
        return view('Calificaciones.VisualizarCalif',compact('MateriasDelDocente','AlumnosEnMismoSemestre','visibility','id','usua','Materiasele','PeriodoActivo','Calif_Extraidas'));

        
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $id)
    {
        //return $id->Usua;
        //return count($id->get('Calif1'));//->['Parcial1'];
        //return $id.'';

        $year_date=date('o');
        $Cant_Calif=count($id->get('Calif1'));
        $Calificaciones_1=$id->get('Calif1');
        $Calificaciones_2=$id->get('Calif2');
        $Claves_Alumnos=$id->get('ClaveA');
        $usua=$id->Usua;

        for ($i=0; $i < $Cant_Calif; $i++)
            {
                //$Calif=new CalificacionesParciales();
                //$Calif->ClaveA=$Claves_Alumnos[$i];
                //$Calif->ClaveM=$id->ClaveM;
                //$Calif->Parcial1=$Calificaciones_1[$i];
                //$Calif->Parcial2=$Calificaciones_2[$i];
                //$Calif->Semestre=$id->Semestre;
                //$Calif->Año=$year_date;
                //$Calif->save();
                CalificacionesParciales::where('ClaveM',$id->ClaveM)->where('ClaveA',$Claves_Alumnos[$i])->update(['Parcial1'=>$Calificaciones_1[$i]]);
                CalificacionesParciales::where('ClaveM',$id->ClaveM)->where('ClaveA',$Claves_Alumnos[$i])->update(['Parcial2'=>$Calificaciones_2[$i]]);
                
            }

        return redirect('/DocenteInicios?valor='.$usua)->with('MsjC','Calificaciones guardadas con éxito');
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
