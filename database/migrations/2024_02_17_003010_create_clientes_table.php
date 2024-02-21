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
            $table->id();
            $table->string("nombre", 50);
            $table->string("email", 50)->unique();
            $table->string("cuil", 50)->unique();
            $table->string("dni", 50)->unique();
            $table->string("telefono", 15);
            $table->string("direccion", 50);
            $table->string("provincia", 50);
            $table->text("descripcion", 100)->nullable();
            $table->boolean("publicado")->default(0);
            $table->integer("orden")->default(1);
            $table->timestamps();
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
