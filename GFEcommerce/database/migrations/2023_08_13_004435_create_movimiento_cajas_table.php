<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('movimientocaja', function (Blueprint $table) {
            $table->id('idMovimientoCaja');
            $table->double('monto',9,2);
            $table->string('tipo',20);
            $table->string('descripcion',255);
            $table->datetime('fechaHora');
            $table->boolean('archivado')->nullable()->default(0);
            $table->unsignedBigInteger('idCaja');
            $table->foreign('idCaja')->references('idCaja')->on('caja');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('movimientocaja');
    }
};
