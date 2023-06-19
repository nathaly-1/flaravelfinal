<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaracteristicasPCategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristicas_p_categoria', function (Blueprint $table) {
            $table->integer('id_caracteristica')->primary();
            $table->tinyInteger('id_categoria');
            $table->string('nombre_caracteristica', 100);
            
            $table->foreign('id_categoria', 'fk_cat')->references('id_categoria')->on('categoria')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caracteristicas_p_categoria');
    }
}
