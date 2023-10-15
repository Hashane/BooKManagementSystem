<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create an admin
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('abc@123'),
        ]);

        $admin->assignRole('admin');

        // Create sample users and assigning roles
        for ($i = 1; $i <= 5; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('abc@123'),
            ]);

            // Assign roles based on a conditions
            if ($i % 2 === 0) {
                $user->assignRole('editor');
            } else {
                $user->assignRole('viewer');
            }
        }

        // Create sample users and assigning roles
        for ($i = 1; $i <= 10; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('abc@123'),
            ]);
            $user->assignRole('reader');
        }
    }
}
