<?php

namespace Database\Seeders;

use App\Models\Catalog;
use Faker\Factory as faker;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = faker::create();

        for ($i=0; $i < 5; $i++) { 
            $catalog = new catalog;
            $catalog->name = $faker->words(1, true);

            $catalog->save();
        }
    }
}
