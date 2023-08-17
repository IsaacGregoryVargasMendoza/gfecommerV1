<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->id('idCliente');
            $table->string('numeroDocumento',40)->nullable();
            $table->string('nombre',200)->nullable();
            $table->string('apellidoPaterno',200)->nullable();
            $table->string('apellidoMaterno',200)->nullable();
            $table->string('sexo',20)->nullable();
            $table->date('fechaNacimiento')->nullable();
            $table->string('tipo',50)->nullable();
            $table->string('razonSocial',255)->nullable();
            $table->string('direccionEmpresa',255)->nullable();
            $table->string('nombreComercial',255)->nullable();
            $table->unsignedBigInteger('idTipoDocumento');
            $table->unsignedBigInteger('idPais');
            $table->unsignedBigInteger('idDepartamento');
            $table->unsignedBigInteger('idProvincia');
            $table->unsignedBigInteger('idDistrito');
            $table->unsignedBigInteger('idUsers');
            $table->foreign('idUsers')->references('idUsers')->on('users');
            $table->foreign('idTipoDocumento')->references('idTipoDocumento')->on('tipodocumento');
            $table->foreign('idPais')->references('idPais')->on('pais');
            $table->foreign('idDepartamento')->references('idDepartamento')->on('departamento');
            $table->foreign('idProvincia')->references('idProvincia')->on('provincia');
            $table->foreign('idDistrito')->references('idDistrito')->on('distrito');
            $table->boolean('estado');
            $table->boolean('archivado');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cliente');
    }
};
