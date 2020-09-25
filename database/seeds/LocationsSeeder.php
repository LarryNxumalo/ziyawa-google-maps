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
            'avatar' => 'https://randomuser.me/api/portraits/men/1.jpg',
            'name' => 'Larry Nxumalo',
            'address' => 'Taboo Night Club',
            'city' => 'Sandton',
            'state' => 'GP',
            'hours' => '9:00am-6:00pm',
            'latitude' => -26.1017085,
            'longitude' => 28.0105711,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('locations')->insert([
            'avatar' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTgxMTc1MTYzM15BMl5BanBnXkFtZTgwNzI5NjMwOTE@._V1_UY256_CR16,0,172,256_AL_.jpg',
            'name' => 'Papa Penny',
            'address' => 'Cnr Bothrill Ave & Rooihuiskraal Rd, Blu Valley Mall, The Reeds',
            'city' => 'Centurion',
            'state' => 'GP',
            'hours' => '7:00am-8:00pm',
            'latitude' => -25.9257,
            'longitude' => 28.1061,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('locations')->insert([
            'avatar' => 'https://images.unsplash.com/photo-1511485977113-f34c92461ad9?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ',
            'name' => 'Jane Doe',
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
            'avatar' => 'https://images.generated.photos/qmdENySIv23bkva-PxTHsoxVbZQdB1Wka0ZPcH5shHY/rs:fit:512:512/Z3M6Ly9nZW5lcmF0/ZWQtcGhvdG9zL3Yy/XzAzMDE4MzAuanBn.jpg',
            'name' => 'Zodwa Wabantu',
            'address' => 'Blue Hills Shopping Centre, Olifants Road & African View Drive',
            'city' => 'Midrand',
            'state' => 'GP',
            'hours' => '8:00am-6:00pm',
            'latitude' => -25.9465,
            'longitude' => 28.1056,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
