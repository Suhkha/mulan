<?php

use Illuminate\Database\Seeder;
use App\Admin;
use Faker\Factory as Faker;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $main_admin = new Admin();
            $main_admin->name = "Admin";
            $main_admin->email = "admin@newsite.com";
            $main_admin->password = crypt("hands", "");
            $main_admin->save();

    }
}
