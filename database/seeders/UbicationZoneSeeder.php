<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UbicationZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = [
            ['name' => 'Ventana'],
            ['name' => 'Pasillo'],
            ['name' => 'Jardin'],
        ];

      foreach($adminUser as $admin)
      {
            \DB::table('ubication_zones')->insert($admin);
        }
    }
}
