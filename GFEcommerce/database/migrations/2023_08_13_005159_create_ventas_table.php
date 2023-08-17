<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->id('idVenta');
            $table->string('numeroDocumento',50);
            $table->string('denominacionCliente',255);
            $table->string('direccionCliente',255);
            $table->datetime('fechaEmision');
            $table->string('serie',10);
            $table->string('correlativo',50);
            $table->double('subTotal',9,2);
            $table->double('igv',9,2);
            $table->double('total',9,2);
            $table->boolean('estado')->nullable()->default(0);
            $table->boolean('archivado')->nullable()->default(0);
            $table->unsignedBigInteger('idCliente');
            $table->unsignedBigInteger('idTrabajador');
            $table->unsignedBigInteger('idTipoComprobante');
            $table->unsignedBigInteger('idCaja');
            $table->unsignedBigInteger('idMedioPago');
            $table->foreign('idCliente')->references('idCliente')->on('cliente');
            $table->foreign('idTrabajador')->references('idTrabajador')->on('trabajador');
            $table->foreign('idTipoComprobante')->references('idTipoComprobante')->on('tipocomprobante');
            $table->foreign('idCaja')->references('idCaja')->on('caja');
            $table->foreign('idMedioPago')->references('idMedioPago')->on('mediopago');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('venta');
    }
};
