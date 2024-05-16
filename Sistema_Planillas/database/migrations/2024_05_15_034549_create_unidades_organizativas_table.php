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
        Schema::create('unidades_organizativas', function (Blueprint $table) {
            $table->increments('codigo_unidad');
            $table->integer('codigo_organizacion')->unsigned();
            $table->string('nombre_unidad', 100);
            $table->integer('codigo_estructura')->unsigned()->nullable(); // Clave foránea que apunta a la misma tabla
            $table->timestamps();

            $table->primary('codigo_unidad');

            // Referencia a la tabla organizaciones
            $table->foreign('codigo_organizacion')->references('codigo_organizacion')->on('organizaciones')->onDelete('cascade');

            // Referencia autorreferencial para unidades jerárquicas
            $table->foreign('codigo_estructura')->references('codigo_unidad')->on('unidades_organizativas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidades_organizativas');
    }
};
