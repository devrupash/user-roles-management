<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Role::create([
            'name' => 'admin',
            'description' => 'Administrator role with full permissions',
        ]);

        Role::create([
            'name' => 'editor',
            'description' => 'Editor role with content management permissions',
        ]);

        Role::create([
            'name' => 'author',
            'description' => 'Author role with content creation permissions',
        ]);

        Role::create([
            'name' => 'user',
            'description' => 'Standard user role with limited permissions',
        ]);

    }
}
