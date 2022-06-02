<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UbicationTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = [
            //Norte Ventana
            ['restaurant_id' => 1, 'ubication_zone_id' => 1,'table_number'=>1,'status'=>false],
            ['restaurant_id' => 1, 'ubication_zone_id' => 1,'table_number'=>2,'status'=>false],
            ['restaurant_id' => 1, 'ubication_zone_id' => 1,'table_number'=>3,'status'=>false],
            ['restaurant_id' => 1, 'ubication_zone_id' => 1,'table_number'=>4,'status'=>false],
            ['restaurant_id' => 1, 'ubication_zone_id' => 1,'table_number'=>5,'status'=>false],

            //Norte Pasillo
            ['restaurant_id' => 1, 'ubication_zone_id' => 2,'table_number'=>6,'status'=>false],
            ['restaurant_id' => 1, 'ubication_zone_id' => 2,'table_number'=>7,'status'=>false],
            ['restaurant_id' => 1, 'ubication_zone_id' => 2,'table_number'=>8,'status'=>false],
            ['restaurant_id' => 1, 'ubication_zone_id' => 2,'table_number'=>9,'status'=>false],
            ['restaurant_id' => 1, 'ubication_zone_id' => 2,'table_number'=>10,'status'=>false],
            ['restaurant_id' => 1, 'ubication_zone_id' => 2,'table_number'=>11,'status'=>false],
            ['restaurant_id' => 1, 'ubication_zone_id' => 2,'table_number'=>12,'status'=>false],

            //Norte Jardin
            ['restaurant_id' => 1, 'ubication_zone_id' => 3,'table_number'=>13,'status'=>false],
            ['restaurant_id' => 1, 'ubication_zone_id' => 3,'table_number'=>14,'status'=>false],
            ['restaurant_id' => 1, 'ubication_zone_id' => 3,'table_number'=>15,'status'=>false],

            //Centro Ventana
            ['restaurant_id' => 2, 'ubication_zone_id' => 1,'table_number'=>1,'status'=>false],
            ['restaurant_id' => 2, 'ubication_zone_id' => 1,'table_number'=>2,'status'=>false],
            ['restaurant_id' => 2, 'ubication_zone_id' => 1,'table_number'=>3,'status'=>false],
            ['restaurant_id' => 2, 'ubication_zone_id' => 1,'table_number'=>4,'status'=>false],
            ['restaurant_id' => 2, 'ubication_zone_id' => 1,'table_number'=>5,'status'=>false],
            ['restaurant_id' => 2, 'ubication_zone_id' => 1,'table_number'=>6,'status'=>false],
            ['restaurant_id' => 2, 'ubication_zone_id' => 1,'table_number'=>7,'status'=>false],

            //Centro Pasillo
            ['restaurant_id' => 2, 'ubication_zone_id' => 2,'table_number'=>8,'status'=>false],
            ['restaurant_id' => 2, 'ubication_zone_id' => 2,'table_number'=>9,'status'=>false],
            ['restaurant_id' => 2, 'ubication_zone_id' => 2,'table_number'=>10,'status'=>false],
            ['restaurant_id' => 2, 'ubication_zone_id' => 2,'table_number'=>11,'status'=>false],

            //Centro Jardin
            ['restaurant_id' => 2, 'ubication_zone_id' => 3,'table_number'=>12,'status'=>false],
            ['restaurant_id' => 2, 'ubication_zone_id' => 3,'table_number'=>13,'status'=>false],
            ['restaurant_id' => 2, 'ubication_zone_id' => 3,'table_number'=>14,'status'=>false],
            ['restaurant_id' => 2, 'ubication_zone_id' => 3,'table_number'=>15,'status'=>false],

            //Pensiones Ventana
            ['restaurant_id' => 3, 'ubication_zone_id' => 1,'table_number'=>10,'status'=>false],
            ['restaurant_id' => 3, 'ubication_zone_id' => 1,'table_number'=>11,'status'=>false],
            ['restaurant_id' => 3, 'ubication_zone_id' => 1,'table_number'=>12,'status'=>false],
            ['restaurant_id' => 3, 'ubication_zone_id' => 1,'table_number'=>13,'status'=>false],
            ['restaurant_id' => 3, 'ubication_zone_id' => 1,'table_number'=>14,'status'=>false],
            ['restaurant_id' => 3, 'ubication_zone_id' => 1,'table_number'=>15,'status'=>false],

            //Pensiones Pasillo
            ['restaurant_id' => 3, 'ubication_zone_id' => 2,'table_number'=>4,'status'=>false],
            ['restaurant_id' => 3, 'ubication_zone_id' => 2,'table_number'=>5,'status'=>false],
            ['restaurant_id' => 3, 'ubication_zone_id' => 2,'table_number'=>6,'status'=>false],
            ['restaurant_id' => 3, 'ubication_zone_id' => 2,'table_number'=>7,'status'=>false],
            ['restaurant_id' => 3, 'ubication_zone_id' => 2,'table_number'=>8,'status'=>false],
            ['restaurant_id' => 3, 'ubication_zone_id' => 2,'table_number'=>9,'status'=>false],

            //Pensiones Jardin
            ['restaurant_id' => 3, 'ubication_zone_id' => 3,'table_number'=>1,'status'=>false],
            ['restaurant_id' => 3, 'ubication_zone_id' => 3,'table_number'=>2,'status'=>false],
            ['restaurant_id' => 3, 'ubication_zone_id' => 3,'table_number'=>3,'status'=>false],

        ];

      foreach($adminUser as $admin)
      {
            \DB::table('ubication_tables')->insert($admin);
        }
    }
}
