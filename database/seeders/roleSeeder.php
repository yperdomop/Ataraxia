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
        $role1 = Role::create(['name' => 'admin', 'type' => 'Administrativo']);
        $role2 = Role::create(['name' => 'user', 'type' => 'Comercial']);
        $role3 = Role::create(['name' => 'clubes profesionales', 'type' => 'Comercial']);
        $role4 = Role::create(['name' => 'federaciones deportivas', 'type' => 'Comercial']);
        $role5 = Role::create(['name' => 'ligas deportivas', 'type' => 'Comercial']);
        $role6 = Role::create(['name' => 'clubes deportivos', 'type' => 'Comercial']);
        $role7 = Role::create(['name' => 'otras organizaciones deportivas', 'type' => 'Comercial']);
        $role8 = Role::create(['name' => 'proveedor', 'type' => 'Administrativo']);
        //crear permisos de ruta administrador
        Permission::create(['name' => 'admin.home', 'description' => 'Ver Panel de control'])->syncRoles($role1);

        Permission::create(['name' => 'admin.users.index', 'description' => 'Ver listado de usuarios'])->syncRoles($role1);
        Permission::create(['name' => 'admin.users.create', 'description' => 'Crear usuarios'])->syncRoles($role1);
        Permission::create(['name' => 'admin.users.edit', 'description' => 'Editar usuarios'])->syncRoles($role1);
        Permission::create(['name' => 'admin.users.destroy', 'description' => 'Eliminar usuarios'])->syncRoles($role1);

        Permission::create(['name' => 'admin.roles.index', 'description' => 'Ver listado de roles'])->syncRoles($role1);
        Permission::create(['name' => 'admin.roles.create', 'description' => 'Crear roles'])->syncRoles($role1);
        Permission::create(['name' => 'admin.roles.edit', 'description' => 'Editar roles'])->syncRoles($role1);
        Permission::create(['name' => 'admin.roles.destroy', 'description' => 'Eliminar roles'])->syncRoles($role1);

        Permission::create(['name' => 'ahorros', 'description' => 'Ahorros'])->syncRoles([$role3, $role4, $role5, $role6, $role7]);
        Permission::create(['name' => 'creditos', 'description' => 'Creditos'])->syncRoles($role3, $role4, $role5, $role6, $role7);
        Permission::create(['name' => 'microcreditos', 'description' => 'Microcreditos'])->syncRoles([$role5, $role6, $role7]);
        Permission::create(['name' => 'inversiones', 'description' => 'Inversiones'])->syncRoles([$role3, $role4, $role5, $role6, $role7]);
        Permission::create(['name' => 'inversionescripto', 'description' => 'Inversiones cripto'])->syncRoles([$role3, $role4, $role5, $role6, $role7]);
        Permission::create(['name' => 'organizarevento', 'description' => 'Organizar evento'])->syncRoles([$role4, $role5, $role6]);
        Permission::create(['name' => 'asistirevento', 'description' => 'Asistir evento'])->syncRoles([$role3, $role4, $role5, $role6, $role7]);
        Permission::create(['name' => 'becas', 'description' => 'Becas'])->syncRoles([$role3, $role4]);
        permission::create(['name' => 'edutech', 'description' => 'Edutech'])->syncRoles([$role2, $role3, $role4, $role5, $role6, $role7]);
        Permission::create(['name' => 'mall', 'description' => 'Mall'])->syncRoles([$role2, $role3, $role4, $role5, $role6, $role7]);
        Permission::create(['name' => 'permisos', 'description' => 'Permisos'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.compania.index', 'description' => 'Ver listado de compañías'])->syncRoles($role1);
        Permission::create(['name' => 'admin.compania.create', 'description' => 'Crear compañía'])->syncRoles($role1);
        Permission::create(['name' => 'admin.compania.edit', 'description' => 'Editar compañía'])->syncRoles($role1);
        Permission::create(['name' => 'admin.compania.destroy', 'description' => 'Eliminar compañía'])->syncRoles($role1);

        Permission::create(['name' => 'admin.localizaciones.index', 'description' => 'Ver listado de localizaciones'])->syncRoles($role1);
        Permission::create(['name' => 'admin.localizaciones.create', 'description' => 'Crear localización'])->syncRoles($role1);
        Permission::create(['name' => 'admin.localizaciones.edit', 'description' => 'Editar localización'])->syncRoles($role1);
        Permission::create(['name' => 'admin.localizaciones.destroy', 'description' => 'Eliminar localización'])->syncRoles($role1);

        Permission::create(['name' => 'admin.documentos.index', 'description' => 'Ver listado de documentos'])->syncRoles($role1);
        Permission::create(['name' => 'admin.documentos.create', 'description' => 'Crear documento'])->syncRoles($role1);
        Permission::create(['name' => 'admin.documentos.edit', 'description' => 'Editar documento'])->syncRoles($role1);
        Permission::create(['name' => 'admin.documentos.destroy', 'description' => 'Eliminar documento'])->syncRoles($role1);

        Permission::create(['name' => 'proveedor.evento.index', 'description' => 'Ver eventos'])->syncRoles($role8);
    }
}
