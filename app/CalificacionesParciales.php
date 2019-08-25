<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalificacionesParciales extends Model
{
    protected $fillable = ['id','ClaveA','ClaveM','Parcial1','Parcial2','Semestre','Año'];
}
