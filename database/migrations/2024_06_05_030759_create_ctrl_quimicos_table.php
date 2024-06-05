
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
        Schema::create('ctrl_quimicos', function (Blueprint $table) {
            $table->id();
            $table->string('sector', 255);
            $table->unsignedBigInteger('plaga_id');
            $table->unsignedBigInteger('mecanismos_utilizados_id');
            $table->timestamps();

            // Foreign key
            $table->foreign('plaga_id')->references('id')->on('plagas');
            $table->foreign('mecanismos_utilizados_id')->references('id')->on('mecanismos_utilizados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ctrl_quimicos');
    }

    public function priority()
    {
        return 2; // Prioridad mayor significa que se ejecutará después
    }
};

