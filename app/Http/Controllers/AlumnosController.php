<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\usuarioalumno;
use App\ft_bach;
use App\Grupo;
use App\Http\Requests\TagStoreRequestFTyBACH;
use App\Http\Requests\TagStoreRequest;



class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $alumno1)
    {
      $clave=$alumno1->id;
      $nombre=$alumno1->nombre;
      if (isset($clave)&&isset($nombre)) {
        $CAlumno = Alumno::where('id',$alumno1->id)->get();
        if (count($CAlumno)==0){
          return back()->with('msj',' algún dato no existe' );
        }
        else {
          foreach ($CAlumno as $campo) {
            if ($campo->Nombre_A==$nombre) {
              return view('Alumnos.formdisable',compact('CAlumno'));
            }
            else {
                return back()->with('msj',' Datos no encontrados' );
            }
          }
        }

      }

      else if  (isset($clave)) {
        $CAlumno = Alumno::where('id', $alumno1->id)->get();
        //return $CAlumno;

        if (count($CAlumno)==0){
          return back()->with('msj','La matrícula no existe' );
      }
          else{
              return view('Alumnos.formdisable',compact('CAlumno'));
          }
        }




        else {$CAlumno = Alumno::where('Nombre_A', $alumno1->nombre)->get();
        //return $CAlumno;
        if (count($CAlumno)==0){
          return back()->with('msj',' ese nombre no existe' );
      }
      else if(count($CAlumno)==1){
          return view('Alumnos.formdisable',compact('CAlumno','alumno1'));
        }
      else {
          return view('Alumnos.index',compact('CAlumno','alumno1'));
      }


        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($alumno1)
    {
        return $alumno1;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequest $request, TagStoreRequestFTyBACH $request2)
    {

        $alumno=new Alumno();

        $alumno->id=$request['id'];
        $alumno->Nombre_A=$request['nombre'];
        $alumno->Nombre_P=$request['nombrepadre'];
        $alumno->Nombre_M=$request['nombremadre'];
        $alumno->Domicilio=$request['domicilio'];
        $alumno->Telefono_T=$request['telefonotutor'];
        $alumno->Telefono_A=$request['telefonoalumno'];
        $alumno->Poblacion=$request['poblacion'];
        $alumno->Municipio=$request['municipio'];
        $alumno->Fecha_Nac=$request['fecha'];
        $alumno->Edad=$request['edad'];
        $alumno->Email=$request['correo'];
        $alumno->Curp=$request['curp'];
        $alumno->NSS=$request['nss'];
        $alumno->Grado=$request['semestres'];
        $alumno->Semestre=$request['semestree'];
        $alumno->Sexo=$request['sexo'];
        $alumno->Estado='REGULAR';
        $alumno->Requisito_A=$request['A'];
        $alumno->Requisito_B=$request['B'];
        $alumno->Requisito_C=$request['C'];
        $alumno->Requisito_D=$request['D'];
        $alumno->Requisito_E=$request['E'];
        $alumno->Requisito_F=$request['F'];
        $alumno->Requisito_G=$request['G'];
        $alumno->Requisito_H=$request['H'];
        $alumno->save();

        $alumnoL=new usuarioalumno();
        $alumnoL->Usuario=$request['id'];
        $alumnoL->save();

        $campo=new ft_bach();

        $campo->id=$request['id'];
        $campo->Formación_Trabajo=$request2['ft1'];
        $campo->Bachillerato=$request2['bach1'];
        $campo->save();

        //return $alumno->fechAll('Numero');

        return back()->with('msj','Alumno inscrito con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $alumno1)

            {
        $ides=$alumno1['id'];
        $alumn="";
        $alumns=Alumno::where([['id',$alumno1->id]])->get();
        foreach ($alumns as $row){
            $alumn=$row;
            $alumn->fill($alumno1->all());
        }
        $alumn->save();

       return redirect('alumnosconsulta')->with('msj2','Alumno modificado correctamente');

        //return 'actualizado';
        //return redirect()->view('Reinscripcion.show');
        //return back()->with('re',' correctamente' );
        //return back()->with('msj',' esa matricula no existe' );
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
        //return $id;
        $CAlumno = Alumno::where('id', $id)->get();
        return view('Alumnos.show',compact('CAlumno'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Alumno::where('id',$id)->delete();
      usuarioalumno::where('Usuario',$id)->delete();
       $alumnos=Alumno::get();
        //return  view('Alumnos.index',compact('alumnos'));
       return redirect('/alumnosconsulta')->with('msj2','Alumno Eliminado Correctamente');
    }
}
