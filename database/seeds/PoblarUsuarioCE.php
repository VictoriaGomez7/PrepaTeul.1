<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoblarUsuarioCE extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Usando el modelo creamos un nuevo registro. Tambien se puede hacer con el método save
       DB::table('usuario_c_e_s')->insert([
            'Usuario' => 'controlescolar',
            'Password'=>'12345'
        ]);
    }
}
