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
        Schema::create('capturas_identificadas', function (Blueprint $table) {
            $table->id(); // Esto crea una columna auto_increment como clave primaria
            $table->string('tipo', 255)->notnull();
            $table->integer('cantidad')->notnull();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capturas_identificadas');
    }
};
