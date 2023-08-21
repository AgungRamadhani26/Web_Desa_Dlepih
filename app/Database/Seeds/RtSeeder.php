<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time; //biar bisa gunain fungsi time

use CodeIgniter\Database\Seeder;

class RtSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_rt'          => 1,
                'id_rw'          => 1,
                'nama_dan_gelar' => 'Ahmad Muhadjir',
                'nik'            => '3336641001900001',
                'no_kk'          => '1116041001900001',
                'alamat'         => 'jl. Dlepih selatan',
                'no_wa'          => '085678789000',
                'nama_rt'        => '1',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'id_rt'          => 2,
                'id_rw'          => 2,
                'nama_dan_gelar' => 'Sartono Hadiwaseso',
                'nik'            => '3336641001900002',
                'no_kk'          => '1116041001900002',
                'alamat'         => 'jl. Dlepih selatan',
                'no_wa'          => '08567800066',
                'nama_rt'        => '2',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ]
        ];
        $this->db->table('rt')->insertBatch($data);
    }
}
