<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(DataMenuSeeder::class);
        $this->call(TypeUserSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(HoursSeeder::class);
        $this->call(RestaurantSeeder::class);
        $this->call(UbicationZoneSeeder::class);
        $this->call(UbicationTablesSeeder::class);
    }
}
