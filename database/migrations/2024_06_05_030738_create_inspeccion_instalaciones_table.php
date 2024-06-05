<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('inspeccion_instalaciones', function (Blueprint $table) {
            $table->id();
            $table->string('sector', 255);
            $table->unsignedBigInteger('plaga_id');
            $table->string('causa', 255);
            $table->string('accion', 255);
            $table->string('cierre', 255);
            $table->timestamps();

            // Foreign key
            $table->foreign('plaga_id')->references('id')->on('plagas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('inspeccion_instalaciones');
    }

    public function priority()
    {
        return 3; // Prioridad mayor significa que se ejecutará después
    }
};

