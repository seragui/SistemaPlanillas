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
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->increments('codigo_presupuesto');
            $table->integer('codigo_unidad_organizativa')->unsigned();
            $table->double('monto', 15, 2);
            $table->timestamps();
            $table->primary('codigo_presupuesto');
            $table->foreign('codigo_unidad_organizativa')->references('codigo_unidad')->on('unidades_organizativas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presupuestos');
    }
};
