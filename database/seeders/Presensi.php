<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Presensi extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $presensi = [
            [
                'nik' => '320',
                'name' => 'Alex',
                'email' => 'alex@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('12345')

            ],
            [
                'nik' => '627',
                'name' => 'Iki',
                'email' => 'iki@gmail.com',
                'role' => 'user',
                'password' => bcrypt('395')

            ],
            [
                'nik' => '030',
                'name' => 'Ozan',
                'email' => 'ozan@gmail.com',
                'role' => 'user',
                'password' => bcrypt('123123')

            ]

        ];
        foreach ($presensi as $key => $val){
            User::create($val);
        }
    }
}
