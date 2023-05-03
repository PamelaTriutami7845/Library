<?php

namespace Database\Seeders;

use App\Models\book;
use Faker\Factory as faker;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker::create();

        for ($i=0; $i < 20; $i++) { 
            $book = new book;

            $book->isbn = $faker->numerify('#############');
            $book->title = $faker->words(rand(1,3), true);
            $book->year = $faker->date('Y');
            $book->publisher_id = 1;
            $book->author_id = 1;
            $book->catalog_id = 1;
            $book->qty = rand(1,10);
            $book->price = 10000;

            $book->save();
        }
    }
}
