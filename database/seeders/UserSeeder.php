<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = [
            ['type_user_id' => 1,
            'name'=> 'Dev',
            'last_name'=>'User',
            'email'=>'admin@DP.com',
            'password'=> bcrypt('admindev2020'),
            'phone'=>'9992971153',
            'nickname'=>'admin',
            'RFC'=>'XXXXXX',
            'birthdate'=>'21-11-1993',
        ],
        ['type_user_id' => 2,
            'name'=> 'Cliente',
            'last_name'=>'User',
            'email'=>'cliente@DP.com',
            'password'=> bcrypt('admindev2020'),
            'phone'=>'9992971153',
            'nickname'=>'cliente',
            'RFC'=>'XXXXdesXX',
            'birthdate'=>'21-11-1993',
        ],
        ];

      foreach($adminUser as $admin)
      {
            \DB::table('users')->insert($admin);
        }
    }
}
