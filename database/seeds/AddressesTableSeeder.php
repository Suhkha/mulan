<?php

use Illuminate\Database\Seeder;
use App\Address;
use Faker\Factory as Faker;

class AddressesTableSeeder extends Seeder
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
            $address = new Address();
            $address->user_id = $faker->numberBetween(1,29);
            $address->name = $faker->name." - house";
            $address->phone = $faker->phoneNumber;
            $address->address_1 = $faker->streetName." ".$faker->buildingNumber;
            $address->address_2 = $faker->secondaryAddress; 
            $address->zip =  $faker->postcode;
            $address->city = $faker->city;
            $address->state = $faker->state;
            $address->country = $faker->country;
            
            $address->save();
        }
    }
}
