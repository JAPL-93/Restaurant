<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
       * Run the database seeds.
       *
       * @return void
       */
      \Schema::disableForeignKeyConstraints();
      \DB::table('type_user_details')->truncate();
      \DB::table('type_users')->truncate();
      \Schema::enableForeignKeyConstraints();



        $types = [
                      ['mat'=> 'TYU','name'=> 'Owner Administrator','active'=> 1,],
                      ['mat'=> 'TYU','name'=> 'Cliente','active'=> 1,],

                    ];

        foreach($types as $type){
                \DB::table('type_users')->insert($type);
            }
            $tu_prof = [
                //Administrador Dueño
                  ['type_user_id'=> 1,'data_menu_id'=> 1,'active'=> 1,],
                  ['type_user_id'=> 1,'data_menu_id'=> 2,'active'=> 1,],


                //Cleinte
                ['type_user_id'=> 2,'data_menu_id'=> 1,'active'=> 1,],

                //Administrador
                 /* ['type_user_id'=> 2,'data_menu_id'=> 1,'active'=> 1,],
                  ['type_user_id'=> 2,'data_menu_id'=> 4,'active'=> 1,],
                  ['type_user_id'=> 2,'data_menu_id'=> 5,'active'=> 1,],
                  ['type_user_id'=> 2,'data_menu_id'=> 6,'active'=> 1,],
                  ['type_user_id'=> 2,'data_menu_id'=> 7,'active'=> 1,],
                  ['type_user_id'=> 2,'data_menu_id'=> 8,'active'=> 1,],
                  ['type_user_id'=> 2,'data_menu_id'=> 9,'active'=> 1,],
                  ['type_user_id'=> 2,'data_menu_id'=> 10,'active'=> 1,],
                  ['type_user_id'=> 2,'data_menu_id'=> 11,'active'=> 1,],
                  ['type_user_id'=> 2,'data_menu_id'=> 12,'active'=> 1,],
                  ['type_user_id'=> 2,'data_menu_id'=> 15,'active'=> 1,],

               //IT
                  ['type_user_id'=> 3,'data_menu_id'=> 1,'active'=> 1,],
                  ['type_user_id'=> 3,'data_menu_id'=> 6,'active'=> 1,],
                  ['type_user_id'=> 3,'data_menu_id'=> 7,'active'=> 1,],
                  ['type_user_id'=> 3,'data_menu_id'=> 9,'active'=> 1,],
                  ['type_user_id'=> 3,'data_menu_id'=> 13,'active'=> 1,],
                  ['type_user_id'=> 3,'data_menu_id'=> 15,'active'=> 1,],

               //HR
                  ['type_user_id'=> 4,'data_menu_id'=> 1,'active'=> 1,],
                  ['type_user_id'=> 4,'data_menu_id'=> 6,'active'=> 1,],
                  ['type_user_id'=> 4,'data_menu_id'=> 7,'active'=> 1,],
                  ['type_user_id'=> 4,'data_menu_id'=> 9,'active'=> 1,],

                //IT-New
                  ['type_user_id'=> 5,'data_menu_id'=> 1,'active'=> 1,],
                  ['type_user_id'=> 5,'data_menu_id'=> 13,'active'=> 1,],
                  ['type_user_id'=> 5,'data_menu_id'=> 15,'active'=> 1,], */

                ];

            foreach($tu_prof as $tu_prof){
              \DB::table('type_user_details')->insert($tu_prof);
            }
    }
}
