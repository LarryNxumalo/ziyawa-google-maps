<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create locations entries
        DB::table('locations')->insert([
            'name' => 'At Home',
            'address' => '114 Summerfields',
            'city' => 'Centurion',
            'state' => 'GP',
            'hours' => '9:00am-6:00pm',
            'latitude' => -25.9176,
            'longitude' => 28.1258,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('locations')->insert([
            'name' => 'Pick n Pay The Reeds',
            'address' => 'Cnr Bothrill Ave & Rooihuiskraal Rd, Blu Valley Mall, The Reeds, Centurion, 0157',
            'city' => 'Centurion',
            'state' => 'GP',
            'hours' => '7:00am-8:00pm',
            'latitude' => -25.9257,
            'longitude' => 28.1061,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('locations')->insert([
            'name' => 'Woolworths Kyalami',
            'address' => 'R55 & M71, Kyalami Hills, Midrand, 1684',
            'city' => 'Midrand',
            'state' => 'GP',
            'hours' => '8:00am-6:00pm',
            'latitude' => -25.9792,
            'longitude' => 28.0730,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('locations')->insert([
            'name' => 'Woolworths Blue Hills',
            'address' => 'Shop 3, Blue Hills Shopping Centre, Olifants Road & African View Drive, Midrand, 1687',
            'city' => 'Midrand',
            'state' => 'GP',
            'hours' => '8:00am-6:00pm',
            'latitude' => -25.9453,
            'longitude' => 28.1056,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
