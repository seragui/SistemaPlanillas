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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('codigo_empleado'); // Llave primaria y única
            $table->string('primer_nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('tercer_nombre')->nullable();
            $table->string('apellido_paterno');
            $table->string('apellido_materno')->nullable();
            $table->string('apellido_de_casada')->nullable();
            $table->string('numero_documento')->unique();
            $table->string('tipo_documento_id');
            $table->foreign('tipo_documento_id')->references('codigo')->on('tipo_documentos');
            $table->date('fecha_nacimiento');
            $table->string('numero_identificacion_tributaria', 14)->unique();
            $table->string('codigo_isss')->unique();
            $table->string('codigo_nup')->unique();
            $table->foreignId('id_profesion')->constrained('profesions','id_profesion');
            $table->foreignId('id_estado_civil')->constrained('estados_civiles','id_estado_civil');
            $table->text('direccion');
            $table->foreignId('pais_direccion_id')->constrained('paises','id');
            $table->foreignId('departamento_id')->constrained('departamentos','id');
            $table->foreignId('municipio_id')->constrained('municipios','id');
            $table->foreignId('codigo_cargo')->constrained('cargo','codigo_cargo');
            $table->foreignId('codigo_unidad')->constrained('unidades_organizativas','codigo_unidad');
            $table->foreignId('codigo_jefe')->nullable()->constrained('empleados','codigo_empleado');
            $table->string('correo_institucional');
            $table->decimal('salario', 10, 2);
            $table->enum('status', ['activo', 'inactivo']);
            $table->enum('sexo', ['masculino', 'femenino']);
            $table->date('fecha_contratacion');
            $table->date('fecha_despido')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
