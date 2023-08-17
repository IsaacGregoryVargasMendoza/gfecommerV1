<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('proveedor', function (Blueprint $table) {
            $table->id('idProveedor');
            $table->string('numeroDocumento',30);
            $table->string('nombre',255)->nullable();
            $table->string('apellidoPaterno',255)->nullable();
            $table->string('apellidoMaterno',255)->nullable();
            $table->string('sexo',20)->nullable();
            $table->string('fechaNacimiento',30)->nullable();
            $table->string('razonSocial',255)->nullable();
            $table->string('direccion',255)->nullable();
            $table->string('nombreComercial',255)->nullable();
            $table->boolean('estado')->nullable()->default(0);
            $table->boolean('archivado')->nullable()->default(0);
            $table->string('tipo',50)->nullable();
            $table->unsignedBigInteger('idTipoDocumento');
            $table->unsignedBigInteger('idPais');
            $table->unsignedBigInteger('idDepartamento');
            $table->unsignedBigInteger('idProvincia');
            $table->unsignedBigInteger('idDistrito');
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
        Schema::dropIfExists('proveedor');
    }
};
