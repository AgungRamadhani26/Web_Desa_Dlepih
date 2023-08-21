<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{
   //Konstruktor agar semua method dapat menggunakan model Users
   protected $usersModel;
   public function __construct()
   {
      $this->usersModel = new UsersModel();
      helper(['swal_helper']);
   }


   //Fungsi daftar_user
   public function daftar_user()
   {
      $data = [
         'users' => $this->usersModel->getUsers(),
         'url' => 'users'
      ];
      return view('users/daftar_user', $data);
   }


   //Fungsi tambah_user
   public function tambah_user()
   {
      $validasi = \Config\Services::validation();
      $aturan = [
         'nama_dan_gelar' => [
            'rules' => 'required|regex_match[/^[a-zA-Z.,\s]+$/]',
            'errors' => [
               'required' => 'Nama harus diisi',
               'regex_match' => 'Nama dan gelar hanya boleh berisi huruf, spasi, titik, dan koma'
            ]
         ],
         'email' => [
            'rules' => 'required|valid_email|is_unique[users.email]',
            'errors' => [
               'required' => 'Email harus diisi',
               'valid_email' => 'Format email salah',
               'is_unique' => 'Email sudah terdaftar coba pakai yang lain'
            ]
         ],
         'nowa' => [
            'rules' => 'required|numeric|is_unique[users.no_wa]|max_length[13]|min_length[10]',
            'errors' => [
               'required' => 'No Wa harus diisi',
               'numeric' => 'No Wa harus berupa angka',
               'is_unique' => 'No Wa sudah terdaftar',
               'max_length' => 'No Wa maksimal 13 digit',
               'min_length' => 'No Wa minimal 10 digit'
            ]
         ],
         'foto' => [
            'rules' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,1024]',
            'errors' => [
               'uploaded' => 'Gambar belum dimasukkan',
               'is_image' => 'Yang anda pilih bukan gambar',
               'mime_in' => 'Yang anda pilih bukan gambar',
               'max_size' => 'Ukuran gambar terlalu besar'
            ]
         ]
      ];
      $validasi->setRules($aturan);
      if ($validasi->withRequest($this->request)->run()) {
         //mengambil data dari ajax
         $nama_dan_gelar1 = $this->request->getPost('nama_dan_gelar');
         $nama_dan_gelar = trim($nama_dan_gelar1);
         $email1 = $this->request->getPost('email');
         $email = trim($email1);
         $nowa1 = $this->request->getPost('nowa');
         $nowa = trim($nowa1);
         $foto = $this->request->getFile('foto');
         $namaFoto = $foto->getRandomName();
         //pindahkan file ke folder
         $foto->move('assets/img/foto_users', $namaFoto);
         //proses memasukkan data ke database
         $data = [
            'nama_dan_gelar' => $nama_dan_gelar,
            'email' => $email,
            'password' => md5($email),
            'no_wa' => $nowa,
            'foto' => $namaFoto
         ];
         $this->usersModel->save($data);
         $hasil = [
            'sukses' => 'Data user berhasil ditambahkan',
            'error' => false
         ];
      } else {
         $hasil = [
            'sukses' => false,
            'error' => $validasi->listErrors()
         ];
      }
      return json_encode($hasil);
   }


   //Fungsi edit_user
   public function edit_user($id_user)
   {
      return json_encode($this->usersModel->find($id_user));
   }
   //Fungsi update_user
   public function update_user()
   {
      $validasi = \Config\Services::validation();
      // cek email, karena email harus unik
      $userLama = $this->usersModel->getUsers($this->request->getPost('id_user'));
      if ($userLama['email'] == $this->request->getPost('email')) {
         $rule_email = 'required|valid_email';
      } else {
         $rule_email = 'required|valid_email|is_unique[users.email]';
      }

      if ($userLama['no_wa'] == $this->request->getPost('nowa')) {
         $rule_nowa = 'required|numeric|max_length[13]|min_length[10]';
      } else {
         $rule_nowa = 'required|numeric|is_unique[users.no_wa]|max_length[13]|min_length[10]';
      }
      $aturan = [
         'nama_dan_gelar' => [
            'rules' => 'required|regex_match[/^[a-zA-Z.,\s]+$/]',
            'errors' => [
               'required' => 'Nama harus diisi',
               'regex_match' => 'Nama dan gelar hanya boleh berisi huruf, spasi, titik, dan koma'
            ]
         ],
         'email' => [
            'rules' => $rule_email,
            'errors' => [
               'required' => 'Email harus diisi',
               'valid_email' => 'Format email salah',
               'is_unique' => 'Email sudah terdaftar, coba pakai yang lain'
            ]
         ],
         'nowa' => [
            'rules' => $rule_nowa,
            'errors' => [
               'required' => 'No Wa harus diisi',
               'numeric' => 'No Wa harus berupa angka',
               'is_unique' => 'No Wa sudah terdaftar, coba pakai yang lain',
               'max_length' => 'No Wa maksimal 13 digit',
               'min_length' => 'No Wa minimal 10 digit'
            ]
         ],
         'foto' => [
            'rules' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,1024]',
            'errors' => [
               'uploaded' => 'Foto belum diupload',
               'is_image' => 'Yang anda pilih bukan gambar',
               'mime_in' => 'Yang anda pilih bukan gambar',
               'max_size' => 'Ukuran foto terlalu besar'
            ]
         ]
      ];
      $aturan_tanpa_foto = [
         'nama_dan_gelar' => [
            'rules' => 'required|regex_match[/^[a-zA-Z.,\s]+$/]',
            'errors' => [
               'required' => 'Nama harus diisi',
               'regex_match' => 'Nama dan gelar hanya boleh berisi huruf, spasi, titik, dan koma'
            ]
         ],
         'email' => [
            'rules' => $rule_email,
            'errors' => [
               'required' => 'Email harus diisi',
               'valid_email' => 'Format email salah',
               'is_unique' => 'Email sudah terdaftar, coba pakai yang lain'
            ]
         ],
         'nowa' => [
            'rules' => $rule_nowa,
            'errors' => [
               'required' => 'No Wa harus diisi',
               'numeric' => 'No Wa harus berupa angka',
               'is_unique' => 'No Wa sudah terdaftar, coba pakai yang lain',
               'max_length' => 'No Wa maksimal 13 digit',
               'min_length' => 'No Wa minimal 10 digit'
            ]
         ],
      ];
      if ($this->request->getFile('foto')) {
         $validasi->setRules($aturan);
      } else {
         $validasi->setRules($aturan_tanpa_foto);
      }
      //jika valid
      if ($validasi->withRequest($this->request)->run()) {
         //mengambil data dari ajax
         $id_user = $this->request->getPost('id_user');
         $nama_dan_gelar1 = $this->request->getPost('nama_dan_gelar');
         $nama_dan_gelar = trim($nama_dan_gelar1);
         $email1 = $this->request->getPost('email');
         $email = trim($email1);
         $nowa1 = $this->request->getPost('nowa');
         $nowa = trim($nowa1);
         $foto = $this->request->getFile('foto');
         $fotolama = $this->request->getPost('fotolama');
         //cek apakah ada foto yang diupload
         if ($foto == null) {
            $namaFoto = $fotolama;
         } else {
            $namaFoto = $foto->getRandomName();
            //pindahkan file ke folder
            $foto->move('assets/img/foto_users', $namaFoto);
            //hapus foto lama
            unlink('assets/img/foto_users/' . $fotolama);
         }
         //proses memasukkan data ke database
         $data = [
            'id_user' => $id_user,
            'nama_dan_gelar' => $nama_dan_gelar,
            'email' => $email,
            'no_wa' => $nowa,
            'foto' => $namaFoto
         ];
         $this->usersModel->save($data);
         $hasil = [
            'sukses' => 'Berhasil mengedit data user',
            'error' => false
         ];
      } else {
         $hasil = [
            'sukses' => false,
            'error' => $validasi->listErrors()
         ];
      }
      return json_encode($hasil);
   }

   //Fungsi delete_user
   public function delete_user($id_user)
   {
      //cari foto berdasarkan id_user
      $user = $this->usersModel->find($id_user);
      //hapus foto
      unlink('assets/img/foto_users/' . $user['foto']);
      //hapus data
      $this->usersModel->delete($id_user);
      Set_notifikasi_swal('success', 'Sukses :)', 'Berhasil menghapus data user');
      return redirect()->to('/users');
   }
}
