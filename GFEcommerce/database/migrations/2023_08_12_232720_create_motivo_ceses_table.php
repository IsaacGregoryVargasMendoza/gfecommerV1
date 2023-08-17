<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('motivocese', function (Blueprint $table) {
            $table->id('idMotivoCese');
            $table->string('nombre',150);
            $table->string('descripcion',255)->nullable();
            $table->boolean('archivado')->nullable()->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('motivocese');
    }
};
