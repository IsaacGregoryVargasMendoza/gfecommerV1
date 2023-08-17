<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pais', function (Blueprint $table) {
            $table->id('idPais');
            $table->string('codigo',150)->nullable();
            $table->string('nombre',255);
            $table->boolean('archivado')->nullable()->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pais');
    }
};
