<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detallecategoria', function (Blueprint $table) {
            $table->id('idDetalleCategoria');
            $table->unsignedBigInteger('idProducto');
            $table->unsignedBigInteger('idCategoria');
            $table->boolean('archivado')->nullable()->default(0);
            $table->foreign('idProducto')->references('idProducto')->on('producto');
            $table->foreign('idCategoria')->references('idCategoria')->on('categoria');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detallecategoria');
    }
};
