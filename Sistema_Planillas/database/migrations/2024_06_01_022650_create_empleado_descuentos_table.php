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
        Schema::create('empleado_descuentos', function (Blueprint $table) {
            $table->id('codigo_descuento');
            $table->foreignId('codigo_empleado');
            $table->unsignedBigInteger('tipo_descuento_id');
            $table->decimal('monto', 8, 2);
            $table->date('fecha_inicio');
            $table->timestamps();

            $table->foreign('codigo_empleado')->references('codigo_empleado')->on('empleados');
            $table->foreign('tipo_descuento_id')->references('id_descuento')->on('tipo_descuentos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado_descuentos');
    }
};
