<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $permissions = Permission::select('name')->get();
        foreach ($permissions as $permission) {
            $rolePermissions[] = $permission->name;
        }

        $superadmin = [
            'dashboard view',
            'user create',
            'user view',
            'user edit',
            'user delete',
            'kriteria create',
            'kriteria view',
            'kriteria edit',
            'kriteria delete',
        ];
        $admin = [
            'dashboard view',
            'user create',
            'user view',
            'user edit',
            'kriteria create',
            'kriteria view',
            'kriteria edit',
        ];
        $umum = [
            'kriteria edit',
        ];


        $role = [
            '1' => [
                'Superadmin', $superadmin
            ],
            '2' => [
                'Admin', $admin,
            ],
            '3' => [
                'Umum', $umum,
            ],
        ];

        foreach ($role as $key => $value) {
            $role = Role::updateOrCreate([
                'id'    => $key,
            ], [
                'name' => $value[0],
            ]);
            $role->syncPermissions($value[1]);
            // $role->syncPermissions($rolePermissions);
        }
    }
}
