<?php

use Illuminate\Database\Seeder;
use App\Artisan;
use Faker\Factory as Faker;

class ArtisansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=1; $i < 4; $i++) {
            $artisan = new Artisan();
            $artisan->name = $faker->name;
            $artisan->photo = 'demo.jpg';
            $artisan->bio = $faker->text($maxNbChars = 200);
            $artisan->bio_english = $faker->text($maxNbChars = 200);
            $artisan->artisan_of_month = 0;
            
            $artisan->save();
        }
    }
}
