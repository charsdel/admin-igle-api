<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHvnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hvn', function (Blueprint $table) {
            $table->string('id', 15)->unique('id');
            $table->string('cod_red', 15);
            $table->string('direccion');
            $table->date('fecha_inicio');
            $table->date('fecha_cierre')->nullable();
            $table->string('motivo_cierre')->nullable();
            
            $table->primary(['id', 'cod_red']);
            $table->foreign('cod_red', 'hvn_ibfk_2')->references('codigo_red')->on('red')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hvn');
    }
}
