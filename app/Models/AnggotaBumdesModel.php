<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaBumdesModel extends Model
{
   protected $table = 'anggota_bumdes';
   protected $primaryKey = 'id_anggota_bumdes';
   protected $useTimestamps = true;
   protected $allowedFields = ['nama_dan_gelar', 'jabatan', 'nik', 'no_kk', 'no_wa', 'alamat'];

   // Fungsi buatan yang berguna untuk mendapatkan data anggota bumdes
   public function getAnggotaBumdes($id_anggota_bumdes = false)
   {
      if ($id_anggota_bumdes == false) {
         return $this->findAll();
      }
      return $this->where(['id_anggota_bumdes' => $id_anggota_bumdes])->first();
   }

   public function countAnggotaBumdes()
   {
      return $this->countAllResults();
   }
}
