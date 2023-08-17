<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('distrito', function (Blueprint $table) {
            $table->id('idDistrito');
            $table->string('nombre',150)->nullable();
            $table->unsignedBigInteger('idProvincia');
            $table->boolean('archivado')->nullable()->default(0);
            $table->foreign('idProvincia')->references('idProvincia')->on('provincia');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('distrito');
    }
};
