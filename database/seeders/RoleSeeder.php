<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['name' => 'Super Admin', 'description' => 'Has access to all system features and settings.'],
            ['name' => 'Admin', 'description' => 'Can manage most of the system features but has limited access to critical settings.'],
            ['name' => 'User', 'description' => 'Regular user with access to basic features.'],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(['name' => $role['name']], $role);
        }
    }
}
