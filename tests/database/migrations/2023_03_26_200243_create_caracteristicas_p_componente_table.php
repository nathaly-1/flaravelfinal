<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaracteristicasPComponenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristicas_p_componente', function (Blueprint $table) {
            $table->integer('id_caracteristicas2_producto')->primary();
            $table->string('clave_componente', 25);
            $table->string('nombre_caracteristica', 100);
            $table->longText('descripcion_caracteristica');
            
            $table->foreign('clave_componente', 'fk_carp')->references('clave_componente')->on('componente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caracteristicas_p_componente');
    }
}
