<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('precios', function (Blueprint $table) {
            $table->id();
            $table->double('cantidadMinimaPrecio');
            $table->double('montoPrecio');
            $table->unsignedBigInteger('idProducto');
            $table->foreign('idProducto')->references('id')->on('productos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('precios');
    }
};
