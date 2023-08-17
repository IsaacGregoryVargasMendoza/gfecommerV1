<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tipodocumento', function (Blueprint $table) {
            $table->id('idTipoDocumento');
            $table->string('nombre',100);
            $table->string('descripcion',150)->nullable();
            $table->boolean('archivado')->nullable()->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipodocumento');
    }
};
