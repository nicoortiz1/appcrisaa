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
        Schema::create('remitos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre", 50);
            $table->string("slug", 25)->unique();
            $table->text("descripcion", 50)->nullable();
            $table->boolean("menu")->default(0);
            $table->integer("orden")->default(1);
            $table->foreignID("cliente_id")->references('id')->on('clientes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignID("user_id")->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remitos');
    }
};

