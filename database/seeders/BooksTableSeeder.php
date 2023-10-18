<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Staff;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;


class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            // Create a Reader record with a random User ID
            Book::create([
                'title' => $faker->sentence,
                'author' => $faker->name,
                'genre' => $faker->randomElement(['Fiction', 'Science Fiction', 'Mystery', 'Romance', 'Fantasy', 'Non-Fiction']),
                'publication_year' => $faker->year(),
                'description' => Str::limit($faker->paragraph, 200),
                'count' => $faker->numberBetween(1, 20),
            ]);
        }
    }
}
