<?php

namespace App\Http\Controllers;

use App\RelacionDocenteMateriaGrupo;
use App\Materia;
use App\Docente;
use App\Periodo;
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

        //return view('Asistencias.provicional');

        $request=$_GET['valor'];
        $usua=$_GET['valor'];
        $otro_id=$request;
        $doc=Docente::where('id',$request)->get();
        $CDocente = RelacionDocenteMateriaGrupo::where('docente', $doc[0]->Nombre)->get();
            
            //return $CDocente[0]->Materia;
            $CMateria = Materia::get();
            //return $CMateria;
            $new=[$CDocente,$CMateria];
            //return $CMateria;
            return view('Asistencias.create',compact('CDocente','CMateria','usua'));
        

        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
<<<<<<< HEAD
      $id=$request['id'];
      $usua=$request['usua'];
      $Asistencias=$request['Asist'];
      $Retardos=$request['Ret'];
      $Faltas=$request['Falt'];
      $periodo=$request['periodo'];
      for ($i=0; $i <count($id); $i++) {
        $asistencia=new Asistencia();
        $asistencia->id=$id[$i];
        $asistencia->Asistencias=$Asistencias[$i];
        $asistencia->Retardos=$Retardos[$i];
        $asistencia->Faltas=$Faltas[$i];
        $asistencia->Periodo=$periodo;
        $asistencia->save();
      }
      $doc=Docente::where('id',$usua)->get();
        $CDocente = RelacionDocenteMateriaGrupo::where('docente', $doc[0]->Nombre)->get();
            
            //return $CDocente[0]->Materia;
            $CMateria = Materia::get();
            //return $CMateria;
            $new=[$CDocente,$CMateria];
      return view('Asistencias.create',compact('CDocente','CMateria','usua'));
=======
      $asistencia=new Asistencia();
      $asistencia->id=$request['id'];
      $asistencia->Asistencias=$request['Asist'];
      $asistencia->Retardos=$request['Ret'];
      $asistencia->Faltas=$request['Falt'];
      $asistencia->save();
      return view('Asistencias.show');
>>>>>>> da9eca21d3239f67ad3405eb3c5aaa42455bb574
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
      $usua=$separar[2];
      $Claves = Grupo::where('Grupo', $Grupo)->get();
      $Materia= Materia::where('Clave',$Clavemat)->get();
      $Alumnos= Alumno::get();
      $bandera=0;
      $fecha=date("Y-m-d");
      $per=Periodo::get();
      $estep=0;
      foreach ($per as $pe) {
          if ($pe->fecha1<= $fecha && $pe->fecha2>=$fecha  && $pe->id!=1 && $pe->fecha1  != null && $pe->fecha2!=null) {
               $estep= $pe->id-1;
           }
           if ($pe->fecha1 <= $fecha && $pe->fecha2<=$fecha && $pe->id==3  && $pe->fecha1 != null && $pe->fecha2!=null) {
               $estep= $pe->id;
           }
           if ($pe->fecha1<= $fecha && $pe->fecha2>=$fecha && $pe->id==1 && $pe->fecha1 != null && $pe->fecha2!=null) {
               $estep= $pe->id;
           }
           if ($pe->fecha1<= $fecha && $pe->fecha2>=$fecha  && $pe->id==1 && $pe->fecha1  != null && $pe->fecha2!=null) {
               return back()->with('msj',' Favor de asignar asistencias hasta culminar el primer periodo' );
           }

      }
      
      
      
      $arrayalumnos = array();
      for ($i=0; $i <count($Claves) ; $i++) {
        for ($j=0; $j <count($Alumnos) ; $j++) {
          if ($Claves[$i]['id']==$Alumnos[$j]['id'] && $Materia[0]['Semestre']==$Alumnos[$j]['Semestre']) {
            array_push($arrayalumnos, $Alumnos[$j]);
          }
        }
      }
        //return($arrayalumnos[0]);
      return view('Asistencias.show',compact('arrayalumnos','usua','estep'));
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
