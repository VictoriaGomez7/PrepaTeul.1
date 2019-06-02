<?php

namespace App\Http\Controllers;


use App\usuarioCE;
Use Session;
Use Redirect;
Use Alert;
use Illuminate\Http\Request;

class LoginCEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('LoginCE.index');
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
        $CE = usuarioCE::where('Usuario', $request->Usuario)->get();
        //return $CE;
        if (count($CE)==0)
        {

            return back()->with('msj',' Usuario o Contrseña incorrecta' );
        }
        else{
            $con= usuarioCE::where('Password', $request->Contraseña)->get();
            //return $con;
            if (count($con)==0)
            {

                return back()->with('msj',' Usuario o Contrseña incorrecta' );
            }
            else{

             return Redirect('/ControlEscolarInicio');
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
