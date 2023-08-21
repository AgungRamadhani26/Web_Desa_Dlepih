<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiDesaModel extends Model
{
   protected $table = 'pegawai_desa';
   protected $primaryKey = 'id_pegawai_desa';
   protected $useTimestamps = true;
   protected $allowedFields = ['nama_dan_gelar', 'jabatan', 'nik', 'no_kk', 'email', 'no_wa', 'alamat'];

   // Fungsi buatan yang berguna untuk mendapatkan data Pegawai Desa
   public function getPegawaiDesa($id_pegawai_desa = false)
   {
      if ($id_pegawai_desa == false) {
         return $this->findAll();
      }
      return $this->where(['id_pegawai_desa' => $id_pegawai_desa])->first();
   }

   public function countPegawaiDesa()
   {
      return $this->countAllResults();
   }
}
