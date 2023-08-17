<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id('idProducto');
            $table->string('codigo',10);
            $table->string('nombre',200);
            $table->text('descripcion',255)->nullable();
            $table->string('imagen')->nullable()->default('');
            $table->boolean('visible')->nullable()->default(1);
            $table->boolean('estado')->nullable()->default(0);
            $table->boolean('archivado')->nullable()->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('producto');
    }
};
