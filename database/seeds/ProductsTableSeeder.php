<?php

use Illuminate\Database\Seeder;
use App\Product;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=1; $i < 10; $i++) {
            $product = new Product();
            $product->artisan_id = $faker->numberBetween(1,3);
            $product->category_id = $faker->numberBetween(1,3);
            $product->name = $faker->word;
            $product->description = $faker->text($maxNbChars = 200);
            $product->description_english = $faker->text($maxNbChars = 200);
            $product->stock = $faker->numberBetween($min = 5, $max = 10);
            $product->price_mxn = $faker->randomNumber(2);
            $product->price_usd = $faker->randomNumber(2);
            $product->status = 1;
            
            $product->save();
        }
    }
}
