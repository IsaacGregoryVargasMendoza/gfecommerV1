<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cargo', function (Blueprint $table) {
            $table->id('idCargo');
            $table->string('nombre',100);
            $table->string('descripcion',255)->nullable();
            $table->boolean('archivado')->nullable()->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cargo');
    }
};
