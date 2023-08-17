<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->id('idCompra');
            $table->string('numeroDocumento',50);
            $table->string('denominacionProveedor',255);
            $table->string('direccionProveedor',255);
            $table->datetime('fechaEmision');
            $table->string('serie',10);
            $table->string('correlativo',50);
            $table->double('subTotal',9,2);
            $table->double('igv',9,2);
            $table->double('total',9,2);
            $table->unsignedBigInteger('idProveedor');
            $table->unsignedBigInteger('idTrabajador');
            $table->unsignedBigInteger('idTipoComprobante');
            $table->unsignedBigInteger('idCaja');
            $table->unsignedBigInteger('idMedioPago');
            $table->boolean('estado')->nullable()->default(0);
            $table->boolean('archivado')->nullable()->default(0);
            $table->foreign('idProveedor')->references('idProveedor')->on('proveedor');
            $table->foreign('idTrabajador')->references('idTrabajador')->on('trabajador');
            $table->foreign('idTipoComprobante')->references('idTipoComprobante')->on('tipoComprobante');
            $table->foreign('idCaja')->references('idCaja')->on('caja');
            $table->foreign('idMedioPago')->references('idMedioPago')->on('mediopago');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('compra');
    }
};
