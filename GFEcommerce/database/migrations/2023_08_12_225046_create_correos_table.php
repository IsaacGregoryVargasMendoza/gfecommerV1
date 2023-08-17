<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('correo', function (Blueprint $table) {
            $table->id('idCorreo');
            $table->string('correo',150)->nullable();
            $table->string('comentario',255)->nullable();
            $table->boolean('archivado')->nullable()->default(0);
            $table->unsignedBigInteger('idPersona');
            $table->foreign('idPersona')->references('idPersona')->on('persona');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('correo');
    }
};
