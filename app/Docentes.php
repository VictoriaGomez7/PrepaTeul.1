<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docentes extends Model
{
    protected $fillable=['id','Nombre','Domicilio','Telefono','Email','Curp'];
}
