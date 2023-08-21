<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Profile extends BaseController
{
   //Konstruktor agar semua method dapat menggunakan model Users
   protected $usersModel;
   public function __construct()
   {
      $this->usersModel = new UsersModel();
      helper(['swal_helper']);
   }

   //method untuk menampilkan halaman profile
   public function profile()
   {
      $data = [
         'users' => $this->usersModel->getUsers(session()->get('id_user')),
         'url' => 'profile'
      ];
      return view('profile/profile', $data);
   }

   //method untuk mengedit profile
   public function edit_profile($id)
   {
      return json_encode($this->usersModel->find($id));
   }
   public function update_profile()
   {
      $validasi = \Config\Services::validation();
      $userLama = $this->usersModel->getUsers($this->request->getPost('id_ProfilUser'));
      if ($userLama['email'] == $this->request->getPost('email_profil')) {
         $rule_email = 'required|valid_email';
      } else {
         $rule_email = 'required|valid_email|is_unique[users.email]';
      }
      $aturan = [
         'email_profil' => [
            'rules' => $rule_email,
            'errors' => [
               'required' => 'Email harus diisi',
               'valid_email' => 'Format email salah',
               'is_unique' => 'Email sudah terdaftar, coba pakai yang lain'
            ]
         ],
         'password_profil' => [
            'rules' => 'required|min_length[6]',
            'errors' => [
               'required' => 'Password lama harus diisi',
               'min_length' => 'Password lama minimal 6 karakter'
            ]
         ],
         'password_profil_baru' => [
            'rules' => 'required|min_length[6]',
            'errors' => [
               'required' => 'Password baru harus diisi',
               'min_length' => 'Password baru minimal 6 karakter'
            ]
         ],
         'konfirmasi_password_profil_baru' => [
            'rules' => 'required|min_length[6]',
            'errors' => [
               'required' => 'Konfirmasi password baru harus diisi',
               'min_length' => 'Konfirmasi password baru minimal 6 karakter'
            ]
         ]
      ];
      $validasi->setRules($aturan);
      $profilLama = $this->usersModel->getUsers($this->request->getPost('id_ProfilUser'));
      $id_user = $this->request->getPost('id_ProfilUser');
      $email = $this->request->getPost('email_profil');
      $password = $this->request->getPost('password_profil');
      $password_baru = $this->request->getPost('password_profil_baru');
      $konfirmasi_password_baru = $this->request->getPost('konfirmasi_password_profil_baru');
      if ($validasi->withRequest($this->request)->run()) {
         $passwordMD5 = md5($password);
         if ($passwordMD5 == $profilLama['password']) {
            if ($password_baru == $konfirmasi_password_baru) {
               $data = [
                  'id_user' => $id_user,
                  'email' => $email,
                  'password' => md5($password_baru)
               ];
               $this->usersModel->save($data);
               $hasil = [
                  'sukses' => 'Berhasil mengubah password',
                  'error' => false
               ];
            } else {
               $hasil = [
                  'sukses' => false,
                  'error' => 'Maaf, password baru dan konfirmasi password baru tidak sama'
               ];
            }
         } else {
            $hasil = [
               'sukses' => false,
               'error' => 'Maaf, password lama salah'
            ];
         }
      } else {
         $hasil = [
            'sukses' => false,
            'error' => $validasi->listErrors()
         ];
      }
      return json_encode($hasil);
   }


   //method untuk lupa password
   public function lupa_password()
   {
      return view('profile/lupa_password');
   }


   //method untuk cek email
   public function cek_email()
   {
      $validasi = \Config\Services::validation();
      $aturan = [
         'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
               'required' => 'Email harus diisi',
               'valid_email' => 'Format email salah'
            ]
         ]
      ];
      $validasi->setRules($aturan);
      if (!$validasi->withRequest($this->request)->run()) {
         session()->setFlashdata('error_email', $validasi->getError('email'));
         return redirect()->to('/lupa_password')->withInput();
      } else {
         $email = $this->request->getPost('email');
         $user = $this->usersModel->where(['email' => $email])->first();
         if (is_null($user)) {
            session()->setFlashdata('error_email', 'Email tidak terdaftar');
            return redirect()->to('/lupa_password')->withInput();
         } else {
            return redirect()->to('/profil/update_password/' . md5($user['id_user']));
         }
      }
   }

   public function update_password($md5_id_user)
   {
      $user = $this->usersModel->where(['md5(id_user)' => $md5_id_user])->first();
      $data = [
         'user' => $user
      ];
      return view('profile/update_password', $data);
   }
   public function save_update_password($id_user)
   {
      $validasi = \Config\Services::validation();
      $aturan = [
         'passwordbaru' => [
            'rules' => 'required|min_length[6]',
            'errors' => [
               'required' => 'Password baru harus diisi',
               'min_length' => 'Password baru minimal 6 karakter'
            ]
         ],
         'konfpassword' => [
            'rules' => 'required|min_length[6]',
            'errors' => [
               'required' => 'Konfirmasi password baru harus diisi',
               'min_length' => 'Konfirmasi password baru minimal 6 karakter'
            ]
         ]
      ];
      $validasi->setRules($aturan);
      $passwordbaru = $this->request->getPost('passwordbaru');
      $konfpassword = $this->request->getPost('konfpassword');
      if ($validasi->withRequest($this->request)->run()) {
         if ($passwordbaru == $konfpassword) {
            $data = [
               'id_user' => $id_user,
               'password' => md5($passwordbaru)
            ];
            $this->usersModel->save($data);
            session()->setFlashdata('success_pass_Konf', 'Password berhasil diubah silahkan login kembali');
            return redirect()->to('/profil/update_password/' . md5($id_user));
         } else {
            session()->setFlashdata('err_pass_konf', 'Password baru tidak cocok dengan konfirmasi password baru');
            return redirect()->to('/profil/update_password/' . md5($id_user))->withInput();
         }
      } else {
         session()->setFlashdata('error_passwordbaru', $validasi->getError('passwordbaru'));
         session()->setFlashdata('error_konfpassword', $validasi->getError('konfpassword'));
         return redirect()->to('/profil/update_password/' . md5($id_user))->withInput();
      }
   }
}
