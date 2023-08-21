<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time; //biar bisa gunain fungsi time

use CodeIgniter\Database\Seeder;

class AnggotaBumdesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_anggota_bumdes' => 1,
                'nama_dan_gelar'    => 'Mamat Sowandri',
                'jabatan'           => 'Direktur',
                'nik'               => '3336041001900001',
                'no_kk'             => '1116041001900001',
                'alamat'            => 'jl. Pisang Kecil',
                'no_wa'             => '082399989222',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'id_anggota_bumdes' => 2,
                'nama_dan_gelar'    => 'Alfred Immanuel Batuara',
                'jabatan'           => 'Penasihat',
                'nik'               => '3336041001900002',
                'no_kk'             => '1116041001900002',
                'alamat'            => 'jl. Jeruk Purut',
                'no_wa'             => '082268555555',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ]
        ];
        $this->db->table('anggota_bumdes')->insertBatch($data);
    }
}
