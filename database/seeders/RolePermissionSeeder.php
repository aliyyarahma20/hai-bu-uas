<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $permissions = [
            'view modules',
            'create modules',
            'edit modules',
            'delete modules',
        ];

        foreach($permissions as $permission){
            Permission::create([
                'name' => $permission
            ]);
        }

        $adminRole = Role::create([
            'name' => 'admin'
        ]);

        $adminRole->givePermissionTo([
            'view modules',
            'create modules',
            'edit modules',
            'delete modules'
        ]);

        $studentRole = Role::create([
            'view modules',
        ]);

        // superadmin
        $user = User::create([
            'name' => 'Treece',
            'email' => 'daughterofzain@gmail.com',
            'password' => bcrypt('1223334444')
        ]);

        $user->assignRole($adminRole);
    }
}
