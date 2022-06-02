<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = [
            ['name' => 'Norte', 'ubication' => 'Norte'],
            ['name' => 'Centro', 'ubication' => 'Centro'],
            ['name' => 'Pensiones', 'ubication' => 'Pensiones'],
        ];

      foreach($adminUser as $admin)
      {
            \DB::table('restaurants')->insert($admin);
        }
    }
}
