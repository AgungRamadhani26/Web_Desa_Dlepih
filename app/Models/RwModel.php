<?php

namespace App\Models;

use CodeIgniter\Model;

class RwModel extends Model
{
   protected $table = 'rw';
   protected $primaryKey = 'id_rw';
   protected $useTimestamps = true;
   protected $allowedFields = ['nama_dan_gelar', 'nik', 'no_kk', 'dusun', 'alamat', 'no_wa', 'nama_rw',];

   // Fungsi buatan yang berguna untuk mendapatkan data Rw
   public function getRw($id_rw = false)
   {
      $db = \Config\Database::connect();
      if ($id_rw == false) {
         $query = $db->query(
            "SELECT * FROM rw ORDER BY nama_rw, dusun"
         );
         $results = $query->getResultArray();
      } else {
         $query = $db->query(
            "SELECT * FROM rw WHERE (id_rw = $id_rw)"
         );
         $results = $query->getRowArray();
      }
      return $results;
   }

   public function countRW()
   {
      return $this->countAllResults();
   }
}
