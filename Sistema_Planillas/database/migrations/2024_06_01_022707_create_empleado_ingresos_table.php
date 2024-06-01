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
        Schema::create('empleado_ingresos', function (Blueprint $table) {
            $table->id('codigo_ingreso');
            $table->unsignedBigInteger('codigo_empleado');
            $table->unsignedBigInteger('tipo_ingreso_id');
            $table->decimal('monto', 8, 2);
            $table->date('fecha');
            $table->timestamps();

            $table->foreign('codigo_empleado')->references('codigo_empleado')->on('empleados');
            $table->foreign('tipo_ingreso_id')->references('id_ingreso')->on('tipo_ingresos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado_ingresos');
    }
};
