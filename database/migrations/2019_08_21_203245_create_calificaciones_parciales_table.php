<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificacionesParcialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificaciones_parciales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ClaveA');
            $table->string('ClaveM');
            $table->float('Parcial1');
            $table->float('Parcial2');
            $table->string('Semestre');
            $table->string('Año');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calificaciones_parciales');
    }
}
