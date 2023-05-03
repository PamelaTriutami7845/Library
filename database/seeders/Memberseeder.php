<?php

namespace Database\Seeders;

use App\Models\Member;
use Faker\Factory as faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Memberseeder extends Seeder
{
    public function run()
    {
        //

        $faker = faker::create();

        $gender = $faker->randomElement(['male', 'female']);

        for ($i = 0; $i < 20; $i++) {
            $member = new Member();

            $member->name = $faker->name;
            $member->gender = $gender;
            $member->phone_number = '0821' . $faker->randomNumber(8);
            $member->address = $faker->address;
            $member->email = $faker->email;

            $member->save();
        }
    }
}
