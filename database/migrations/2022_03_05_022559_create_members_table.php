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
            $table->unsignedBigInteger('cedula')->unique('cedula');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('sexo')->nullable()->default(null);
            $table->date('fecha_nac')->nullable();
            $table->integer('edad');
            $table->string('estado_civil')->nullable()->default(null);
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
            $table->unsignedBigInteger('sede_id')->nullable()->default(null);
            $table->string('sede')->nullable()->default(null);
            $table->unsignedBigInteger('red_id')->nullable()->default(null);
            $table->string('red')->nullable()->default(null);
            $table->unsignedBigInteger('home_id');
            $table->string('hvn')->nullable()->default(null);
            $table->string('ocupacion')->nullable()->default(null);
            $table->string('status')->nullable()->default(null);
            $table->boolean('clase_discipulado')->default(0)->nullable()->default(null);
            $table->boolean('discipulado_aprobado')->default(0)->nullable()->default(null);
            $table->boolean('bautizado')->nullable()->default(null);


            $table->foreign('home_id', 'miembro_de_hvnId')->references('id')->on('homes');

            $table->timestamps();
        });

        DB::statement('
            create fulltext index chapters_name_lastn_fulltext
            on members(nombres, apellidos);
        ');
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
