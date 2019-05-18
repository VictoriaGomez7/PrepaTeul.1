<?php

namespace App\Http\Controllers;
use App;

use Illuminate\Http\Request;
use App\compromisoEstudiante;
use App\compromisosFamilia;
use App\Alumno;
use DB;
use PDF;
use Session;


class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $id)
    {
      if ($id->opcion==null) {
        
      }

      $alumno=Alumno::where([

     ['id',$id->id]
  ])->get();

  if (count($alumno)==0)
    {
      return back()->with('msj',' Matrícula inexistente');
    }else
        {
          if ($id->opcion==1) {
            foreach ($alumno as $row ) {
               # code...
                   //return $row;
           }
                 $compromisos2=compromisosFamilia::take(100)->get();
                 $compromisos=compromisoEstudiante::take(100)->get();
                 $pdf= PDF::loadView('Inscripcion.show0',compact('compromisos','row','compromisos2'));

                 return $pdf->stream();
          }
          else if($id->opcion==2) {
            foreach ($alumno as $row ) {
            # code...
               //return $row;
          }

            $compromisos2=compromisosFamilia::take(100)->get();
             $compromisos=compromisoEstudiante::take(100)->get();
             $pdf= PDF::loadView('Inscripcion.show',compact('compromisos','row','compromisos2'));

           return $pdf->stream();
          }
          else {

          }


              }
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $id)
    {
      //return $id->id;


        $alumno=Alumno::where([

        ['id',$id->id]
        ])->get();

        if (count($alumno)==0)
        {
            return back()->with('msj','Matricula inexistente');
            }else
             {
                  foreach ($alumno as $row ) {
                  # code...
                     //return $row;
                }

                  $compromisos2=compromisosFamilia::take(100)->get();
                   $compromisos=compromisoEstudiante::take(100)->get();
                   $pdf= PDF::loadView('Inscripcion.show',compact('compromisos','row','compromisos2'));

                 return $pdf->stream();

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
    public function show(Request $id)
    {
        return ($id);

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
