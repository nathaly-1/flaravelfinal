<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->string('folio_venta', 15)->primary();
            $table->dateTime('fecha_venta', 6);
            $table->integer('id_usuario');
            $table->double('total_venta');
            
            $table->foreign('id_usuario', 'fk_usuavent')->references('idUsusrio')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta');
    }
}
