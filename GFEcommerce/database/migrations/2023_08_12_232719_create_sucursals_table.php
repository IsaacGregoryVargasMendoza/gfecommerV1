<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sucursal', function (Blueprint $table) {
            $table->id('idSucursal');
            $table->string('nombre',100);
            $table->string('direccion',255)->nullable();
            $table->datetime('fechaApertura')->nullable();
            $table->string('horarioAtencion',255)->nullable();
            $table->boolean('estado')->nullable()->default(0);
            $table->boolean('archivado')->nullable()->default(0);
            $table->unsignedBigInteger('idPais');
            $table->unsignedBigInteger('idDepartamento');
            $table->unsignedBigInteger('idProvincia');
            $table->unsignedBigInteger('idDistrito');
            $table->unsignedBigInteger('idEmpresa');
            $table->foreign('idPais')->references('idPais')->on('pais');
            $table->foreign('idDepartamento')->references('idDepartamento')->on('departamento');
            $table->foreign('idProvincia')->references('idProvincia')->on('provincia');
            $table->foreign('idDistrito')->references('idDistrito')->on('distrito');
            $table->foreign('idEmpresa')->references('idEmpresa')->on('empresa');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sucursal');
    }
};
