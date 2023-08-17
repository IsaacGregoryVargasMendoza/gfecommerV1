<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('caja', function (Blueprint $table) {
            $table->id('idCaja');
            $table->date('fechaApertura');
            $table->date('fechaCierre');
            $table->double('montoInicial',9,2);
            $table->double('saldoFinal',9,2);
            $table->double('saldoSistema',9,2);
            $table->boolean('estado')->nullable()->default(0);
            $table->boolean('archivado')->nullable()->default(0);
            $table->unsignedBigInteger('idSucursal');
            $table->unsignedBigInteger('idNumeroCaja');
            $table->foreign('idSucursal')->references('idSucursal')->on('sucursal');
            $table->foreign('idNumeroCaja')->references('idNumeroCaja')->on('numeroCaja');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('caja');
    }
};
