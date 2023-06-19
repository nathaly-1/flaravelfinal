<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->integer('n_empleado')->primary();
            $table->string('nombre', 50);
            $table->string('apelldio_m');
            $table->string('apellido_p', 50);
            $table->string('direccion');
            $table->string('coreo');
            $table->bigInteger('telefono');
            $table->integer('id_rol');
            
            $table->foreign('id_rol', 'empleado_ibfk_1')->references('idRol')->on('rol')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado');
    }
}
