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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->integer('cedula')->unique('cedula');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('sexo');
            $table->date('fecha_nac')->nullable();
            $table->integer('edad');
            $table->string('estado_civil');
            $table->string('direccion');
            $table->string('profesion');
            $table->string('nacionalidad');
            $table->string('telefono');
            $table->string('correo');
            $table->string('foto')->nullable()->default(null);
            $table->string('iglesia_creyo')->nullable()->default(null);
            $table->date('fecha_nac_esp')->nullable()->default(null);
            $table->date('fecha_bautizo')->nullable()->default(null);
            $table->string('iglesia_bautizo_agua')->nullable()->default(null);
            $table->date('fecha_aprob_discipulado')->nullable()->default(null);
            $table->string('responsable_discipulado')->nullable()->default(null);
            $table->string('area_servicio_pasado')->nullable()->default(null);
            $table->string('area_servicio_actual')->nullable()->default(null);
            $table->unsignedBigInteger('sede_id');
            $table->string('sede');
            $table->unsignedBigInteger('red_id');
            $table->string('red');
            $table->unsignedBigInteger('hvn_id');
            $table->string('hvn');
            $table->string('ocupacion');
            $table->string('status');
            $table->boolean('clase_discipulado')->default(0);
            $table->boolean('discipulado_aprobado')->default(0);
            $table->boolean('bautizado');

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
        Schema::dropIfExists('members');
    }
};
