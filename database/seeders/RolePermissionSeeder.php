<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User as AuthUser;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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

        // Ubah create menjadi firstOrCreate untuk permissions
        foreach($permissions as $permission){
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }

        $adminRole = Role::firstOrCreate([
            'name' => 'admin'
        ]);

        $adminRole->givePermissionTo([
            'view modules',
            'create modules',
            'edit modules',
            'delete modules'
        ]);

        $studentRole = Role::firstOrCreate([
            'name' => 'student'
        ]);

        $studentRole->givePermissionTo([
            'view modules'
        ]);

        // Ubah create menjadi firstOrCreate untuk user
        $user = User::firstOrCreate(
            ['email' => 'daughterofzain@gmail.com'],
            [
                'name' => 'Treece',
                'password' => bcrypt('1223334444'),
                'photos' => 'produc_photos/profile.jpg',
            ]
        );

        $user->assignRole($adminRole);
    }
}