<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TagStoreCalificacionesParciales;
use App\Docentes;
use App\RelacionDocenteMateriaGrupo;
use App\Alumno;
use App\Grupo;
use App\Materia;
use App\Materia_Grupo;
use App\CalificacionesParciales;
class ConsultarCalificacionesCEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Calificaciones.ConsultaCE');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //return "ya we";
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
    public function show(Request $request)
    {
        //return "hola";
        $AL = CalificacionesParciales::where('ClaveA', $request->id)->get();
        $nombreA=Alumno::where('id', $request->id)->get('Nombre_A');
        $Materia=CalificacionesParciales::where('ClaveA', $request->id)->get('ClaveM');
        $Materia1=array();
        $mat=Materia::all('Clave','Nombre');
        //return $mat;
        foreach ($mat as $ma) {
            foreach ($Materia as $M) {
                if($ma->Clave==$M->ClaveM)
                {
                    array_push($Materia1,$ma->Nombre);
                }
            }
        }
            
                
            
          //  print $Materia[$i][0];
            //array_push($Materia1,Materia::where('Clave',$Materia[$i][0])->get());
        
        //return $Materia1;

        if (count($AL)==0)
        {

            return back()->with('msj',' Esa matricula no existe');
        }
        else{
            
            view('Calificaciones.TablaC1',compact('AL','nombreA','Materia1'));
            return view('Calificaciones.TablaC1',compact('AL','nombreA','Materia1'));
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
