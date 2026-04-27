<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'manage categories',
            'manage books',
            'manage staff',
            'manage members',
            'process loans',
            'process returns',
            'create reviews',
            'view reports',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        $roleAdmin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $roleAdmin->syncPermissions(Permission::all()); 

        $roleStaff = Role::firstOrCreate(['name' => 'staff', 'guard_name' => 'web']);
        $roleStaff->syncPermissions([
            'manage books',
            'manage members',
            'process loans',
            'process returns',
        ]);

        $roleMember = Role::firstOrCreate(['name' => 'member', 'guard_name' => 'web']);
        $roleMember->syncPermissions(['create reviews']);
    }
}