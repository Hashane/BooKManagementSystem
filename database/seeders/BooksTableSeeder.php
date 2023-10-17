<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Staff;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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
                'count' => $faker->numberBetween(1, 19),
                'publication_year' => $faker->year(),
            ]);
        }
    }
}
