<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // Crear un usuario admin
                User::factory()->create([
                    'name' => 'Admin User',
                    'email' => 'admin@test.com',
                    'password' => bcrypt('admin1234'),
                    'usertype' => 'admin',
                ]);
        
                // Crear un usuario regular
                User::factory()->create([
                    'name' => 'User',
                    'email' => 'user@test.com',
                    'password' => bcrypt('user1234'),
                    'usertype' => 'user',
                ]);
    }
}
