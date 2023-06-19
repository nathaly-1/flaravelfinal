<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaracteristicasPCategoriadetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristicas_p_categoriadetalle', function (Blueprint $table) {
            $table->tinyInteger('id_caracteristicasdetalle_producto')->primary();
            $table->string('clave_componente', 25);
            $table->integer('id_caracteristica');
            $table->longText('descripcion_caracteristica');
            
            $table->foreign('id_caracteristica', 'fk1')->references('id_caracteristica')->on('caracteristicas_p_categoria');
            $table->foreign('clave_componente', 'fk_compo')->references('clave_componente')->on('componente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caracteristicas_p_categoriadetalle');
    }
}
