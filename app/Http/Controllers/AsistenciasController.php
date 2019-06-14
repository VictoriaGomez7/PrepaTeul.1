<?php

namespace App\Http\Controllers;

use App\RelacionDocenteMateriaGrupo;
use App\Materia;
use App\ft_bach;
use App\Materia_Grupo;
use App\Docente;
use App\Periodo;
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
            $Mat_grup = Materia_Grupo::get();
            //return $CMateria;
            $new=[$CDocente,$CMateria];
            //return $CMateria;
            return view('Asistencias.create',compact('CDocente','CMateria','Mat_grup','usua'));




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

      $id=$request['id'];
      $usua=$request['usua'];
      $Asistencias=$request['Asist'];
      $Retardos=$request['Ret'];
      $Faltas=$request['Falt'];
      $periodo=$request['periodo'];
      $Mat=$request['clavem'];
      $registros=Asistencia::get();
      $actual=Periodo::where('id',$periodo)->get();

      $total=($Asistencias[0])+($Faltas[0]);

      $band=0;
      for ($i=0; $i <count($registros) ; $i++) {
        for ($j=0; $j <count($id) ; $j++) {
          if (($registros[$i]->Materia==$Mat)&&($registros[$i]->Periodo==$periodo)&&($registros[$i]->id)==$id[$j]) {
            $band=1;
          }
        }

      }
      //dd($band);
      if ($total==$actual[0]->dias) {

      switch ($band) {
        case '0':

           for ($i=0; $i <count($id); $i++) {
          $asistencia=new Asistencia();
          $asistencia->id=$id[$i];
          $asistencia->Asistencias=$Asistencias[$i];
          $asistencia->Retardos=$Retardos[$i];
          $asistencia->Faltas=$Faltas[$i];
          $asistencia->Periodo=$periodo;
          $asistencia->Materia=$Mat;
          $asistencia->save();

          $doc=Docente::where('id',$usua)->get();
        $CDocente = RelacionDocenteMateriaGrupo::where('docente', $doc[0]->Nombre)->get();

            //return $CDocente[0]->Materia;
            $CMateria = Materia::get();
            //return $CMateria;
            $new=[$CDocente,$CMateria];
            return back()->with('msj1', 'Datos Guardados Correctamente');
        }
          break;

        default:
       $doc=Docente::where('id',$usua)->get();
        $CDocente = RelacionDocenteMateriaGrupo::where('docente', $doc[0]->Nombre)->get();

            //return $CDocente[0]->Materia;
            $CMateria = Materia::get();
            //return $CMateria;
            $new=[$CDocente,$CMateria];
            return back()->with('msj', ' Ya registraste la asistencia de esta materia en el periodo disponible ');

          break;
      }
     }
     else{

      return back()->with('msj',' La cantidad de días habiles en el periodo no concuerdan con el total de asistencias' );
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
      $id= $request['id'];
      $separar = explode("_", $id);
      $Clavemat=$separar[0];
      $Grupo=$separar[1];
      $usua=$separar[2];

      if ($Grupo == 'A' || $Grupo =='B') {
        $Claves = Grupo::where('Grupo', $Grupo)->get();
        $Materia= Materia::where('Clave',$Clavemat)->get();
      $Alumnos= Alumno::get();
      $asis=Asistencia::where('Materia',$Clavemat)->get();
      $periodo=Periodo::get();
      $bandera=True;
      foreach ($Alumnos as $alum) {
        foreach ($Claves as $grup) {
          foreach ($asis as $asist) {
            if ($alum->id==$grup->id && $grup->id==$asist->id) {
              $bandera=False;
            }
          }
        }
      }

      if ($bandera==True) {
        return back()->with('msj',' No se han capturado asistencias');
      }

      $arrayalumnos = array();
      for ($i=0; $i <count($Claves) ; $i++) {
        for ($j=0; $j <count($Alumnos) ; $j++) {
          if ($Claves[$i]['id']==$Alumnos[$j]['id'] && $Materia[0]['Semestre']==$Alumnos[$j]['Semestre']) {
            array_push($arrayalumnos, $Alumnos[$j]);
          }
        }
      }
      return view('Asistencias.Reporte',compact('arrayalumnos','usua','Materia','asis','Grupo'));
      }
      
      
      else{
        $Claves = ft_bach::where('Bachillerato', $Grupo)->get();
        if (($Claves==[]) == True) {
          $Claves = ft_bach::where('Formación_Trabajo', $Grupo)->get();
          $Materia= Materia::where('Clave',$Clavemat)->get();
      $Alumnos= Alumno::get();
      $asis=Asistencia::where('Materia',$Clavemat)->get();
      $periodo=Periodo::get();
      $bandera=True;
      foreach ($Alumnos as $alum) {
        foreach ($Claves as $grup) {
          foreach ($asis as $asist) {
            if ($alum->id==$grup->id && $grup->id==$asist->id) {
              $bandera=False;
            }
          }
        }
      }

      if ($bandera==True) {
        return back()->with('msj',' No se han capturado asistencias');
      }

      $arrayalumnos = array();
      for ($i=0; $i <count($Claves) ; $i++) {
        for ($j=0; $j <count($Alumnos) ; $j++) {
          if ($Claves[$i]['id']==$Alumnos[$j]['id'] && $Materia[0]['Semestre']==$Alumnos[$j]['Semestre']) {
            array_push($arrayalumnos, $Alumnos[$j]);
          }
        }
      }
      return view('Asistencias.Reporte',compact('arrayalumnos','usua','Materia','asis','Grupo'));
        }
        else{
          
        
        $Materia= Materia::where('Clave',$Clavemat)->get();
      $Alumnos= Alumno::get();
      $asis=Asistencia::where('Materia',$Clavemat)->get();
      $periodo=Periodo::get();
      $bandera=True;
      foreach ($Alumnos as $alum) {
        foreach ($Claves as $grup) {
          foreach ($asis as $asist) {
            if ($alum->id==$grup->id && $grup->id==$asist->id) {
              $bandera=False;
            }
          }
        }
      }

      if ($bandera==True) {
        return back()->with('msj',' No se han capturado asistencias');
      }

      $arrayalumnos = array();
      for ($i=0; $i <count($Claves) ; $i++) {
        for ($j=0; $j <count($Alumnos) ; $j++) {
          if ($Claves[$i]['id']==$Alumnos[$j]['id'] && $Materia[0]['Semestre']==$Alumnos[$j]['Semestre']) {
            array_push($arrayalumnos, $Alumnos[$j]);
          }
        }
      }
      return view('Asistencias.Reporte',compact('arrayalumnos','usua','Materia','asis','Grupo'));
    }
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
      $usua=$separar[2];
      $Claves = Grupo::where('Grupo', $Grupo)->get();
      $Materia= Materia::where('Clave',$Clavemat)->get();
      $Alumnos= Alumno::get();
      $bandera=0;
      $fecha=date("Y-m-d");
      $per=Periodo::get();
      $estep=0;
      foreach ($per as $pe) {
        if ($pe->fecha1==null || $pe->fecha2==null) {
          return back()->with('msj',' Favor de solicitar a Control Escolar asignar periodos' );
        }
      }
      foreach ($per as $pe) {
          if ($pe->fecha1<= $fecha && $pe->fecha2>=$fecha  && $pe->id!=1 && $pe->fecha1  != null && $pe->fecha2!=null) {
              $num=$pe->id-1;
              $d=$per[$num-1]->dias;
               $estep= [$num,$d];
           }
           if ($pe->fecha1 <= $fecha && $pe->fecha2<=$fecha && $pe->id==3  && $pe->fecha1 != null && $pe->fecha2!=null) {
               $estep= [$pe->id,$pe->dias];
           }
           if ($pe->fecha1<= $fecha && $pe->fecha2>=$fecha && $pe->id==1 && $pe->fecha1 != null && $pe->fecha2!=null) {
               $estep= [$pe->id,$pe->dias];
           }
           if ($pe->fecha1<= $fecha && $pe->fecha2>=$fecha  && $pe->id==1 && $pe->fecha1  != null && $pe->fecha2!=null) {
               return back()->with('msj',' Favor de asignar asistencias hasta culminar el primer periodo' );
           }

      }
      if ($Grupo == 'A' || $Grupo =='B') {
        $Claves = Grupo::where('Grupo', $Grupo)->get();
        $Materia= Materia::where('Clave',$Clavemat)->get();
      $Alumnos= Alumno::get();
      $asis=Asistencia::where('Materia',$Clavemat)->get();
      $periodo=Periodo::get();

      $arrayalumnos = array();
      for ($i=0; $i <count($Claves) ; $i++) {
        for ($j=0; $j <count($Alumnos) ; $j++) {
          if ($Claves[$i]['id']==$Alumnos[$j]['id'] && $Materia[0]['Semestre']==$Alumnos[$j]['Semestre']) {
            array_push($arrayalumnos, $Alumnos[$j]);
          }
        }
      }
      return view('Asistencias.show',compact('arrayalumnos','usua','estep','Materia'));
      }
      
      
      else{
        $Claves = ft_bach::where('Bachillerato', $Grupo)->get();

        if (($Claves==[]) == True) {
          $Claves = ft_bach::where('Formación_Trabajo', $Grupo)->get();
          $Materia= Materia::where('Clave',$Clavemat)->get();
      $Alumnos= Alumno::get();
      $asis=Asistencia::where('Materia',$Clavemat)->get();
      $periodo=Periodo::get();

      $arrayalumnos = array();
      for ($i=0; $i <count($Claves) ; $i++) {
        for ($j=0; $j <count($Alumnos) ; $j++) {
          if ($Claves[$i]['id']==$Alumnos[$j]['id'] && $Materia[0]['Semestre']==$Alumnos[$j]['Semestre']) {
            array_push($arrayalumnos, $Alumnos[$j]);
          }
        }
      }
      return view('Asistencias.show',compact('arrayalumnos','usua','estep','Materia'));
        }
        else{
          
        
        $Materia= Materia::where('Clave',$Clavemat)->get();
      $Alumnos= Alumno::get();
      $asis=Asistencia::where('Materia',$Clavemat)->get();
      $periodo=Periodo::get();

      $arrayalumnos = array();
      for ($i=0; $i <count($Claves) ; $i++) {
        for ($j=0; $j <count($Alumnos) ; $j++) {
          if ($Claves[$i]['id']==$Alumnos[$j]['id'] && $Materia[0]['Semestre']==$Alumnos[$j]['Semestre']) {
            array_push($arrayalumnos, $Alumnos[$j]);
          }
        }
      }
      return view('Asistencias.show',compact('arrayalumnos','usua','estep','Materia'));
    }
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
