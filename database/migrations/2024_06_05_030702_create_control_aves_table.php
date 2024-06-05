<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('control_aves', function (Blueprint $table) {
            $table->id();
            $table->string('ubicacion', 255);
            $table->unsignedBigInteger('mecanismos_utilizados_id')->nullable();
            $table->unsignedBigInteger('cap_identificadas_id')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('mecanismos_utilizados_id')->references('id')->on('mecanismos_utilizados');
            $table->foreign('cap_identificadas_id')->references('id')->on('capturas_identificadas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('control_aves');
    }

    public function priority()
    {
        return 4; // Prioridad mayor significa que se ejecutará después
    }
}
;
