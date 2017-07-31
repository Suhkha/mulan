<?php

use Illuminate\Database\Seeder;
use App\Category;
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder
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
            $category = new Category();
            $category->name = $faker->word;
            $category->status = 1;

            $category->save();
        }
    }
}
