<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->id('idEmpresa');
            $table->string('numeroDocumento',30);
            $table->string('denominacion',100);
            $table->string('domicilioFiscal',255)->nullable();
            $table->string('actividadEconomica',255)->nullable();
            $table->string('nombreComercial',255)->nullable();
            $table->string('logoEmpresa',255)->nullable();
            $table->string('logoDocumento',255)->nullable();
            $table->boolean('archivado')->nullable()->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empresa');
    }
};
