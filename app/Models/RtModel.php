<?php

namespace App\Models;

use CodeIgniter\Model;

class RtModel extends Model
{
   protected $table = 'rt';
   protected $primaryKey = 'id_rt';
   protected $useTimestamps = true;
   protected $allowedFields = ['id_rw', 'nama_dan_gelar', 'nik', 'no_kk', 'alamat', 'no_wa', 'nama_rt',];

   // Fungsi buatan yang berguna untuk mendapatkan data Rw
   public function getRt($id_rt = false)
   {
      if ($id_rt == false) {
         return $this->findAll();
      }
      return $this->where(['id_rt' => $id_rt])->first();
   }

   //buatlah fungsi yang menampilkan daftar rt dan dusunnya
   public function getRtDusun()
   {

      $db = \Config\Database::connect();
      $query = $db->query(
         "SELECT rt.id_rt AS id_rt, rt.nama_dan_gelar AS nama_dan_gelar, rt.alamat AS alamat,
         rt.no_wa AS no_wa, rt.nama_rt AS nama_rt, rt.nik AS nik, rt.no_kk AS no_kk, rw.dusun AS dusun, rw.nama_rw AS nama_rw
         FROM rt, rw WHERE (rt.id_rw = rw.id_rw) ORDER BY nama_rw, nama_rt"
      );
      $results = $query->getResultArray();
      return $results;
   }

   public function countRT()
   {
      return $this->countAllResults();
   }

   //hitunglah jumlah rt di dusun natah menggunakan dusun yang ada di tabel rw
   public function countRTNatah()
   {
      $db = \Config\Database::connect();
      $query = $db->query(
         "SELECT COUNT(rt.id_rt) AS jumlah_rt FROM rt, rw WHERE (rt.id_rw = rw.id_rw) AND (rw.dusun = 'Natah')"
      );
      $results = $query->getRow();
      if ($results != null) {
         $jumlah = $results->jumlah_rt;
         return $jumlah;
      } else {
         return "0";
      }
   }

   //hitunglah jumlah rt di dusun ngrejeng menggunakan dusun yang ada di tabel rw
   public function countRTNgrejeng()
   {
      $db = \Config\Database::connect();
      $query = $db->query(
         "SELECT COUNT(rt.id_rt) AS jumlah_rt FROM rt, rw WHERE (rt.id_rw = rw.id_rw) AND (rw.dusun = 'Ngrejeng')"
      );
      $results = $query->getRow();
      if ($results != null) {
         $jumlah = $results->jumlah_rt;
         return $jumlah;
      } else {
         return "0";
      }
   }

   //hitunglah jumlah rt di dusun sugihan menggunakan dusun yang ada di tabel rw
   public function countRTSugihan()
   {
      $db = \Config\Database::connect();
      $query = $db->query(
         "SELECT COUNT(rt.id_rt) AS jumlah_rt FROM rt, rw WHERE (rt.id_rw = rw.id_rw) AND (rw.dusun = 'Sugihan')"
      );
      $results = $query->getRow();
      if ($results != null) {
         $jumlah = $results->jumlah_rt;
         return $jumlah;
      } else {
         return "0";
      }
   }

   //hitunglah jumlah rt di dusun ngelo menggunakan dusun yang ada di tabel rw
   public function countRTNgelo()
   {
      $db = \Config\Database::connect();
      $query = $db->query(
         "SELECT COUNT(rt.id_rt) AS jumlah_rt FROM rt, rw WHERE (rt.id_rw = rw.id_rw) AND (rw.dusun = 'Ngelo')"
      );
      $results = $query->getRow();
      if ($results != null) {
         $jumlah = $results->jumlah_rt;
         return $jumlah;
      } else {
         return "0";
      }
   }

   //hitunglah jumlah rt di dusun Bengle menggunakan dusun yang ada di tabel rw
   public function countRTBengle()
   {
      $db = \Config\Database::connect();
      $query = $db->query(
         "SELECT COUNT(rt.id_rt) AS jumlah_rt FROM rt, rw WHERE (rt.id_rw = rw.id_rw) AND (rw.dusun = 'Bengle')"
      );
      $results = $query->getRow();
      if ($results != null) {
         $jumlah = $results->jumlah_rt;
         return $jumlah;
      } else {
         return "0";
      }
   }

   //hitung jumlah rt di dusun warak menggunakan dusun yang ada di tabel rw
   public function countRTWarak()
   {
      $db = \Config\Database::connect();
      $query = $db->query(
         "SELECT COUNT(rt.id_rt) AS jumlah_rt FROM rt, rw WHERE (rt.id_rw = rw.id_rw) AND (rw.dusun = 'Warak')"
      );
      $results = $query->getRow();
      if ($results != null) {
         $jumlah = $results->jumlah_rt;
         return $jumlah;
      } else {
         return "0";
      }
   }

   //hitung jumlah rt di dusun karakan menggunakan dusun yang ada di tabel rw
   public function countRTKarakan()
   {
      $db = \Config\Database::connect();
      $query = $db->query(
         "SELECT COUNT(rt.id_rt) AS jumlah_rt FROM rt, rw WHERE (rt.id_rw = rw.id_rw) AND (rw.dusun = 'Karakan')"
      );
      $results = $query->getRow();
      if ($results != null) {
         $jumlah = $results->jumlah_rt;
         return $jumlah;
      } else {
         return "0";
      }
   }

   //hitung jumlah rt di dusun dlepih menggunakan dusun yang ada di tabel rw
   public function countRTDlepih()
   {
      $db = \Config\Database::connect();
      $query = $db->query(
         "SELECT COUNT(rt.id_rt) AS jumlah_rt FROM rt, rw WHERE (rt.id_rw = rw.id_rw) AND (rw.dusun = 'Dlepih')"
      );
      $results = $query->getRow();
      if ($results != null) {
         $jumlah = $results->jumlah_rt;
         return $jumlah;
      } else {
         return "0";
      }
   }

   //hitung jumlah rt di dusun Bangunsari menggunakan dusun yang ada di tabel rw
   public function countRTBangunsari()
   {
      $db = \Config\Database::connect();
      $query = $db->query(
         "SELECT COUNT(rt.id_rt) AS jumlah_rt FROM rt, rw WHERE (rt.id_rw = rw.id_rw) AND (rw.dusun = 'Bangunsari')"
      );
      $results = $query->getRow();
      if ($results != null) {
         $jumlah = $results->jumlah_rt;
         return $jumlah;
      } else {
         return "0";
      }
   }

   ///hitung jumlah rt di dusun Sumberejo menggunakan dusun yang ada di tabel rw
   public function countRTSumberejo()
   {
      $db = \Config\Database::connect();
      $query = $db->query(
         "SELECT COUNT(rt.id_rt) AS jumlah_rt FROM rt, rw WHERE (rt.id_rw = rw.id_rw) AND (rw.dusun = 'Sumberejo')"
      );
      $results = $query->getRow();
      if ($results != null) {
         $jumlah = $results->jumlah_rt;
         return $jumlah;
      } else {
         return "0";
      }
   }
}
