<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
	protected $fillable = ['id','Nombre','Direccion','Telefono'];
}
