<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view all appartement']);
        Permission::create(['name' => 'view my appartement']);
        Permission::create(['name' => 'edit my appartement']);
        Permission::create(['name' => 'edit all appartement']);
        Permission::create(['name' => 'delete my appartement']);
        Permission::create(['name' => 'delete all appartement']);
        Permission::create(['name' => 'view all profil']);
        Permission::create(['name' => 'delete all profil']);
        Permission::create(['name' => 'view my reservation']);
        Permission::create(['name' => 'view all reservation']);  

        // create roles and assign created permissions

        Role::create(['name' =>'admin'])->givePermissionTo(Permission::all());
        // or may be done by chaining
        Role::create(['name' =>'user'])->givePermissionTo(['view my appartement','edit my appartement','delete my appartement','view my reservation']);

    }
}