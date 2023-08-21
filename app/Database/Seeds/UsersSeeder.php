<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time; //biar bisa gunain fungsi time

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_user'        => 1,
                'nama_dan_gelar' => 'Agung Ramadhani, S.Kom',
                'email'          => 'agungramadhani2611@gmail.com',
                'password'       => md5('12345678'),
                'no_wa'          => '082370708349',
                'foto'           => 'admin_agung.png',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'id_user'        => 2,
                'nama_dan_gelar' => 'Dewi Sartika, S.Kom',
                'email'          => 'dewisartika@gmail.com',
                'password'       => md5('12345678'),
                'no_wa'          => '085156789012',
                'foto'           => 'dewi.png',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
        ];
        $this->db->table('users')->insertBatch($data);
    }
}
