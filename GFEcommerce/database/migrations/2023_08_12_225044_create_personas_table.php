<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->id('idPersona');
            $table->string('numeroDocumento',40);
            $table->string('nombre',200);
            $table->string('apellidoPaterno',200)->nullable()->default('');
            $table->string('apellidoMaterno',200)->nullable()->default('');
            $table->string('sexo',20);
            $table->date('fechaNacimiento')->nullable();
            $table->boolean('archivado')->nullable()->default(0);
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
        Schema::dropIfExists('persona');
    }
};
