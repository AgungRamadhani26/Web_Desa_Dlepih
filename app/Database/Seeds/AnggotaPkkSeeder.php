<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time; //biar bisa gunain fungsi time

use CodeIgniter\Database\Seeder;

class AnggotaPkkSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_anggota_pkk' => 1,
                'nama_dan_gelar' => 'Putri Wulandary',
                'jabatan'        => 'Ketua',
                'nik'            => '3333041001900001',
                'no_kk'          => '1111041001900001',
                'alamat'         => 'jl. Pisang Raja selatan',
                'no_wa'          => '085678989222',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'id_anggota_pkk' => 2,
                'nama_dan_gelar' => 'Alisha Nazwa Putri',
                'jabatan'        => 'Anggota',
                'nik'            => '3333041001900002',
                'no_kk'          => '1111041001900002',
                'alamat'         => 'jl. Anggur Merah Barat',
                'no_wa'          => '082268989222',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ]
        ];
        $this->db->table('anggota_pkk')->insertBatch($data);
    }
}
