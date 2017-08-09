<?php

use Illuminate\Database\Seeder;
use App\StoreConfig;
class StoreConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$storeConfig = new StoreConfig();
    	$storeConfig->name = 'Jájki MX';
    	$storeConfig->path = 'logo-jajki.png';
    	$storeConfig->facebook = 'https://www.facebook.com/JajkiMX/';
    	$storeConfig->twitter = 'https://twitter.com/JajkiMX/';
    	$storeConfig->instagram = 'https://www.instagram.com/JajkiMX/';
    	$storeConfig->contact_email = 'jajkimex@gmail.com';
    	$storeConfig->phone = '0000000000';

    	$storeConfig->save();
    }
}
