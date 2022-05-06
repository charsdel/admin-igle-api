<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nets', function (Blueprint $table) {
            $table->id();
            $table->string('red')->default(0);
            $table->string('codigo_red');
            $table->string('zona_geografica');
            $table->unsignedBigInteger('sede_id');
            $table->string('sede')->default(0);
            $table->date('fecha_inicio');
            $table->date('fecha_cierre')->nullable();
            $table->string('motivo_cierre')->nullable();
            $table->boolean('activa')->default(0);
            $table->foreign('sede_id', 'red_de_sedeId')->references('id')->on('sedes')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('nets');
    }
};
