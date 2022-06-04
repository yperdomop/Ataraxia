<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// se importan
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'user']);
        /*  $role3 = Role::create(['name' => 'premium']);
        $role4 = Role::create(['name' => 'gold']);
        $role5 = Role::create(['name' => 'silver']);
        $role6 = Role::create(['name' => 'basic']); */

        //crear permisos de ruta administrador
        Permission::create(['name' => 'admin.home', 'description' => 'Ver Panel de control'])->syncRoles($role1);

        Permission::create(['name' => 'admin.users.index', 'description' => 'Ver listado de usuarios'])->syncRoles($role1);
        Permission::create(['name' => 'admin.users.create', 'description' => 'crear usuarios'])->syncRoles($role1);
        Permission::create(['name' => 'admin.users.edit', 'description' => 'editar usuarios'])->syncRoles($role1);
        Permission::create(['name' => 'admin.users.destroy', 'description' => 'eliminar usuarios'])->syncRoles($role1);

        Permission::create(['name' => 'admin.roles.index', 'description' => 'Ver listado de roles'])->syncRoles($role1);
        Permission::create(['name' => 'admin.roles.create', 'description' => 'crear roles'])->syncRoles($role1);
        Permission::create(['name' => 'admin.roles.edit', 'description' => 'editar roles'])->syncRoles($role1);
        Permission::create(['name' => 'admin.roles.destroy', 'description' => 'eliminar roles'])->syncRoles($role1);
    }
}
