<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->string("nombre", 50);
            $table->string("email", 50)->unique();
            $table->string("telefono", 15);
            $table->string("direccion", 50);
            $table->string("provincia", 50);
            $table->string("website", 50)->nullable();
            $table->text("descripcion", 50)->nullable();
            $table->boolean("publicado")->default(0);
            $table->integer("orden")->default(1);
            $table->integer("visitas")->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
