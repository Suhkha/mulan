<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=1; $i < 30; $i++) {
            $user = new User();
            $user->name = $faker->name;
            $user->email = $faker->safeEmail;
            $user->password = crypt("hands2017", "");

            $user->save();
        }
    }
}
