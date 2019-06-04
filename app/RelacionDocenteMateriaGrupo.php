<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelacionDocenteMateriaGrupo extends Model
{
    protected $fillable = ['ClaveMateria','Docente','Materia','Grupo'];
}
