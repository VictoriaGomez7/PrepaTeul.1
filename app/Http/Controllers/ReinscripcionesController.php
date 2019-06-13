<?php

namespace App\Http\Controllers;
use App\Alumno;
use App\Reinscripcion;
Use Session;
Use Redirect;
Use Alert;
use App\ft_bach;
use App\Http\Requests\TagStoreRequestFTyBACH;
use Illuminate\Http\Request;

class ReinscripcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Reinscripciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequestFTyBACH $request2)
    {

        $campo=new ft_bach();

        $campo->id=$request['id'];
        $campo->Formación_Trabajo=$request2['ft1'];
        $campo->Bachillerato=$request2['bach1'];
        $campo->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $alumno1)//show($id)
    {
        //return $alumno1;
        $CAlumno = Alumno::where('id', $alumno1->PMatri)->get();
        //return $CAlumno;

        if (count($CAlumno)==0)
        {

            return back()->with('msj',' La matrícula no existe' );
        }
        else{
            if ($CAlumno[0]->Semestre=="SEXTO SEMESTRE") {
                return back()->with('msj','No se puede reinscribir un alumno de Sexto Semestre' );
            } else {
            $Semes= Alumno::where('id', $alumno1->PMatri)->get();
            $FtOBache=ft_bach::where('id', $alumno1->PMatri)->get();
            //return $FtOBache;
            $bandera=0;
            //return $Semes->;
            foreach ($Semes as $row ) {
                //return $CALumno;
                $Semes=$row;
                if($Semes->Semestre=='PRIMER SEMESTRE'){
                    $opciones2='<option value="PRIMER" selected="true">SEGUNDO SEMESTRE</option>';
                }else if($Semes->Semestre=='SEGUNDO SEMESTRE'){
                     $bandera=1;
                    $opciones2='
                            <option value="SEGUNDO" selected="true">TERCER SEMESTRE</option>';
                }else if($Semes->Semestre=='TERCER SEMESTRE'){
                   $bandera=11;
                    $opciones2='
                            <option value="SEGUNDO" selected="true">CUARTO SEMESTRE</option>';
                }else if($Semes->Semestre=='CUARTO SEMESTRE'){
                     $bandera=2;
                    $opciones2='
                            <option value="TERCER" selected="true">QUINTO SEMESTRE</option>';
                }else if($Semes->Semestre=='QUINTO SEMESTRE'){
                   $bandera=22;
                    $opciones2='
                            <option value="TERCER" selected="true">SEXTO SEMESTRE</option>';
                }else if($Semes->Semestre=='SEXTO SEMESTRE'){

                    $opciones2='
                            <option value="TERCER" selected="true">SEXTO SEMESTRE</option>';
                    }
            }

        return view('Reinscripciones.show',compact('CAlumno','alumno1','opciones2','bandera','FtOBache'));
        }
    }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $alumno1)
    {
        $Semestres=['PRIMER SEMESTRE','SEGUNDO SEMESTRE','TERCER SEMESTRE','CUARTO SEMESTRE','QUINTO SEMESTRE','SEXTO SEMESTRE'];
        $Grados=['PRIMER','SEGUNDO','TERCER'];
        $ides=$alumno1['id'];

        $CAlumno = Alumno::where('id', $alumno1->id)->get();
        $CAlumno2 = ft_bach::where('id', $alumno1->id)->get();
        //return $CAlumno[0]->Semestre;
        $SemestreAntiguo=$CAlumno[0]->Semestre;
        //return $alumno1;

        //return count($Semestres);
        for ($i=0; $i < count($Semestres) ; $i++) {
            //print $SemestreAntiguo;
            //print "= ";
            //print $Semestres[$i];
            if ($SemestreAntiguo!="SEXTO SEMESTRE") {
                if ($SemestreAntiguo==$Semestres[$i] ) {
                //print "Si Son iguales";
                $CAlumno[0]->Semestre=$Semestres[$i+1];
                $Grado=($i+1)/2;
                //return $Grados[$Grado];
                $CAlumno[0]->Grado=$Grados[$Grado];
                }
            }

        }
        //return $CAlumno;
        //return $CAlumno;
        ft_bach::where('id', $alumno1->id)->update(['Formación_Trabajo'=>$alumno1->ft2]);
        ft_bach::where('id', $alumno1->id)->update(['Bachillerato'=>$alumno1->bach1]);
        //return $CAlumno.' '.$alumno1->id;
        foreach ($CAlumno as $row) {

                $row->fill($CAlumno->all());

                $row->save();
            }

        //return $CAlumno;
        //return redirect()->view('Reinscripcion.show');
        //return back()->with('re',' correctamente' );
        //return back()->with('msj',' esa matricula no existe' );
        return view('Reinscripciones.create');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $
     * @return \Illuminate\Http\Response
     */
    public function update(Request $alumno,Reinscripciones $basedatos)
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
