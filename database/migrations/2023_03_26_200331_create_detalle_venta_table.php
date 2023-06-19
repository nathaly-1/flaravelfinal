<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->integer('id_dv')->primary();
            $table->string('folio_venta', 15);
            $table->string('clave_componente', 25);
            $table->tinyInteger('cantidad_componente');
            $table->double('precio_venta');
            
            $table->foreign('folio_venta', 'FK_detalle_venta_jarmando_venta_jarmando')->references('folio_venta')->on('venta')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('clave_componente', 'fk-com')->references('clave_componente')->on('componente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_venta');
    }
}
