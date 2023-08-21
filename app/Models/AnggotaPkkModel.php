<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaPkkModel extends Model
{
   protected $table = 'anggota_pkk';
   protected $primaryKey = 'id_anggota_pkk';
   protected $useTimestamps = true;
   protected $allowedFields = ['nama_dan_gelar', 'jabatan', 'nik', 'no_kk', 'no_wa', 'alamat'];

   // Fungsi buatan yang berguna untuk mendapatkan data Rw
   public function getAnggotaPkk($id_anggota_pkk = false)
   {
      if ($id_anggota_pkk == false) {
         return $this->findAll();
      }
      return $this->where(['id_anggota_pkk' => $id_anggota_pkk])->first();
   }

   public function countAnggotaPkk()
   {
      return $this->countAllResults();
   }

   public function countKetua()
   {
      return $this->where(['jabatan' => 'Ketua'])->countAllResults();
   }

   public function countWakilKetua()
   {
      return $this->where(['jabatan' => 'Wakil Ketua'])->countAllResults();
   }

   public function countSekretaris()
   {
      $jabatanValues = ['Sekretaris I', 'Sekretaris II'];
      return $this->whereIn('jabatan', $jabatanValues)->countAllResults();
   }

   public function countBendahara()
   {
      $jabatanValues = ['Bendahara I', 'Bendahara II'];
      return $this->whereIn('jabatan', $jabatanValues)->countAllResults();
   }

   public function countKetuaPokja()
   {
      $jabatanValues = ['Ketua POKJA I', 'Ketua POKJA II', 'Ketua POKJA III', 'Ketua POKJA IV'];
      return $this->whereIn('jabatan', $jabatanValues)->countAllResults();
   }

   public function countAnggota()
   {
      return $this->where(['jabatan' => 'Anggota'])->countAllResults();
   }
}
