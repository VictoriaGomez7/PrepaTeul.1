<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Alumno;
use App\Grupo;
use App\GrupoTemporal;
use App\ft_bach;
use Illuminate\Support\Facades\DB;


use PDF;
use Session;
class ImprimelistasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('Listas.listar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return "Hola LoginA";
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
    public function show(Request $r )
    {
        $semestre=$r->semestre;
        
        $titulo='';
            if(($r->grupos =='formacion' && $r->semestre =='PRIMER SEMESTRE') || ($r->grupos =='formacion' && $r->semestre =='SEGUNDO SEMESTRE')){
                return back();
            }else if($r->grupos =='formacion'){
                return view('Listas.formacion',compact('semestre'));

            }else if($r->grupos =='bachillerato'){
                return view('Listas.bachillerato',compact('semestre'));


            }else if ($r->Grupo=="A"){

                 $listaA=DB::select("SELECT DISTINCT alumnos.id,alumnos.Nombre_A
            from alumnos    WHERE  (EXISTS (SELECT 1 from grupos
        WHERE grupos.id=alumnos.id and grupos.Grupo='A'))
                          AND alumnos.Semestre= :sem" ,['sem'=>$semestre]);
                 $titulo=$semestre . " Grupo A";
            }else{


                 $listaA=DB::select("SELECT DISTINCT alumnos.id,alumnos.Nombre_A
            from alumnos    WHERE  (EXISTS (SELECT 1 from grupos
        WHERE grupos.id=alumnos.id and grupos.Grupo='B'))
                          AND alumnos.Semestre= :sem" ,['sem'=>$semestre]);
                 $titulo=$semestre . " Grupo B";
            }
             $pdf= PDF::loadView('Listas.muestraGrupos',compact('listaA','semestre','titulo'));
             return $pdf->stream();

    return view('Listas.muestraGrupos',compact('listaA','semestre','titulo'));
           
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   
    public function edit(Request $r,$semestre)
    {
        //
        $formacion=$r->formacionT;
        $listaA=DB::select("SELECT DISTINCT alumnos.id,alumnos.Nombre_A
            from alumnos    WHERE  (EXISTS (SELECT 1 from ft_baches
        WHERE ft_baches.id=alumnos.id and ft_baches.Formación_Trabajo= :formacion ))
                          AND alumnos.Semestre= :sem" ,['sem'=>$semestre   , 'formacion'=>$formacion]);
       $pdf= PDF::loadView('Listas.muestraGrupos',compact('listaA','semestre','titulo'));
       $titulo=$semestre . " ".$r->formacionT;
       return $pdf->stream();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r,$semestre)
    {
    

       $bachillerato=$r->bachilleratoT;
        $listaA=DB::select("SELECT DISTINCT alumnos.id,alumnos.Nombre_A
           from alumnos    WHERE  (EXISTS (SELECT 1 from ft_baches
        WHERE ft_baches.id=alumnos.id and ft_baches.Bachillerato= :bachillerato ))
                          AND alumnos.Semestre= :sem" ,['sem'=>$semestre   , 'bachillerato'=>$bachillerato]);
         $titulo=$semestre . " ".$r->bachilleratoT;
      $pdf= PDF::loadView('Listas.muestraGrupos',compact('listaA','semestre','titulo'));
       
       return $pdf->stream();
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
        return "sadasdas";
    }
}
