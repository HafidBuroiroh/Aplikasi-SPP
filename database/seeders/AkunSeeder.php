<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AkunSeeder extends Seeder
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
                'username' => 'AdminStarbhak1',
                'level' => 'admin',
                'nama_petugas' => 'Eka Sulia',
                'password' => bcrypt('adminstarbhak1'),
            ],
            [
                'username' => 'SiswaTb1',
                'level' => 'siswa',
                'nama_petugas' => 'Jenk Slebew',
                'password' => bcrypt('siswatb1'),
            ],
            [
                'username' => 'AdminStarbhak2',
                'level' => 'Admin',
                'nama_petugas' => 'Muhammad Dika',
                'password' => bcrypt('adminstarbhak2'),
            ],
            [
                'username' => 'PetugasStarbhak',
                'level' => 'petugas',
                'nama_petugas' => 'Minwa Hulinia',
                'password' => bcrypt('petugasstarbhak'),
            ]
        ];

        foreach ($users as $key => $value){
            Petugas::create($value);
        }
    }
}
