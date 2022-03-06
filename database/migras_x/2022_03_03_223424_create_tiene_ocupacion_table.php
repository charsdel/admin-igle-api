<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTieneOcupacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiene_ocupacion', function (Blueprint $table) {
            $table->integer('ci_creyente');
            $table->string('ocupacion', 20)->unique('id_ocupacion');
            
            $table->primary(['ci_creyente', 'ocupacion']);
            $table->foreign('ci_creyente', 'tiene_ocupacion_ibfk_1')->references('cedula')->on('creyente')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ocupacion', 'tiene_ocupacion_ibfk_2')->references('nombre')->on('ocupacion')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiene_ocupacion');
    }
}
