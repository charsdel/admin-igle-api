<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('red', function (Blueprint $table) {
            $table->string('codigo_red', 15);
            $table->string('zona_geografica');
            $table->string('sede', 20);
            $table->date('fecha_inicio');
            $table->date('fecha_cierre')->nullable();
            $table->string('motivo_cierre')->nullable();
            $table->tinyInteger('activa');
            
            $table->primary(['codigo_red', 'sede']);
            $table->foreign('sede', 'red_de_sede')->references('nombre')->on('sede')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('red');
    }
}
