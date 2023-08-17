<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        //idCategoria, nombre, descripcion, archivado
        Schema::create('categoria', function (Blueprint $table) {
            $table->id('idCategoria');
            $table->string('nombre',100);
            $table->string('descripcion',255)->nullable();
            $table->boolean('archivado')->nullable()->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categoria');
    }
};
