<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('Password1'),
            'usertype' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'superadmin1',
            'email' => 'superadmin1@gmail.com',
            'password' => Hash::make('Password1'),
            'usertype' => 'superadmin',
        ]);

        User::factory()->create([
            'name' => 'student1',
            'email' => 'student1@gmail.com',
            'password' => Hash::make('Password1'),
            'usertype' => 'student',
        ]);

        User::factory()->create([
            'name' => 'faculty1',
            'email' => 'faculty1@gmail.com',
            'password' => Hash::make('Password1'),
            'usertype' => 'faculty',
        ]);
    }
}
