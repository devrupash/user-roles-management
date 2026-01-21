<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]); 

        User::factory()->create([
            'name' => 'Rupash',
            'email' => 'rupash.das.202@gmail.com',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Author',
            'email' => 'author@example.com',
            'password' => bcrypt('password'),
        ]);

        User::factory(10)->create();

        $this->call(RoleSeeder::class);

        $admin = User::find(1);
        $admin->roles()->attach(1);

        $editor = User::find(2);
        $editor->roles()->attach(2);

        $author = User::find(3);
        $author->roles()->attach(3);

        $users = User::whereNotIn('id', [1, 2, 3])->get();
        foreach ($users as $user) {
            $user->roles()->attach(4);
        }
        
    }
}
