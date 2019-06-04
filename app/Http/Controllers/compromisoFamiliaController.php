<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTrainerRequest;
    use App\compromisosFamilia;
class compromisoFamiliaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     
        $compromisos=compromisosFamilia::take(100)->get();
        
         return view('compromisosFamilia.index',compact('compromisos'));
     
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
    public function store(Request $r,compromisosFamilia $compromiso)
    {
      $ban=0;
      $cadena=$r->compromiso;
      $c="";
        if(isset($r->guardar)){
            $nu=compromisosFamilia::where([['compromiso',$r->compromiso]
        ])->get();
             $mide=count($nu);
             if($mide==0){
                if((strlen($r->compromiso)>0)){
         $compromisos="";
            $compromiso=new compromisosFamilia();
         $comp=$r->compromiso;
         $base=compromisosFamilia::find($comp);
        $compromisos.=$r->compromiso;
        $compromiso->compromiso=$r->compromiso;
        
            $compromiso->save();  

       }
        }
           $compromisos=compromisosFamilia::take(100)->get();
         
            return redirect('formatofamilia')->with('compromisos');

        }else if($r->editar){
                $compromisosFamilia=compromisosFamilia::take(100)->get();
                    $compromisos= compromisosFamilia::take(100)->get();
             if(count($compromisosFamilia)>=$r->cambios){
                     $compromiso= $compromisosFamilia[$r->cambios-1];
                    // return $compromiso;

                      $compromiso->fill($r->all());
                  $compromiso->save();
                      $compromisosFamilia=compromisosFamilia::take(100)->get();
                    $compromisos= compromisosFamilia::take(100)->get();
                       return redirect('formatofamilia' )->with('compromiso','compromisos');
             }
             else{
                return redirect('formatofamilia' )->with('msj2','Compromiso no encontrado');
             }   
            
       return redirect()->route('compromisos.index')->with('status',$compromisos);
                   
        
        }else if(isset($r->eliminar)){
          if($r->cambios>=1)

          {
            $compromisosFamilia=compromisosFamilia::take(100)->get();
                    $compromisos= compromisosFamilia::take(100)->get();
             if(count($compromisosFamilia)>=$r->cambios){
                     $compromiso= $compromisosFamilia[$r->cambios-1];
                    // return $compromiso;
                       $compromiso->delete();
                      $compromisosFamilia=compromisosFamilia::take(100)->get();
                    $compromisos= compromisosFamilia::take(100)->get();
                       return redirect('formatofamilia')->with('compromisos');
             }
             else{
                $compromisos= compromisosFamilia::take(100)->get();
                return redirect('formatofamilia')->with('compromisos')->with('msj2','Compromiso no encontrado');
            }

        }
                 

                  
         
      

        }else if(isset($r->buscar)){

                 $compromisosFamilia=compromisosFamilia::take(100)->get();
                    $compromisos= compromisosFamilia::take(100)->get();
             if(count($compromisosFamilia)>=$r->cambios){
                     $compromiso= $compromisosFamilia[$r->cambios-1];
                    // return $compromiso;
                      $compromisosFamilia=compromisosFamilia::take(100)->get();
                    $compromisos= compromisosFamilia::take(100)->get();
                        return view('compromisosFamilia.busqueda' ,compact('compromiso','compromisos'));
             }else{
                    $compromisos= compromisosFamilia::take(100)->get();
                         return redirect('formatofamilia')->with('compromisos')->with('msj2','Compromiso no encontrado');
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
        $compromisosFamilia=compromisosFamilia::where([

            ['numero',$r->buscado]
        ])->get();

        foreach ($compromisosFamilia as $row ) {
            $comp=$row;
        }
       
       $compromisos=new compromisosFamilia();
       return redirect()->route('compromisosFamilia.busqueda')->with('status',$compromisos);
      //  return redirect()->route('mostrar')->with('status',$compromisosFamilia);
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