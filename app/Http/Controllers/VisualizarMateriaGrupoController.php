<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docentes;
use App\RelacionDocenteMateriaGrupo;
use App\Alumno;
use App\Grupo;
use App\Materia_Grupo;

class VisualizarMateriaGrupoController extends Controller
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
        $visibility=2;
        //return $MateriasDelDocente;
        if (count($MateriasDelDocente)==0){
            return back()->with('MsjERR','No tiene materias asignadas');
        }
        else{
            view('DocenteInterfazPrincipal.InterfazPrincipal',compact('usua'));
            return view('VisualizarMaGru.VisualizarMateGrupo',compact('MateriasDelDocente','visibility','id','usua'));
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

        //return $AlumnosEnMismoSemestre;
        view('DocenteInterfazPrincipal.InterfazPrincipal',compact('usua'));
        return view('VisualizarMaGru.VisualizarMateGrupo',compact('MateriasDelDocente','AlumnosEnMismoSemestre','visibility','id','usua','Materiasele'));
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
