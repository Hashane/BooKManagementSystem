<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\BookCopy;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BookCopySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Retrieve existing books
        $books = Book::all();

        $faker = Faker::create();

        foreach ($books as $book) {
            // Create multiple book copies for each book
            for ($i = 1; $i <= 5; $i++) {
                BookCopy::create([
                    'book_id' => $book->id,
                    'copy_number' => 'BK-' . $i,
                    'condition' => 'Good', // Set the condition
                    'status' => $faker->boolean(),
                ]);
            }
        }
    }
}
