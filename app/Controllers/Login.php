<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController
{
   //Konstruktor agar semua method dapat menggunakan model Users
   protected $usersModel;
   public function __construct()
   {
      $this->usersModel = new UsersModel();
      helper(['swal_helper']);
   }


   public function halaman_login()
   {
      return view('layout/halaman_login');
   }


   public function login()
   {
      $login = $this->request->getPost('login');
      $error_email = null;
      $error_password = null;
      if ($login) {
         $valid = true; //Flag variabel validasi
         //Cek validasi email
         $email = $this->request->getPost('email');
         if ($email == '') {
            $valid = false;
            $error_email = "Email harus diisi";
         } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $valid = false;
            $error_email = "Format email tidak valid";
         }
         //Cek validasi password
         $password_asli = $this->request->getPost('password');
         if ($password_asli == '') {
            $valid = false;
            $error_password = "Password harus diisi";
         }
         //jika validasi benar
         if ($valid == true) {
            $password = md5($password_asli);
            $array_check_user = ['email' => $email, 'password' => $password];
            $dataUser = $this->usersModel->where($array_check_user)->first();
            if (is_null($dataUser)) {
               $error = "Email atau Password salah";
               session()->setFlashdata('error', $error);
               session()->setFlashdata('email', $email);
               session()->setFlashdata('password', $password_asli);
               return redirect()->to('/halaman_login');
            } else {
               $dataSesi = [
                  'id_user' => $dataUser['id_user'],
                  'nama_user' => $dataUser['nama_dan_gelar'],
                  'email' => $dataUser['email'],
                  'no_wa' => $dataUser['no_wa'],
                  'foto' => $dataUser['foto']
               ];
               session()->set($dataSesi);
               return redirect()->to('/dashboard');
            }
         } else {
            session()->setFlashdata('email', $email);
            session()->setFlashdata('password', $password_asli);
            session()->setFlashdata('error_email', $error_email);
            session()->setFlashdata('error_password', $error_password);
            return redirect()->to('/halaman_login');
         }
      }
   }


   //Method untuk logout
   public function logout()
   {
      session()->destroy();
      return redirect()->to('/');
   }
}
