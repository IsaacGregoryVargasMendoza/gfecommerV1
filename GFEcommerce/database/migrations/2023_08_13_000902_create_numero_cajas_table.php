<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('numerocaja', function (Blueprint $table) {
            $table->id('idNumeroCaja');
            $table->string('numero',100);
            $table->boolean('estado')->nullable()->default(0);
            $table->boolean('archivado')->nullable()->default(0);
            $table->unsignedBigInteger('idSucursal');
            $table->foreign('idSucursal')->references('idSucursal')->on('sucursal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('numerocaja');
    }
};
