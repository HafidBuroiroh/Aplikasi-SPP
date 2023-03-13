<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username' => 'Irfan Julianto',
                'level' => 'admin',
                'email' => 'adminstarbhak1@gmail.com',
                'password' => bcrypt('adminstarbhak1'),
            ],
            [
                'username' => 'Maulana Wahid',
                'level' => 'Admin',
                'email' => 'adminstarbhak2@gmail.com',
                'password' => bcrypt('adminstarbhak2'),
            ],
            [
                'username' => 'Asep Suhendar',
                'level' => 'petugas',
                'email' => 'petugasstarbhak@gmail.com',
                'password' => bcrypt('petugasstarbhak'),
            ]
        ];

        foreach ($users as $key => $value){
            User::create($value);
        }
    }
}
