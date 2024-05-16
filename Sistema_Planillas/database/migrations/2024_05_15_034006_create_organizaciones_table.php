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
        Schema::create('organizaciones', function (Blueprint $table) {
            $table->increments('codigo_organizacion');
            $table->string('nombre_organizacion', 200);
            $table->string('representante_legal', 100);
            $table->string('nit', 20);
            $table->string('logo')->nullable();
            $table->string('sitio_web')->nullable();
            $table->timestamps();

            // Especificar que codigo_organizacion es la clave primaria
            $table->primary('codigo_organizacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizaciones');
    }
};
