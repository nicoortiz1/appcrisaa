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
        Schema::create('productos_quimicos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_comercial', 255);
            $table->string('princ_activo', 255);
            $table->string('dosis', 255);
            $table->string('lote', 255);
            $table->date('vcto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_quimicos');
    }

    public function priority()
    {
        return 6; // Prioridad mayor significa que se ejecutará después
    }
};

