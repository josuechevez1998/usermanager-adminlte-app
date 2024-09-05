<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener el rol al que quieres asignar los permisos
        $role = Role::findByName('System');

        // Obtener todos los permisos
        $permissions = Permission::all();

        // Asignar todos los permisos al rol
        $role->syncPermissions($permissions);
    }
}
