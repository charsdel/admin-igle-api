<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreyenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creyente', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('cedula')->unique('cedula');
            $table->string('nombres', 20);
            $table->string('apellidos', 20);
            $table->enum('sexo', ['masculino', 'femenino']);
            $table->date('fecha_nac');
            $table->integer('edad');
            $table->enum('estado_civil', ['soltero(a']);
            $table->string('direccion');
            $table->string('profesion', 20);
            $table->string('nacionalidad', 20);
            $table->string('telefono', 20);
            $table->string('correo', 40);
            $table->string('foto', 30);
            $table->string('iglesia_creyo', 40);
            $table->date('fecha_nac_esp');
            $table->date('fecha_bautizo');
            $table->string('iglesia_bautizo_agua', 40);
            $table->date('fecha_aprob_discipulado');
            $table->string('responsable_discipulado', 40);
            $table->string('area_servicio_pasado');
            $table->string('area_servicio_actual');
            $table->string('sede', 30);
            $table->string('ocupacion', 20);
            $table->string('red', 15)->index('red');
            $table->string('hvn', 15);
            $table->enum('status', ['activo', 'inactivo', 'visitante', 'nuevo creyente']);
            $table->boolean('clase_discipulado')->default(0);
            $table->enum('discipulado_aprobado', ['no', 'si']);
            $table->enum('bautizado', ['no', 'si']);
            
            $table->primary(['id', 'cedula', 'sede', 'red', 'hvn']);
            ;
            $table->foreign('hvn', 'creyente_ibfk_2')->references('id')->on('hvn')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('creyente');
    }
}
