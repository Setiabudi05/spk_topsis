<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionList = [
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

        for ($i = 0; $i < count($permissionList); $i++) {
            Permission::updateOrCreate([
                'id' => ($i + 1),
            ], [
                'name' => $permissionList[$i],
            ]);
        }
    }
}
