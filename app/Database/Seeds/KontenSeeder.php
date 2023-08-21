<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time; //biar bisa gunain fungsi time

use CodeIgniter\Database\Seeder;

class KontenSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_konten'      => 1,
                'judul'          => 'Pelaksanaan Pelatihan Canva oleh Mahasiswa KKN UNDIP 2023',
                'deskripsi'      => 'lorem ipsum dolor sit amet consectetur adipi cwwrerjwrhhuwruwerhw jfejfhe uhefuehfuehhfeugherunjcwwerwer uhc ufeyneejeeerueruueerjererhueerheuhueueefjerehuehejrerh jrhuekifhueheu jehueoerjhherugyeujnfjhfuehrer jrhuejerhfueh jhhfueejg dfdhfgfd dfjdfgjhdj jdffggujgjdgh djgndghdug jdfgfhudygegnghdug dfhudger ruhg ururhfeuy drdgghdugd rjrghuegye urheugergji',
                'gambar'         => 'agung_mono.jpg',
                'caption_gambar' => 'Guru SDN 1 Dlepih Kecamatan Tirtomoyo melakukan pelatihan canva sebagai media pembutan poster dan presentasi pada (27 Juli 2021)',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
        ];
        $this->db->table('konten')->insertBatch($data);
    }
}
