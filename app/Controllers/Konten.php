<?php

namespace App\Controllers;

use App\Models\KontenModel;

class Konten extends BaseController
{
   //Konstruktor agar semua method dapat menggunakan model Users
   protected $kontenModel;
   public function __construct()
   {
      $this->kontenModel = new KontenModel();
      helper(['swal_helper']);
   }


   //Fungsi daftar_user
   public function daftar_konten()
   {
      $data = [
         'konten' => $this->kontenModel->getKonten(),
         'url' => 'konten'
      ];
      return view('konten/daftar_konten', $data);
   }


   //Fungsi tambah_konten
   public function tambah_konten()
   {
      $validasi = \Config\Services::validation();
      $aturan = [
         'judul' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Judul harus diisi',
            ]
         ],
         'deskripsi' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Deskripsi harus diisi',
            ]
         ],
         'gambar' => [
            'rules' => 'uploaded[gambar]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,1024]',
            'errors' => [
               'uploaded' => 'Gambar belum dimasukkan',
               'is_image' => 'Yang anda pilih bukan gambar',
               'mime_in' => 'Yang anda pilih bukan gambar',
               'max_size' => 'Ukuran gambar terlalu besar'
            ]
         ],
         'caption' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Caption gambar harus diisi harus diisi',
            ]
         ]
      ];
      $validasi->setRules($aturan);
      if ($validasi->withRequest($this->request)->run()) {
         //mengambil data dari ajax
         $judul1 = $this->request->getPost('judul');
         $judul = trim($judul1);
         $deskripsi = $this->request->getPost('deskripsi');
         $gambar = $this->request->getFile('gambar');
         $caption = $this->request->getPost('caption');
         $namaGambar = $gambar->getRandomName();
         //pindahkan file ke folder
         $gambar->move('assets/img/konten', $namaGambar);
         //proses memasukkan data ke database
         $data = [
            'judul'     => $judul,
            'deskripsi' => $deskripsi,
            'gambar'    => $namaGambar,
            'caption_gambar' => $caption
         ];
         $this->kontenModel->save($data);
         $hasil = [
            'sukses' => 'Data konten berhasil ditambahkan',
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


   //Fungsi edit_konten
   public function edit_konten($id_konten)
   {
      return json_encode($this->kontenModel->find($id_konten));
   }
   //Fungsi update_user
   public function update_konten()
   {
      $validasi = \Config\Services::validation();
      $aturan = [
         'judul' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Judul harus diisi',
            ]
         ],
         'deskripsi' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Deskripsi harus diisi',
            ]
         ],
         'gambar' => [
            'rules' => 'uploaded[gambar]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,1024]',
            'errors' => [
               'uploaded' => 'Gambar belum dimasukkan',
               'is_image' => 'Yang anda pilih bukan gambar',
               'mime_in' => 'Yang anda pilih bukan gambar',
               'max_size' => 'Ukuran gambar terlalu besar'
            ]
         ],
         'caption' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Caption gambar harus diisi harus diisi',
            ]
         ]
      ];
      $aturan_tanpa_gambar = [
         'judul' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Judul harus diisi',
            ]
         ],
         'deskripsi' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Deskripsi harus diisi',
            ]
         ],
         'caption' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Caption gambar harus diisi harus diisi',
            ]
         ]
      ];
      if ($this->request->getFile('gambar')) {
         $validasi->setRules($aturan);
      } else {
         $validasi->setRules($aturan_tanpa_gambar);
      }
      //jika valid
      if ($validasi->withRequest($this->request)->run()) {
         //mengambil data dari ajax
         $id_konten = $this->request->getPost('id_konten');
         $judul1 = $this->request->getPost('judul');
         $judul = trim($judul1);
         $deskripsi = $this->request->getPost('deskripsi');
         $gambar = $this->request->getFile('gambar');
         $gambarlama = $this->request->getPost('gambarlama');
         $caption = $this->request->getPost('caption');
         //cek apakah ada foto yang diupload
         if ($gambar == null) {
            $namaGambar = $gambarlama;
         } else {
            $namaGambar = $gambar->getRandomName();
            //pindahkan file ke folder
            $gambar->move('assets/img/konten', $namaGambar);
            //hapus foto lama
            unlink('assets/img/konten/' . $gambarlama);
         }
         //proses memasukkan data ke database
         $data = [
            'id_konten' => $id_konten,
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'gambar' => $namaGambar,
            'caption_gambar' => $caption
         ];
         $this->kontenModel->save($data);
         $hasil = [
            'sukses' => 'Berhasil mengedit data konten',
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


   //Fungsi delete_konten
   public function delete_konten($id_konten)
   {
      //cari foto berdasarkan id_user
      $konten = $this->kontenModel->find($id_konten);
      //hapus foto
      unlink('assets/img/konten/' . $konten['gambar']);
      //hapus data
      $this->kontenModel->delete($id_konten);
      Set_notifikasi_swal('success', 'Sukses :)', 'Berhasil menghapus data konten berita');
      return redirect()->to('/konten');
   }
}
