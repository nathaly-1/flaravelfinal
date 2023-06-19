<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->tinyInteger('id_cliente')->primary();
            $table->string('nombre_cliente', 100);
            $table->string('razon_social_cliente', 50);
            $table->longText('direccion_cliente');
            $table->string('telefono_cliente', 12);
            $table->string('correo_cliente', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente');
    }
}
