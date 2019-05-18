<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagStoreRequestMaterias extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            /*$tip=$request['tipo'];
            $sem=$request['semestre'];

            if ($tip=="Formación Propedéutica"){
                if ($sem!="QUINTO SEMESTRE" or $sem!="SEXTO SEMESTRE") {
                    return back()->with('msjERROR','El semestre seleccionado no coincide para el tipo de materia.' );
                }
            }
            elseif ($tip=="Formación Profesional"){
                if ($sem!="TERCER SEMESTRE" or $sem!="CUARTO SEMESTRE" or $sem!="QUINTO SEMESTRE" or $sem!="SEXTO SEMESTRE") {
                    return back()->with('msjERROR','El semestre seleccionado no coincide para el tipo de materia.' );
                }
            }*/
            'id'=>'unique:Materias,Clave,'.$this->tag,
            //'tipo' => 'if_else:(tipo=Formación Propedéutica),'semestre=PRIMER SEMESTRE'',
            //'tipo'=>'required_if:tipo,==,Formación Propedéutica',
            //'tipo'=>'tipo=Formación Propedéutica:semestre=QUINTO SEMESTRE,semestre=SEXTO SEMESTRE',
        ];
    }
}
