<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTrainerRequest;
use App\materia;
use App\Http\Requests\TagStoreRequestMaterias;
class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        //return $compromisos;
          return view('materias.consulta');

          // return view('mostrar',compact('compromisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TagStoreRequestMaterias $request)
    {

            $materia=new Materia();
            $materia->Clave=$request['id'];
            $materia->Tipo=$request['tipo'];
            $materia->Nombre=$request['nombre'];
            $materia->Semestre=$request['semestre'];
            $materia->Bachillerato=$request['bachillerato'];
            $materia->Horas=$request['horas'];
            $materia->save();

            return back()->with('msj','Materia registrada con éxito.');


    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
           $materia=[];
     $materias=materia::where([

            ['Clave',$r->claveOriginal]
        ])->get();
      foreach ($materias as $row ) {
         # code...

        $materia=$row;
     }


if(strlen($materia)){
                if(($r->Tipo=="Formación Propedéutica")){
                    if ($r->Semestre=="QUINTO SEMESTRE" or $r->Semestre=="SEXTO SEMESTRE") {
                              $materia->fill($r->all());
                            $materia->save();
                            return redirect('materia')->with('msj','Materia Modificada Correctamente');

                    }else{

                        return back()->with('msjERROR','El semestre seleccionado no coincide para el tipo de materia.' );
                    }


                }
                if ($r->Tipo=="Formación para el Trabajo"){
                if ($r->Semestre=="TERCER SEMESTRE" or $r->Semestre=="CUARTO SEMESTRE" or $r->Semestre=="QUINTO SEMESTRE" or $r->Semestre=="SEXTO SEMESTRE") {
                     $materia->fill($r->all());
                            $materia->save();
                           return redirect('materia')->with('msj','Materia Modificada Correctamente');
                                           }
                else{
                    return back()->with('msj','El semestre seleccionado no coincide para el tipo de materia.' );
                }
            }


                else{
                   $materia->fill($r->all());
                   $materia->save();
                return redirect('materia')->with('msj','Materia Modificada Correctamente');
            }


        }else {

         return redirect('materia')->with('msj2','Materia Modificada Correctamente1');

        }
         //return redirect('materia')->with('msj','Materia Modificada Correctamente');
         return redirect('materia')->with('msj2','Materia Modificada Correctamente2');

     }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($r)
    {
        $opciones2="";
         $opciones="";
        ///return $r;//
       $materia="";
     $materias=materia::where([

            ['Clave',$r]
        ])->get();
      foreach ($materias as $row ) {
         # code...


        $materia=$row;
        if($materia->Tipo=='Formación Propedéutica'){
                    $opciones=' <option value="Formación Propedéutica" selected="true">Formación Propedéutica</option>
                            <option value="Formación Profesional">Formación Profesional</option>
                            <option value="Actividades Paraescolares">Actividades Paraescolares</option>';

                }else if($materia->Tipo=='Formación Profesional'){
                    $opciones=' <option value="Formación Propedéutica" >Formación Propedéutica</option>
                            <option value="Formación Profesional" selected="true">Formación Profesional</option>
                            <option value="Actividades Paraescolares">Actividades Paraescolares</option>';

                }else if($materia->Tipo=='Actividades Paraescolares'){
                    $opciones=' <option value="Formación Propedéutica" >Formación Propedéutica</option>
                            <option value="Formación Profesional" >Formación Profesional</option>
                            <option value="Actividades Paraescolares" selected="true">Actividades Paraescolares</option>';

                }


                if($materia->Semestre=='PRIMER SEMESTRE'){
                    $opciones2='<option value="PRIMER SEMESTRE" selected="true">PRIMER SEMESTRE</option>
                            <option value="SEGUNDO SEMESTRE">SEGUNDO SEMESTRE</option>
                            <option value="TERCER SEMESTRE">TERCER SEMESTRE</option>
                            <option value="CUARTO SEMESTRE">CUARTO SEMESTRE</option>
                            <option value="QUINTO SEMESTRE">QUINTO SEMESTRE</option>
                            <option value="SEXTO SEMESTRE">SEXTO SEMESTRE</option>';
                }else if($materia->Semestre=='SEGUNDO SEMESTRE'){
                    $opciones2='<option value="PRIMER SEMESTRE">PRIMER SEMESTRE</option>
                            <option value="SEGUNDO SEMESTRE" selected="true">SEGUNDO SEMESTRE</option>
                            <option value="TERCER SEMESTRE">TERCER SEMESTRE</option>
                            <option value="CUARTO SEMESTRE">CUARTO SEMESTRE</option>
                            <option value="QUINTO SEMESTRE">QUINTO SEMESTRE</option>
                            <option value="SEXTO SEMESTRE">SEXTO SEMESTRE</option>';
                }else if($materia->Semestre=='TERCER SEMESTRE'){
                    $opciones2='<option value="PRIMER SEMESTRE">PRIMER SEMESTRE</option>
                            <option value="SEGUNDO SEMESTRE" >SEGUNDO SEMESTRE</option>
                            <option value="TERCER SEMESTRE" selected="true">TERCER SEMESTRE</option>
                            <option value="CUARTO SEMESTRE">CUARTO SEMESTRE</option>
                            <option value="QUINTO SEMESTRE">QUINTO SEMESTRE</option>
                            <option value="SEXTO SEMESTRE">SEXTO SEMESTRE</option>';
                }else if($materia->Semestre=='CUARTO SEMESTRE'){
                    $opciones2='<option value="PRIMER SEMESTRE">PRIMER SEMESTRE</option>
                            <option value="SEGUNDO SEMESTRE" >SEGUNDO SEMESTRE</option>
                            <option value="TERCER SEMESTRE" >TERCER SEMESTRE</option>
                            <option value="CUARTO SEMESTRE" selected="true">CUARTO SEMESTRE</option>
                            <option value="QUINTO SEMESTRE">QUINTO SEMESTRE</option>
                            <option value="SEXTO SEMESTRE">SEXTO SEMESTRE</option>';
                }else if($materia->Semestre=='QUINTO SEMESTRE'){
                    $opciones2='<option value="PRIMER SEMESTRE">PRIMER SEMESTRE</option>
                            <option value="SEGUNDO SEMESTRE" >SEGUNDO SEMESTRE</option>
                            <option value="TERCER SEMESTRE" >TERCER SEMESTRE</option>
                            <option value="CUARTO SEMESTRE" >CUARTO SEMESTRE</option>
                            <option value="QUINTO SEMESTRE" selected="true">QUINTO SEMESTRE</option>
                            <option value="SEXTO SEMESTRE">SEXTO SEMESTRE</option>';
                }else if($materia->Semestre=='SEXTO SEMESTRE'){
                    $opciones2='<option value="PRIMER SEMESTRE">PRIMER SEMESTRE</option>
                            <option value="SEGUNDO SEMESTRE" >SEGUNDO SEMESTRE</option>
                            <option value="TERCER SEMESTRE" >TERCER SEMESTRE</option>
                            <option value="CUARTO SEMESTRE" >CUARTO SEMESTRE</option>
                            <option value="QUINTO SEMESTRE" >QUINTO SEMESTRE</option>
                            <option value="SEXTO SEMESTRE" selected="true">SEXTO SEMESTRE</option>';
                }


 }
 return view('materias.modificar' ,compact('materia','opciones','opciones2'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($g, Request $r)
    {
            $materia=[];
       $materias=Materia::where([['Clave',$r->Clave]
        ])->get();
        foreach ($materias as $row ) {
            $materia=$row;

        }
       //return $materia->Clave;

        if($materia!=null)  {
            return view('materias.vista',compact('materia'));
         }else{

            return back()->with('msj2','La materia no existe' );
         }
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
        return "h";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        materia::where('Clave',$id)->delete();
       materia::get();
       return redirect('materia')->with('msj','Materia Eliminada Correctamente');
        //return  view('Alumnos.index',compact('alumnos'));
       //return view('materias.consulta');
    }
}