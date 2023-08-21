<?php

namespace App\Controllers;

use App\Models\PegawaiDesaModel;

class PegawaiDesa extends BaseController
{
   //Konstruktor agar semua method dapat menggunakan model Pegawai Desa
   protected $pegawaiDesaModel;
   public function __construct()
   {
      $this->pegawaiDesaModel = new PegawaiDesaModel();
      helper(['swal_helper']);
      helper(['print_helper']);
   }


   public function daftar_pegawai_desa()
   {
      $data = [
         'pegawaidesa' => $this->pegawaiDesaModel->getPegawaiDesa(),
         'url' => 'pegawai_desa'
      ];
      return view('pegawai_desa/daftar_pegawai_desa', $data);
   }


   public function tambah_pegawai_desa()
   {
      $validasi = \Config\Services::validation();
      $aturan = [
         'nama_dan_gelar_pd' => [
            'rules' => 'required|regex_match[/^[a-zA-Z.,\s]+$/]',
            'errors' => [
               'required' => 'Nama harus diisi',
               'regex_match' => 'Nama dan gelar hanya boleh berisi huruf, spasi, titik, dan koma'
            ]
         ],
         'jabatan_pd' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Jabatan harus dipilih'
            ]
         ],
         'nik_pd' => [
            'rules' => 'required|numeric|is_unique[pegawai_desa.nik]|max_length[16]|min_length[16]',
            'errors' => [
               'required' => 'NIK harus diisi',
               'numeric' => 'NIK harus berupa angka',
               'is_unique' => 'NIK sudah terdaftar',
               'max_length' => 'NIK maksimal 16 digit',
               'min_length' => 'NIK minimal 16 digit'
            ]
         ],
         'nokk_pd' => [
            'rules' => 'required|numeric|is_unique[pegawai_desa.no_kk]|max_length[16]|min_length[16]',
            'errors' => [
               'required' => 'No KK harus diisi',
               'numeric' => 'No KK harus berupa angka',
               'is_unique' => 'No KK sudah terdaftar',
               'max_length' => 'No KK maksimal 16 digit',
               'min_length' => 'No KK minimal 16 digit'
            ]
         ],
         'email_pd' => [
            'rules' => 'required|valid_email|is_unique[pegawai_desa.email]',
            'errors' => [
               'required' => 'Email harus diisi',
               'valid_email' => 'Format email salah',
               'is_unique' => 'Email sudah terdaftar coba pakai yang lain'
            ]
         ],
         'nowa_pd' => [
            'rules' => 'required|numeric|is_unique[pegawai_desa.no_wa]|max_length[13]|min_length[10]',
            'errors' => [
               'required' => 'No Wa harus diisi',
               'numeric' => 'No Wa harus berupa angka',
               'is_unique' => 'No Wa sudah terdaftar',
               'max_length' => 'No Wa maksimal 13 digit',
               'min_length' => 'No Wa minimal 10 digit'
            ]
         ],
         'alamat_pd' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Alamat harus diisi'
            ]
         ]
      ];
      $validasi->setRules($aturan);
      if ($validasi->withRequest($this->request)->run()) {
         //Mengambil data dari ajax
         $nama_dan_gelar_pd1 = $this->request->getPost('nama_dan_gelar_pd');
         $nama_dan_gelar_pd = trim($nama_dan_gelar_pd1); //Menghapus spasi di awal dan akhir string
         $jabatan_pd = $this->request->getPost('jabatan_pd');
         $nik_pd1 = $this->request->getPost('nik_pd');
         $nik_pd = trim($nik_pd1); //Menghapus spasi di awal dan akhir string
         $nokk_pd1 = $this->request->getPost('nokk_pd');
         $nokk_pd = trim($nokk_pd1); //Menghapus spasi di awal dan akhir string
         $email_pd1 = $this->request->getPost('email_pd');
         $email_pd = trim($email_pd1); //Menghapus spasi di awal dan akhir string
         $nowa_pd1 = $this->request->getPost('nowa_pd');
         $nowa_pd = trim($nowa_pd1); //Menghapus spasi di awal dan akhir string
         $alamat_pd1 = $this->request->getPost('alamat_pd');
         $alamat_pd = trim($alamat_pd1); //Menghapus spasi di awal dan akhir string
         //proses memasukkan data ke database
         $datapegawaidesa = [
            'nama_dan_gelar' => $nama_dan_gelar_pd,
            'jabatan' => $jabatan_pd,
            'nik' => $nik_pd,
            'no_kk' => $nokk_pd,
            'email' => $email_pd,
            'no_wa' => $nowa_pd,
            'alamat' => $alamat_pd
         ];
         $this->pegawaiDesaModel->save($datapegawaidesa);
         $hasil = [
            'sukses' => 'Data pegawai desa berhasil ditambahkan',
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


   //Fungsi edit_pegawai_desa
   public function edit_pegawai_desa($id_pegawai_desa)
   {
      return json_encode($this->pegawaiDesaModel->find($id_pegawai_desa));
   }
   //Fungsi update_pegawai_desa
   public function update_pegawai_desa()
   {
      $validasi = \Config\Services::validation();
      $pegawaiDesaLama = $this->pegawaiDesaModel->getPegawaiDesa($this->request->getPost('id_pegawai_desa'));
      if ($pegawaiDesaLama['email'] == $this->request->getPost('email')) {
         $aturan_email = 'required|valid_email';
      } else {
         $aturan_email = 'required|valid_email|is_unique[pegawai_desa.email]';
      }

      if ($pegawaiDesaLama['no_wa'] == $this->request->getPost('nowa')) {
         $aturan_nowa = 'required|numeric|max_length[13]|min_length[10]';
      } else {
         $aturan_nowa = 'required|numeric|is_unique[pegawai_desa.no_wa]|max_length[13]|min_length[10]';
      }

      if ($pegawaiDesaLama['nik'] == $this->request->getPost('nik')) {
         $aturan_nik = 'required|numeric|max_length[16]|min_length[16]';
      } else {
         $aturan_nik = 'required|numeric|is_unique[pegawai_desa.nik]|max_length[16]|min_length[16]';
      }

      if ($pegawaiDesaLama['no_kk'] == $this->request->getPost('nokk')) {
         $aturan_nokk = 'required|numeric|max_length[16]|min_length[16]';
      } else {
         $aturan_nokk = 'required|numeric|is_unique[pegawai_desa.no_kk]|max_length[16]|min_length[16]';
      }

      $aturan = [
         'nama_dan_gelar' => [
            'rules' => 'required|regex_match[/^[a-zA-Z.,\s]+$/]',
            'errors' => [
               'required' => 'Nama harus diisi',
               'regex_match' => 'Nama dan gelar hanya boleh berisi huruf, spasi, titik, dan koma'
            ]
         ],
         'jabatan' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Jabatan harus dipilih'
            ]
         ],
         'nik' => [
            'rules' => $aturan_nik,
            'errors' => [
               'required' => 'NIK harus diisi',
               'numeric' => 'NIK harus berupa angka',
               'is_unique' => 'NIK sudah terdaftar',
               'max_length' => 'NIK maksimal 16 digit',
               'min_length' => 'NIK minimal 16 digit'
            ]
         ],
         'nokk' => [
            'rules' => $aturan_nokk,
            'errors' => [
               'required' => 'No KK harus diisi',
               'numeric' => 'No KK harus berupa angka',
               'is_unique' => 'No KK sudah terdaftar',
               'max_length' => 'No KK maksimal 16 digit',
               'min_length' => 'No KK minimal 16 digit'
            ]
         ],
         'email' => [
            'rules' => $aturan_email,
            'errors' => [
               'required' => 'Email harus diisi',
               'valid_email' => 'Format email salah',
               'is_unique' => 'Email sudah terdaftar coba pakai yang lain'
            ]
         ],
         'nowa' => [
            'rules' => $aturan_nowa,
            'errors' => [
               'required' => 'No Wa harus diisi',
               'numeric' => 'No Wa harus berupa angka',
               'is_unique' => 'No Wa sudah terdaftar',
               'max_length' => 'No Wa maksimal 13 digit',
               'min_length' => 'No Wa minimal 10 digit'
            ]
         ],
         'alamat' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Alamat harus diisi'
            ]
         ]
      ];
      $validasi->setRules($aturan);
      if ($validasi->withRequest($this->request)->run()) {
         //mengambil data dari ajax
         $id_pegawai_desa = $this->request->getPost('id_pegawai_desa');
         $nama_dan_gelar1 = $this->request->getPost('nama_dan_gelar');
         $nama_dan_gelar = trim($nama_dan_gelar1); //Menghapus spasi di awal dan akhir string
         $jabatan = $this->request->getPost('jabatan');
         $nik1 = $this->request->getPost('nik');
         $nik = trim($nik1); //Menghapus spasi di awal dan akhir string
         $nokk1 = $this->request->getPost('nokk');
         $nokk = trim($nokk1); //Menghapus spasi di awal dan akhir string
         $email1 = $this->request->getPost('email');
         $email = trim($email1); //Menghapus spasi di awal dan akhir string
         $nowa1 = $this->request->getPost('nowa');
         $nowa = trim($nowa1); //Menghapus spasi di awal dan akhir string
         $alamat1 = $this->request->getPost('alamat');
         $alamat = trim($alamat1); //Menghapus spasi di awal dan akhir string
         //proses memasukkan data ke database
         $data = [
            'id_pegawai_desa' => $id_pegawai_desa,
            'nama_dan_gelar' => $nama_dan_gelar,
            'jabatan' => $jabatan,
            'nik' => $nik,
            'no_kk' => $nokk,
            'email' => $email,
            'no_wa' => $nowa,
            'alamat' => $alamat
         ];
         $this->pegawaiDesaModel->save($data);
         $hasil = [
            'sukses' => 'Berhasil mengedit data pegawai desa',
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

   //Fungsi delete_pegawai_desa
   public function delete_pegawai_desa($id_pegawai_desa)
   {
      $this->pegawaiDesaModel->delete($id_pegawai_desa);
      Set_notifikasi_swal('success', 'Berhasil', 'Data pegawai desa berhasil dihapus');
      return redirect()->to('/pegawai_desa');
   }

   //Fungsi export_pegawai_desa
   public function export_pegawai_desa()
   {
      $pegawai = $this->pegawaiDesaModel->getPegawaiDesa();
      exportPegawaiDesa($pegawai, 'Data_Pegawai_Desa.xlsx');
   }
}
