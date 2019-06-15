<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTrainerRequest;
use App\compromisoEstudiante;

class compromisoEstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $compromisos=compromisoEstudiante::take(100)->get();
        
         return view('compromisos.index',compact('compromisos'));
     
          // return view('mostrar',compact('compromisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

      

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r,compromisoEstudiante $compromiso)
    {
      $ban=0;
      $cadena=$r->compromiso;
      $c="";
        if(isset($r->guardar) ){
            $nu=compromisoEstudiante::where([['compromiso',$r->compromiso]
        ])->get();
             $mide=count($nu);
             if($mide==0){


             

            if((strlen($r->compromiso)>0)){

         $compromisos="";
        

            $compromiso=new compromisoEstudiante();
         $comp=$r->compromiso;
         $base=compromisoEstudiante::find($comp);
       
        $compromisos.=$r->compromiso;
        $compromiso->compromiso=$r->compromiso;
        //$compromiso->matricula=$r->matricula;55555
        //$compromiso->numero=$r->numero;
        
            $compromiso->save();
       
        

      
       

       }else{
                        $c='';

                    return redirect()->route('compromisos.index')->with('status',$c);

            }
        }
           $compromisos=compromisoEstudiante::take(100)->get();
            return redirect()->route('compromisos.index')->with('status',$compromisos);
        }
        else if($r->editar){
                $compromisoEstudiante=compromisoEstudiante::take(100)->get();
                $compromisos= compromisoEstudiante::take(100)->get();
                if(count($compromisoEstudiante)>=$r->cambios){
                     $compromiso= $compromisoEstudiante[$r->cambios-1];
                    // return $compromiso;

                    $compromiso->fill($r->all());
                    $compromiso->save();
                    $compromisoEstudiante=compromisoEstudiante::take(100)->get();
                    $compromisos= compromisoEstudiante::take(100)->get();
                    return redirect('formatoestudiantes' )->with('compromiso','compromisos');
            }
            else{
                $compromisos= compromisoEstudiante::take(100)->get();
                return redirect('formatoestudiantes' )->with('msj2','Compromiso no encontrado');
            }
                
            
       //return redirect()->route('compromisos.index')->with('status',$compromisos);
        }else if(isset($r->eliminar)){

            if($r->cambios >=1){
                $compromisoEstudiante=compromisoEstudiante::take(100)->get();
                $compromisos= compromisoEstudiante::take(100)->get();
                
                if(count($compromisoEstudiante)>=$r->cambios){
                    $compromiso= $compromisoEstudiante[$r->cambios-1];
                   
                    $compromiso->delete();
                    
                    $compromisoEstudiante=compromisoEstudiante::take(100)->get();
                    $compromisos= compromisoEstudiante::take(100)->get();  
                        return redirect('formatoestudiantes' )->with('compromiso','compromisos');
                }
                else{
                    $compromisos= compromisoEstudiante::take(100)->get();  
                    return redirect('formatoestudiantes' )->with('msj2','Compromiso no encontrado');
                    }
            }
                 

        }else if(isset($r->buscar)){
                    $compromisoEstudiante=compromisoEstudiante::take(100)->get();
                    $compromisos= compromisoEstudiante::take(100)->get();
             if(count($compromisoEstudiante)>=$r->cambios){
                     $compromiso= $compromisoEstudiante[$r->cambios-1];
                     $numero=$r->cambios;
                    // return $compromiso;
                      $compromisoEstudiante=compromisoEstudiante::take(100)->get();
                    $compromisos= compromisoEstudiante::take(100)->get();
                        return view('compromisos.busqueda' ,compact('compromiso','compromisos','numero'));
             }else{
                return redirect('formatoestudiantes' )->with('msj2','Compromiso no encontrado');
             }
        }
       
     
       
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $r)
    {
        //
        $comp="";
        $compromisoEstudiante=compromisoEstudiante::where([

            ['numero',$r->buscado]
        ])->get();

        foreach ($compromisoEstudiante as $row ) {
            $comp=$row;
                
        }
       
       $compromisos=new compromisoEstudiante();
       return redirect()->route('compromisos.busqueda')->with('status',$compromisos);
      //  return redirect()->route('mostrar')->with('status',$compromisoEstudiante);
 }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
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
    public function update($r)
    {
        //
        return $r;
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
