<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('almacen', function (Blueprint $table) {
            $table->id('idAlmacen');
            $table->string('nombre',255);
            $table->string('descripcion',255)->nullable();
            $table->string('codigo',50)->nullable();
            $table->string('direccion',255)->nullable();
            $table->boolean('archivado')->nullable()->default(0);
            $table->unsignedBigInteger('idEmpresa');
            $table->unsignedBigInteger('idTipoDocumento');
            $table->unsignedBigInteger('idPais');
            $table->unsignedBigInteger('idDepartamento');
            $table->unsignedBigInteger('idProvincia');
            $table->unsignedBigInteger('idDistrito');
            $table->foreign('idEmpresa')->references('idEmpresa')->on('empresa');
            $table->foreign('idTipoDocumento')->references('idTipoDocumento')->on('tipodocumento');
            $table->foreign('idPais')->references('idPais')->on('pais');
            $table->foreign('idDepartamento')->references('idDepartamento')->on('departamento');
            $table->foreign('idProvincia')->references('idProvincia')->on('provincia');
            $table->foreign('idDistrito')->references('idDistrito')->on('distrito');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('almacen');
    }
};
