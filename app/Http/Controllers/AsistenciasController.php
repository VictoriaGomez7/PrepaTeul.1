<?php

namespace App\Http\Controllers;

use App\RelacionDocenteMateriaGrupo;
use App\Materia;
use App\Materia_Grupo;
use App\Alumno;
use App\Grupo;
use App\Asistencia;
Use Session;
Use Redirect;
Use Alert;
use Illuminate\Http\Request;


class AsistenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('Asistencias.provicional');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $asistencia=new Asistencia();
      $asistencia->id=$request['id'];
      $asistencia->Asistencias=$request['Asist'];
      $asistencia->Retardos=$request['Ret'];
      $asistencia->Faltas=$request['Falt'];
      $asistencia->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $CDocente = RelacionDocenteMateriaGrupo::where('docente', $request->nombre)->get();
            if (count($CDocente)==0)
            {

                return back()->with('msj',' El docente no existe' );
        }
        else{
            //return $CDocente[0]->Materia;
            $CMateria = Materia::get();
            //return $CMateria;
            $new=[$CDocente,$CMateria];
            //return $CMateria;
            return view('Asistencias.create',compact('CDocente','CMateria'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $separar = explode("_", $id);
      $Clavemat=$separar[0];
      $Grupo=$separar[1];
      $Claves = Grupo::where('Grupo', $Grupo)->get();
      $Materia= Materia::where('Clave',$Clavemat)->get();
      $Alumnos= Alumno::get();
      $bandera=0;
      $arrayalumnos = array();
      for ($i=0; $i <count($Claves) ; $i++) {
        for ($j=0; $j <count($Alumnos) ; $j++) {
          if ($Claves[$i]['id']==$Alumnos[$j]['id'] && $Materia[0]['Semestre']==$Alumnos[$j]['Semestre']) {
            array_push($arrayalumnos, $Alumnos[$j]);
          }
        }
      }
        //return($arrayalumnos[0]);
      return view('Asistencias.show',compact('arrayalumnos'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $Alumno= Alumno::where('id',$id)->get();
        return view('Asistencias.form',compact('Alumno'));
        //return $Alumno;
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
