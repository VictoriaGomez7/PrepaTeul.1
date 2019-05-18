<?php

namespace App\Http\Controllers;


use App\Alumno;
use App\Reinscripcion;
Use Session;
Use Redirect;
Use Alert;
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
    public function store()
    {
        //
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
            $Semes= Alumno::where('id', $alumno1->PMatri)->get();
            //return $Semes->;
            foreach ($Semes as $row ) {
                //return $CALumno;
                $Semes=$row;
                if($Semes->Semestre=='PRIMER SEMESTRE'){
                    $opciones2='<option value="PRIMER" selected="true">SEGUNDO SEMESTRE</option>';
                }else if($Semes->Semestre=='SEGUNDO SEMESTRE'){
                    $opciones2='
                            <option value="SEGUNDO" selected="true">TERCER SEMESTRE</option>';
                }else if($Semes->Semestre=='TERCER SEMESTRE'){
                    $opciones2='
                            <option value="SEGUNDO" selected="true">CUARTO SEMESTRE</option>';
                }else if($Semes->Semestre=='CUARTO SEMESTRE'){
                    $opciones2='
                            <option value="TERCER" selected="true">QUINTO SEMESTRE</option>';
                }else if($Semes->Semestre=='QUINTO SEMESTRE'){
                    $opciones2='
                            <option value="TERCER" selected="true">SEXTO SEMESTRE</option>';
                }else if($Semes->Semestre=='SEXTO SEMESTRE'){
                    $opciones2='
                            <option value="TERCER" selected="true">SEXTO SEMESTRE</option>';
                    }
            }

        return view('Reinscripciones.show',compact('CAlumno','alumno1','opciones2'));
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

        $ides=$alumno1['id'];
        $CAlumno = Alumno::where('id', $alumno1->id)->get();
        //return $CAlumno.' '.$alumno1->id;
        foreach ($CAlumno as $row ) {
                # code...
                $row->fill($alumno1->all());

                    $row->save();
            }

        //return $CAlumno;
        //return redirect()->view('Reinscripcion.show');
        //return back()->with('re',' correctamente' );
        //return back()->with('msj',' esa matricula no existe' );
        //return view('Reinscripciones.create');
        return redirect('reinscripcion')->with('msjCorrecto','Alumno re-inscrito con éxito.');
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
