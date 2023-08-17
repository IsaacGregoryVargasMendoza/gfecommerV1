<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('trabajador', function (Blueprint $table) {
            $table->id('idTrabajador');
            $table->boolean('estado');
            $table->boolean('archivado');
            $table->unsignedBigInteger('idPersona');
            $table->unsignedBigInteger('idUsers');
            $table->unsignedBigInteger('idCargo');
            $table->unsignedBigInteger('idSucursalOrigen');
            $table->unsignedBigInteger('idSucursalActual');
            $table->unsignedBigInteger('idMotivoCese');
            $table->foreign('idPersona')->references('idPersona')->on('persona');
            $table->foreign('idUsers')->references('idUsers')->on('users');
            $table->foreign('idCargo')->references('idCargo')->on('cargo');
            $table->foreign('idSucursalOrigen')->references('idSucursal')->on('sucursal');
            $table->foreign('idSucursalActual')->references('idSucursal')->on('sucursal');
            $table->foreign('idMotivoCese')->references('idMotivoCese')->on('motivocese');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trabajador');
    }
};
