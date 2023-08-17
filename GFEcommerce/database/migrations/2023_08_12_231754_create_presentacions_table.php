<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('presentacion', function (Blueprint $table) {
            $table->id('idPresentacion');
            $table->string('nombre')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('imagen')->nullable()->default('');
            $table->double('stock',9,2)->nullable()->default(0);
            $table->double('cantidadMinima',9,2)->nullable()->default(0);
            $table->boolean('visible')->nullable()->default(1);
            $table->boolean('estado')->nullable()->default(0);
            $table->boolean('archivado')->nullable()->default(0);
            $table->unsignedBigInteger('idUnidadMedida');
            $table->unsignedBigInteger('idProducto');
            $table->foreign('idUnidadMedida')->references('idUnidadMedida')->on('unidadmedida');
            $table->foreign('idProducto')->references('idProducto')->on('producto');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('presentacion');
    }
};
