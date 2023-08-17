<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mediopago', function (Blueprint $table) {
            $table->id('idMedioPago');
            $table->string('nombre',100);
            $table->boolean('archivado')->nullable()->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mediopago');
    }
};
