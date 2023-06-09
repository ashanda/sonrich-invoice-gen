<?php

namespace Database\Seeders;

  

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

use App\Models\User;

  

class CreateUsersSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run(): void

    {

        $users = [

            [

               'name'=>'Admin',

               'email'=>'admin@admin.com',

               'type'=>1,

               'password'=> bcrypt('123456'),

            ],

            [

                'name'=>'Delivery Department',
 
                'email'=>'deliver@deliver.com',
 
                'type'=> 3,
 
                'password'=> bcrypt('123456'),
 
             ],
            [

               'name'=>'Account Department',

               'email'=>'account@account.com',

               'type'=> 2,

               'password'=> bcrypt('123456'),

            ],

            [

               'name'=>'Agent',

               'email'=>'agent@agent.com',

               'type'=>0,

               'password'=> bcrypt('123456'),

            ],

        ];

    

        foreach ($users as $key => $user) {

            User::create($user);

        }

    }

}