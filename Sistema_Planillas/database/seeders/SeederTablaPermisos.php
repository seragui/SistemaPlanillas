<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos = [
            // Permisos para la tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            // Permisos para profesiones
            'ver-profesion',
            'crear-profesion',
            'editar-profesion',
            'borrar-profesion',

            // Permisos para tipos de documentos
            'ver-tipo-documento',
            'crear-tipo-documento',

            // Permisos para estados civiles
            'ver-estado-civil',
            'crear-estado-civil',
            'editar-estado-civil',
            'borrar-estado-civil',

            // Permisos para países
            'ver-pais',
            'crear-pais',
            'editar-pais',
            'borrar-pais',

            // Permisos para departamentos
            'ver-departamento',
            'crear-departamento',
            'editar-departamento',
            'borrar-departamento',

            // Permisos para municipios
            'ver-municipio',
            'crear-municipio',
            'editar-municipio',
            'borrar-municipio',

            // Permisos para cargos
            'ver-cargo',
            'crear-cargo',
            'editar-cargo',
            'borrar-cargo',
        
        ];

        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
