<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time; //biar bisa gunain fungsi time

use CodeIgniter\Database\Seeder;

class RwSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_rw'          => 1,
                'nama_dan_gelar' => 'Budi Hartono',
                'nik'            => '3236041001900001',
                'no_kk'          => '1216041001900001',
                'dusun'          => 'Dlepih',
                'alamat'         => 'jl. Dlepih selatan',
                'no_wa'          => '085678789066',
                'nama_rw'        => '8',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'id_rw'          => 2,
                'nama_dan_gelar' => 'Rahmat Hardiyanto',
                'nik'            => '3236041001900002',
                'no_kk'          => '1216041001900002',
                'dusun'          => 'Natah',
                'alamat'         => 'jl. Natah selatan',
                'no_wa'          => '087676887690',
                'nama_rw'        => '1',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'id_rw'          => 4,
                'nama_dan_gelar' => 'Joko Purwanto',
                'nik'            => '3236041001900004',
                'no_kk'          => '1216041001900004',
                'dusun'          => 'Sugihan',
                'alamat'         => 'jl. Natah selatan',
                'no_wa'          => '087076887690',
                'nama_rw'        => '3',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'id_rw'          => 5,
                'nama_dan_gelar' => 'Sutarmo',
                'nik'            => '3236041001900005',
                'no_kk'          => '1216041001900005',
                'dusun'          => 'Ngelo',
                'alamat'         => 'jl. Natah selatan',
                'no_wa'          => '089876887690',
                'nama_rw'        => '4',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'id_rw'          => 6,
                'nama_dan_gelar' => 'Rudiyanto',
                'nik'            => '3236041001900006',
                'no_kk'          => '1216041001900006',
                'dusun'          => 'Bengle',
                'alamat'         => 'jl. Natah selatan',
                'no_wa'          => '087677687690',
                'nama_rw'        => '5',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'id_rw'          => 7,
                'nama_dan_gelar' => 'Yatno Wiyono',
                'nik'            => '3236041001900007',
                'no_kk'          => '1216041001900007',
                'dusun'          => 'Sumberejo',
                'alamat'         => 'jl. Natah selatan',
                'no_wa'          => '087670808090',
                'nama_rw'        => '6',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],

        ];
        $this->db->table('rw')->insertBatch($data);
    }
}
