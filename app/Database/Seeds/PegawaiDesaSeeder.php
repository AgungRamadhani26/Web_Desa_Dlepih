<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time; //biar bisa gunain fungsi time

use CodeIgniter\Database\Seeder;

class PegawaiDesaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_pegawai_desa' => 1,
                'nama_dan_gelar'  => 'Sutarmo, SE',
                'jabatan'         => 'Kepala Desa',
                'nik'             => '3326041001900001',
                'no_kk'           => '1126041001900001',
                'alamat'          => 'Jl. Timoho Timur 1A, No. 1, Gg. Buntu, RT 05 RW 03, Kel. Bulusan, Kec. Tembalang, Semarang',
                'no_wa'           => '087665657688',
                'email'           => 'sutarmo@gmail.com',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'id_pegawai_desa' => 2,
                'nama_dan_gelar'  => 'Wahyu Eko Yulianingrum',
                'jabatan'         => 'Sekretaris Desa',
                'nik'             => '3326041001900002',
                'no_kk'           => '1126041001900002',
                'alamat'          => 'jl. Dlepih selatan',
                'no_wa'           => '082578789000',
                'email'           => 'wahyu@gmail.com',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
        ];
        $this->db->table('pegawai_desa')->insertBatch($data);
    }
}
