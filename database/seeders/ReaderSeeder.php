<?php

namespace Database\Seeders;

use App\Models\Reader;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class ReaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create sample reader users
        for ($i = 1; $i <= 10; $i++) {
            $user = Reader::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('abc@123'),
            ]);
            $user->assignRole('reader');
        }
    }
}
