<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compra', function (Blueprint $table) {
            $table->integer('id_detalle_compra')->primary();
            $table->string('folio_compra', 20);
            $table->string('clave_componente', 25);
            $table->double('cantidad_componente');
            $table->double('precio');
            
            $table->foreign('folio_compra', 'FK_detalle_compra_jarmado_compra_jarmando')->references('folio_compra')->on('compra')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('clave_componente', 'fk-coom')->references('clave_componente')->on('componente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_compra');
    }
}
