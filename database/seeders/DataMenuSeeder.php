<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Schema::disableForeignKeyConstraints();
        \DB::table('data_menus')->truncate();
        \Schema::enableForeignKeyConstraints();
        $menus = [
            ['name'=> 'Home','icon'=> 'fas fa-tachometer-alt','link'=>'/home','prioridad'=> '1','active'=> 1,],
            ['name'=> 'Users','icon'=> 'fas fa-users','link'=>'/users','prioridad'=> '1','active'=> 2,],
        ];

      foreach($menus as $menu){
            \DB::table('data_menus')->insert($menu);
                        }
    }
}
