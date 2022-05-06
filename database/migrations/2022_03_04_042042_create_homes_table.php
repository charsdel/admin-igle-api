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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('hogar')->default(0);
            $table->string('codigo_hogar')->default(0);
            $table->unsignedBigInteger('sede_id')->nullable();
            $table->string('sede')->nullable();
            $table->unsignedBigInteger('net_id');
            $table->string('red')->nullable();
            $table->string('direccion');
            $table->date('fecha_inicio');
            $table->date('fecha_cierre')->nullable();
            $table->string('motivo_cierre')->nullable();
            $table->timestamps();

            $table->foreign('net_id', 'hvn_de_redId')->references('id')->on('nets')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homes');
    }
};
