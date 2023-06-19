<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarritoTdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrito_td', function (Blueprint $table) {
            $table->integer('id_carrito')->primary();
            $table->integer('id_usuario');
            $table->string('clave_componente', 25);
            $table->tinyInteger('cantidad');
            
            $table->foreign('clave_componente', 'fk_comp')->references('clave_componente')->on('componente');
            $table->foreign('id_usuario', 'fk_us')->references('idUsusrio')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrito_td');
    }
}
