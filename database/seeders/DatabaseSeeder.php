<?php

namespace Database\Seeders;

use App\Models\Place;
use App\Models\Location;
use App\Models\LocationPhotos;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            "name" => "admin",
            "email" => "admin@admin.com",
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi"
        ]);
        \App\Models\User::factory(10)->create();
        Place::create([
            "name" => "Roma",
            "region" => "lazio",
            "region_code" => "RM",
            "country_code" => "it",
            "post_code" => "00118",
            "longitude" => 12.4853,
            "latitude" => 41.8948,
        ]);
        Location::factory(10)->create()->each(function($loc){
            $loc->images()->saveMany(
                LocationPhotos::factory(5)->create(['location_id' => $loc->id])
            );
        });
        
     
    }
}
