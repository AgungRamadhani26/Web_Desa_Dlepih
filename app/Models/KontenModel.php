<?php

namespace App\Models;

use CodeIgniter\Model;

class KontenModel extends Model
{
   protected $table = 'konten';
   protected $primaryKey = 'id_konten';
   protected $useTimestamps = true;
   protected $allowedFields = ['judul', 'caption_gambar', 'deskripsi', 'gambar'];


   //Fungsi buatan yang berguna untuk mendapatkan konten secara descending
   public function getKonten($id_konten = false)
   {
      if ($id_konten == false) {
         return $this->orderBy('id_konten', 'DESC')->findAll();
      }
      return $this->where(['id_konten' => $id_konten])->first();
   }


   //Fungsi buatan yang berguna untuk mendapatkan 5 konten terbaru
   public function getKontenTerbaru()
   {
      return $this->orderBy('id_konten', 'DESC')->findAll(5);
   }

   //Fungsi untuk menghitung jumlah konten
   public function countKonten()
   {
      return $this->countAll();
   }
}
