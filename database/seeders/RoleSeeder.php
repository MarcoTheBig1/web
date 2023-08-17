<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create([
            'name' => 'Administrador',
            'description' => 'Rol de Administrador'
        ]);

        $role2 = Role::create([
            'name' => 'Lider',
            'description' => 'Rol de Líder'
        ]);

        $role3 = Role::create([
            'name' => 'Miembro',
            'description' => 'Rol de Miembro'
        ]);

        Permission::create(['name' => 'home', 'description' => 'Ver el Dashboard'])->syncRoles([$role1]);

        Permission::create(['name' => 'roles.index', 'description' => 'Ver listado de roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.create', 'description' => 'Crear un rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.edit', 'description' => 'Asignar un Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.update', 'description' => 'Actualizar un rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.destroy', 'description' => 'Eliminar un rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'users.index', 'description' => 'Ver listado de usuarios'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'users.create', 'description' => 'Registrar un nuevo usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit', 'description' => 'Editar un usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.update', 'description' => 'Actualizar datos'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.destroy', 'description' => 'Eliminar usuario'])->syncRoles([$role1]);
    }
}
