<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detallecompra', function (Blueprint $table) {
            $table->id('idDetalleCompra');
            $table->double('cantidad',9,2);
            $table->double('precio',9,2);
            $table->double('total',9,2);
            $table->double('descuento',9,2)->nullable();
            $table->string('observacion',255)->nullable();
            $table->boolean('archivado')->nullable()->default(0);
            $table->unsignedBigInteger('idPresentacion');
            $table->unsignedBigInteger('idAlmacen');
            $table->unsignedBigInteger('idCompra');
            $table->foreign('idPresentacion')->references('idPresentacion')->on('presentacion');
            $table->foreign('idAlmacen')->references('idAlmacen')->on('almacen');
            $table->foreign('idCompra')->references('idCompra')->on('compra');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detallecompra');
    }
};
