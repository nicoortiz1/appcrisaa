<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reportes_servicio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->date('fecha');
            $table->string('numero_reporte', 50);
            $table->unsignedBigInteger('inspeccion_instalaciones_id')->nullable();
            $table->unsignedBigInteger('ctrl_quimico_id')->nullable();
            $table->unsignedBigInteger('control_aves_id')->nullable();
            $table->unsignedBigInteger('users_id');
            $table->text('observaciones')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('cliente_id')->references('id')->on('clients');
            $table->foreign('inspeccion_instalaciones_id')->references('id')->on('inspeccion_instalaciones');
            $table->foreign('ctrl_quimico_id')->references('id')->on('ctrl_quimico');
            $table->foreign('control_aves_id')->references('id')->on('control_aves');
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reportes_servicio');
    }

}
;
