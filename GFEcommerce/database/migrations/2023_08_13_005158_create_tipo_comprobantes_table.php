<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tipocomprobante', function (Blueprint $table) {
            $table->id('idTipoComprobante');
            $table->string('nombre',150);
            $table->string('serie',10);
            $table->string('correlativo',20);
            $table->boolean('archivado')->nullable()->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipocomprobante');
    }
};
