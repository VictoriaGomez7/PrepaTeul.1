<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $fillable = ['id','Asistencias','Retardos','Faltas','Periodo','Materia'];
}
