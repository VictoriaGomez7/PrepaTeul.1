<?php

namespace App\Http\Controllers;

use App\usuariomaestro;
Use Session;
Use Redirect;
Use Alert;
//use mysql_connect ("localhost", "root","");
use Illuminate\Http\Request;

class LoginMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('LoginM.index');
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
        $CE = usuariomaestro::where('Usuario', $request->Usuario)->get();
        
        
        $Ps=usuariomaestro::where('Password', $request->Contraseña)->where('Usuario', $request->Usuario) ->get();
        //return 'CE'.$CE.'/'.'PS'.$Ps;
        //return $Ps;
        $usua=$CE[0]->Usuario;
        //return $usua;

        if (count($CE)==0)
        {

            return back()->with('msj',' Usuario o Contrseña incorrecta');
        }
        else{
            if ($CE==$Ps)
            {
                view('DocenteInterfazPrincipal.InterfazPrincipal',compact('usua'));
                return view('DocenteInterfazPrincipal.InterfazPrincipal2',compact('usua'));
            }
            else{

                //return 'no son igual '.$CE.'/'.$Ps;       
                return back()->with('msj',' Usuario o Contrseña incorrecta' );
            }
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
