<?php

namespace Database\Seeders;

use App\Models\publisher;
use Faker\Factory as faker;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    public function run()
    {
        $faker = faker::create();

        for ($i = 0; $i < 20; $i++) {
            $publisher = new publisher();

            $publisher->name = $faker->name;
            $publisher->email = $faker->email;
            $publisher->phone_number = '0821' . $faker->randomNumber(8);
            $publisher->address = $faker->address;

            $publisher->save();
        }
    }
}
