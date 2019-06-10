<?php

namespace App\Http\Controllers;


use App\Docentes;
Use Session;
Use Redirect;
Use Alert;
use Illuminate\Http\Request;
use App\Http\Requests\TagStoreRequestDocentes;
use App\usuariomaestro;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $id)
    {
      if ($id->name!="" && $id->id1=="")
         {
            $CDocente = Docentes::where('Nombre', $id->name)->get();
            if (count($CDocente)==0)
            {

                return back()->with('msj',' El docente no existe' );
        }
        else{
            //return view('DocenteC.showC',compact('CDocente'));
        //}
            //return count($CDocente);
            if (count($CDocente)>1)
            {
                return view('Docente.consultaT',compact('CDocente'));
            }
            else{
                return view('DocenteC.showC',compact('CDocente'));
            }
        }
         }
         if ($id->id1!="" && $id->name=="")
         {
            $CDocente = Docentes::where('id', $id->id1)->get();
            if (count($CDocente)==0)
            {

                return back()->with('msj',' El docente no existe' );
        }
        else{
            //return view('DocenteC.showC',compact('CDocente'));
        //}
            return view('DocenteC.showC',compact('CDocente'));
        }
         }

         if ($id->name=="" && $id->id1=="")
         {
            return back()->with('msj','Favor de ingresar un dato' );
         }

         if ($id->name!="" && $id->id1!="")
         {
            //$CDocente = Docente::where('id', $id->id)->get();
            $CDocente = Docentes::where('id', $id->id1)->get();
            foreach ($CDocente as $key) {
                # code...
            }

            if ($key->Nombre==$id->name)
            {
                return view('DocenteC.showC',compact('CDocente'));
            }
            else{
               return back()->with('msj','No coinciden' );
            }



            //return back()->with('msj','Favor de ingresar un solo dato' );
         }


        //if (count($CDocente)==0)
        //{

            //return back()->with('msj',' esa matricula no existe' );
        //}
        //else{
            //return view('DocenteC.showC',compact('CDocente'));
        //}

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //echo "hola";
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequestDocentes $request)
    {
        $docente=new Docentes();
        $docente->id=$request['id'];
        $docente->Nombre=$request['nombre'];
        $docente->Domicilio=$request['direccion'];
        $docente->Telefono=$request['telefono'];
        $docente->Email=$request['Email'];
        $docente->Curp=$request['Curp'];
        $docente->save();

        $docenteL=new usuariomaestro();
        $docenteL->Usuario=$request['id'];
        $docenteL->Password='12345';
        $docenteL->save();

        return back()->with('msj','Docente registrado con éxito.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(request $id)
    {
        //echo "hola";
        //return $id;
        $CDocente = Docentes::where('id', $id->id)->get();
        //return $CAlumno;
        //return $CDocente;
        //return $CDocente;
        return view('DocenteC.show',compact('CDocente'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(request $docente1)
    {
        $NombreN=$docente1->input('nombre1');
        $DomicilioN=$docente1->input('domicilio1');
        $TelefonoN=$docente1->input('telefono1');
        $ides=$docente1->input('clave1');
        //$docente = Docente::where('Clave', $docente1->clave1)->first();


        $docente=Docentes::find($ides);


        $docente->Nombre = $NombreN;
        $docente->Domicilio = $DomicilioN;
        $docente->Telefono = $TelefonoN;
        //echo $docente->Domicilio;
        //$docente->save();
        $docente->save();


            //return view('Docente.create')->with('msj1','Docente modificado exitosamente');
        return Redirect('docenteconsulta')->with('msj1','Docente modificado exitosamente' );

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        return Redirect('Docente')->with('msj1','Docente modificado exitosamente' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Docentes::where('id',$id)->delete();
      usuariomaestro::where('Usuario',$id)->delete();
       Docentes::get();
        //return  view('Alumnos.index',compact('alumnos'));
       return Redirect('docenteconsulta')->with('msj1','Docente Eliminado Correctamente');
    }
}
