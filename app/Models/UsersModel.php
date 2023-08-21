<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
   protected $table = 'users';
   protected $primaryKey = 'id_user';
   protected $useTimestamps = true;
   protected $allowedFields = ['nama_dan_gelar', 'email', 'password', 'no_wa', 'foto'];

   //Fungsi buatan yang berguna untuk mendapatkan data users
   public function getUsers($id_user = false)
   {
      if ($id_user == false) {
         return $this->findAll();
      }
      return $this->where(['id_user' => $id_user])->first();
   }

   public function countUsers()
   {
      return $this->countAllResults();
   }
}
