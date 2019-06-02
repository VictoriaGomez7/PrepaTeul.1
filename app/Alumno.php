<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //
    protected $fillable = [
        'Numero','id', 'Nombre_A', 'Nombre_P','Nombre_M','Domicilio','Domicilio',
      'Telefono_T','Telefono_A','Poblacion','Municipio','Fecha_Nac',
      'Edad','Email','Curp','NSS','Sexo','Semestre','Grado','Requisito_A','Requisito_B','Requisito_C','Requisito_D','Requisito_E','Requisito_F','Requisito_G','Requisito_H'
    ];
}
