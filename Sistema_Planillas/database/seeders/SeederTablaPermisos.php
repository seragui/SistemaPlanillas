<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

// Spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Verificar si el rol 'Administrador' ya existe
        if (!Role::where('name', 'Administrador')->where('guard_name', 'api')->exists()) {
            Role::create(['name' => 'Administrador', 'guard_name' => 'api']);
        }

        $permisos = [
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

            // Permisos para organizaciones
            'ver-organizacion',
            'crear-organizacion',
            'editar-organizacion',
            'borrar-organizacion',

            // Permisos para unidades organizativas
            'ver-unidad-organizativa',
            'crear-unidad-organizativa',
            'editar-unidad-organizativa',
            'borrar-unidad-organizativa',

            // Permisos para presupuestos
            'ver-presupuesto',
            'crear-presupuesto',
            'editar-presupuesto',
            'borrar-presupuesto',

            // Permisos para roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
        ];

        foreach ($permisos as $permiso) {
            if (!Permission::where('name', $permiso)->exists()) {
                Permission::create(['name' => $permiso, 'guard_name' => 'api']);
            }
        }
    }
}
