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
                'password' => bcrypt('320')

            ],

        ];
        foreach ($presensi as $key => $val){
            User::create($val);
        }
    }
}
