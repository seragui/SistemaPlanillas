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
        Schema::table('unidades_organizativas', function (Blueprint $table) {
            $table->string('centro_costos', 50)->nullable()->after('codigo_estructura');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('unidades_organizativas', function (Blueprint $table) {
            $table->dropColumn('centro_costos');
        });
    }
};
