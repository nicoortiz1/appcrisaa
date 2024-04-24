<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToClientsTable extends Migration
{
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('nombre');
            $table->string('email');
            $table->string('cuil');
            $table->string('dni');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('provincia');
            $table->text('descripcion')->nullable();
            $table->boolean('publicado')->default(true);
            $table->integer('orden');
        });
    }

    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            // Define aquí cómo revertir los cambios si es necesario
        });
    }
}
