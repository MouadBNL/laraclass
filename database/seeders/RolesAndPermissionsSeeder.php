<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'crud users']);
        Permission::create(['name' => 'crud courses']);
        Permission::create(['name' => 'crud subjects']);
        Permission::create(['name' => 'crud levels']);


        // prof role
        $profRole = Role::create(['name' => 'prof'])
                        ->givePermissionTo('crud courses');
        
        // admin role
        $adminRole = Role::create(['name' => 'admin'])
                        ->givePermissionTo(Permission::all());
    }
}
