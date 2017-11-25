<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [[
            'name' => "adal",
            'nombres' => "Adal",
            'apellidos' => "Garcia",
            'cedula' => "2411904960005s",
            'fecha_registro' => "2017-11-01 00:00:00",
            'email' => "adal@gmail.com",
            'password' => bcrypt('contra'),
            'tipo' => 0,
        ],

        [
            'name' => "alvaro",
            'nombres' => "Alvaro",
            'apellidos' => "Chavez",
            'cedula' => "2411904960005s",
            'fecha_registro' => "2017-11-01 00:00:00",
            'email' => "alvaro@gmail.com",
            'password' => bcrypt('contra'),
            'tipo' => 0,
        ],

        [
            'name' => "mason",
            'nombres' => "Mason",
            'apellidos' => "Urbina",
            'cedula' => "2411904960005s",
            'fecha_registro' => "2017-11-01 00:00:00",
            'email' => "mason@gmail.com",
            'password' => bcrypt('contra'),
            'tipo' => 0,
        ],

        [
            'name' => "gerald",
            'nombres' => "Gerald",
            'apellidos' => "Sandoval",
            'cedula' => "2411904960005s",
            'fecha_registro' => "2017-11-01 00:00:00",
            'email' => "gerald@gmail.com",
            'password' => bcrypt('contra'),
            'tipo' => 0,
        ]

    	];

    	User::insert($users);
    }
}
