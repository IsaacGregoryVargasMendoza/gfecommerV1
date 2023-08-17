<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('departamento', function (Blueprint $table) {
            $table->id('idDepartamento');
            $table->string('nombre',150)->nullable();
            $table->unsignedBigInteger('idPais');
            $table->boolean('archivado')->nullable()->default(0);
            $table->foreign('idPais')->references('idPais')->on('pais');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('departamento');
    }
};
