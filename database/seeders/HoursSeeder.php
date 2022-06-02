<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = [
            ['in' => '13:00:00', 'out' => '14:00:00'],
            ['in' => '14:00:00', 'out' => '15:00:00'],
            ['in' => '15:00:00', 'out' => '16:00:00'],
            ['in' => '16:00:00', 'out' => '17:00:00'],
            ['in' => '17:00:00', 'out' => '18:00:00'],
            ['in' => '18:00:00', 'out' => '19:00:00'],
            ['in' => '19:00:00', 'out' => '20:00:00'],
            ['in' => '20:00:00', 'out' => '21:00:00'],
            ['in' => '21:00:00', 'out' => '22:00:00'],
        ];

      foreach($adminUser as $admin)
      {
            \DB::table('table_hours')->insert($admin);
        }
    }
}
