<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detalleventa', function (Blueprint $table) {
            $table->id('idDetalleVenta');
            $table->double('cantidad',9,2);
            $table->double('precio',9,2);
            $table->double('descuento',9,2);
            $table->string('observacion',255);
            $table->boolean('archivado')->nullable()->default(0);
            $table->unsignedBigInteger('idPresentacion');
            $table->unsignedBigInteger('idVenta');
            $table->foreign('idPresentacion')->references('idPresentacion')->on('presentacion');
            $table->foreign('idVenta')->references('idVenta')->on('venta');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalleventa');
    }
};
