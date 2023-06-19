<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('componente', function (Blueprint $table) {
            $table->string('clave_componente', 25)->primary();
            $table->string('nombre_componente');
            $table->longText('descripcion_componente');
            $table->double('precio_actual_componente');
            $table->integer('existencia_componente');
            $table->smallInteger('stock_min_componente');
            $table->integer('stock_max_componente');
            $table->integer('id_ct_marca');
            $table->tinyInteger('id_categoria');
            $table->double('descuento_componente');
            $table->longblob('imagen');
            
            $table->foreign('id_categoria', 'fk_cat--')->references('id_categoria')->on('categoria')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_ct_marca', 'fk_ct-marc')->references('id_marca')->on('marca');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('componente');
    }
}
