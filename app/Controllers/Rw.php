<?php

namespace App\Controllers;

use App\Models\RwModel;

class Rw extends BaseController
{
   //Konstruktor agar semua method dapat menggunakan model Rw
   protected $rwModel;
   public function __construct()
   {
      $this->rwModel = new RwModel();
      helper(['swal_helper']);
      helper(['print_helper']);
   }


   public function daftar_rw()
   {
      $data = [
         'rw' => $this->rwModel->getRw(),
         'url' => 'rw'
      ];
      return view('rw/daftar_rw', $data);
   }


   public function tambah_rw()
   {
      $validasi = \Config\Services::validation();
      $aturan = [
         'nama_dan_gelar_rw' => [
            'rules' => 'required|regex_match[/^[a-zA-Z.,\s]+$/]',
            'errors' => [
               'required' => 'Nama harus diisi',
               'regex_match' => 'Nama dan gelar hanya boleh berisi huruf, spasi, titik, dan koma'
            ]
         ],
         'nik_rw' => [
            'rules' => 'required|numeric|is_unique[rw.nik]|max_length[16]|min_length[16]',
            'errors' => [
               'required' => 'NIK harus diisi',
               'numeric' => 'NIK harus berupa angka',
               'is_unique' => 'NIK sudah terdaftar',
               'max_length' => 'NIK maksimal 16 digit',
               'min_length' => 'NIK minimal 16 digit'
            ]
         ],
         'nokk_rw' => [
            'rules' => 'required|numeric|is_unique[rw.no_kk]|max_length[16]|min_length[16]',
            'errors' => [
               'required' => 'No KK harus diisi',
               'numeric' => 'No KK harus berupa angka',
               'is_unique' => 'No KK sudah terdaftar',
               'max_length' => 'No KK maksimal 16 digit',
               'min_length' => 'No KK minimal 16 digit'
            ]
         ],
         'rw' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'RW harus dipilih'
            ]
         ],
         'dusun_rw' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Dusun harus dipilih'
            ]
         ],
         'nowa_rw' => [
            'rules' => 'required|numeric|is_unique[rw.no_wa]|max_length[13]|min_length[10]',
            'errors' => [
               'required' => 'No Wa harus diisi',
               'numeric' => 'No Wa harus berupa angka',
               'is_unique' => 'No Wa sudah terdaftar',
               'max_length' => 'No Wa maksimal 13 digit',
               'min_length' => 'No Wa minimal 10 digit'
            ]
         ],
         'alamat_rw' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Alamat harus diisi'
            ]
         ]
      ];
      $validasi->setRules($aturan);
      if ($validasi->withRequest($this->request)->run()) {
         //Mengambil data dari ajax
         $nama_dan_gelar_rw1 = $this->request->getPost('nama_dan_gelar_rw');
         $nama_dan_gelar_rw = trim($nama_dan_gelar_rw1); //Menghapus spasi di awal dan akhir string
         $nik_rw1 = $this->request->getPost('nik_rw');
         $nik_rw = trim($nik_rw1); //Menghapus spasi di awal dan akhir string
         $nokk_rw1 = $this->request->getPost('nokk_rw');
         $nokk_rw = trim($nokk_rw1); //Menghapus spasi di awal dan akhir string
         $rw = $this->request->getPost('rw');
         $dusun_rw = $this->request->getPost('dusun_rw');
         $nowa_rw1 = $this->request->getPost('nowa_rw');
         $nowa_rw = trim($nowa_rw1); //Menghapus spasi di awal dan akhir string
         $alamat_rw1 = $this->request->getPost('alamat_rw');
         $alamat_rw = trim($alamat_rw1); //Menghapus spasi di awal dan akhir string
         //proses memasukkan data ke database
         $data = [
            'nama_dan_gelar' => $nama_dan_gelar_rw,
            'nik' => $nik_rw,
            'no_kk' => $nokk_rw,
            'nama_rw' => $rw,
            'dusun' => $dusun_rw,
            'no_wa' => $nowa_rw,
            'alamat' => $alamat_rw,
         ];
         $this->rwModel->save($data);
         $hasil = [
            'sukses' => 'Data RW berhasil ditambahkan',
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


   public function edit_rw($id_rw)
   {
      return json_encode($this->rwModel->find($id_rw));
   }
   //Fungsi update_pegawai_desa
   public function update_rw()
   {
      $validasi = \Config\Services::validation();
      $rwLama = $this->rwModel->getRw($this->request->getPost('id_rw'));

      if ($rwLama['no_wa'] == $this->request->getPost('nowa_rw')) {
         $aturan_nowa = 'required|numeric|max_length[13]|min_length[10]';
      } else {
         $aturan_nowa = 'required|numeric|is_unique[rw.no_wa]|max_length[13]|min_length[10]';
      }

      if ($rwLama['nik'] == $this->request->getPost('nik_rw')) {
         $aturan_nik = 'required|numeric|max_length[16]|min_length[16]';
      } else {
         $aturan_nik = 'required|numeric|is_unique[rw.nik]|max_length[16]|min_length[16]';
      }

      if ($rwLama['no_kk'] == $this->request->getPost('nokk_rw')) {
         $aturan_nokk = 'required|numeric|max_length[16]|min_length[16]';
      } else {
         $aturan_nokk = 'required|numeric|is_unique[rw.no_kk]|max_length[16]|min_length[16]';
      }

      $aturan = [
         'nama_dan_gelar_rw' => [
            'rules' => 'required|regex_match[/^[a-zA-Z.,\s]+$/]',
            'errors' => [
               'required' => 'Nama harus diisi',
               'regex_match' => 'Nama dan gelar hanya boleh berisi huruf, spasi, titik, dan koma'
            ]
         ],
         'nik_rw' => [
            'rules' => $aturan_nik,
            'errors' => [
               'required' => 'NIK harus diisi',
               'numeric' => 'NIK harus berupa angka',
               'is_unique' => 'NIK sudah terdaftar',
               'max_length' => 'NIK maksimal 16 digit',
               'min_length' => 'NIK minimal 16 digit'
            ]
         ],
         'nokk_rw' => [
            'rules' => $aturan_nokk,
            'errors' => [
               'required' => 'No KK harus diisi',
               'numeric' => 'No KK harus berupa angka',
               'is_unique' => 'No KK sudah terdaftar',
               'max_length' => 'No KK maksimal 16 digit',
               'min_length' => 'No KK minimal 16 digit'
            ]
         ],
         'rw' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'RW harus dipilih'
            ]
         ],
         'dusun_rw' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Dusun harus dipilih'
            ]
         ],
         'nowa_rw' => [
            'rules' => $aturan_nowa,
            'errors' => [
               'required' => 'No Wa harus diisi',
               'numeric' => 'No Wa harus berupa angka',
               'is_unique' => 'No Wa sudah terdaftar',
               'max_length' => 'No Wa maksimal 13 digit',
               'min_length' => 'No Wa minimal 10 digit'
            ]
         ],
         'alamat_rw' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Alamat harus diisi'
            ]
         ]
      ];
      $validasi->setRules($aturan);
      if ($validasi->withRequest($this->request)->run()) {
         //mengambil data dari ajax
         $id_rw = $this->request->getPost('id_rw');
         $nama_dan_gelar_rw1 = $this->request->getPost('nama_dan_gelar_rw');
         $nama_dan_gelar_rw = trim($nama_dan_gelar_rw1); //Menghapus spasi di awal dan akhir string
         $nik_rw1 = $this->request->getPost('nik_rw');
         $nik_rw = trim($nik_rw1); //Menghapus spasi di awal dan akhir string
         $nokk_rw1 = $this->request->getPost('nokk_rw');
         $nokk_rw = trim($nokk_rw1); //Menghapus spasi di awal dan akhir string
         $rw = $this->request->getPost('rw');
         $dusun_rw = $this->request->getPost('dusun_rw');
         $nowa_rw1 = $this->request->getPost('nowa_rw');
         $nowa_rw = trim($nowa_rw1); //Menghapus spasi di awal dan akhir string
         $alamat_rw1 = $this->request->getPost('alamat_rw');
         $alamat_rw = trim($alamat_rw1); //Menghapus spasi di awal dan akhir string
         //proses memasukkan data ke database
         $data = [
            'id_rw' => $id_rw,
            'nama_dan_gelar' => $nama_dan_gelar_rw,
            'nik' => $nik_rw,
            'no_kk' => $nokk_rw,
            'nama_rw' => $rw,
            'dusun' => $dusun_rw,
            'no_wa' => $nowa_rw,
            'alamat' => $alamat_rw,
         ];
         $this->rwModel->save($data);
         $hasil = [
            'sukses' => 'Berhasil mengedit data RW',
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


   //Fungsi delete_rw
   public function delete_rw($id_rw)
   {
      $this->rwModel->delete($id_rw);
      Set_notifikasi_swal('success', 'Berhasil', 'Data RW berhasil dihapus');
      return redirect()->to('/rw');
   }

   // Fungsi export_rw
   public function export_rw()
   {
      $rw = $this->rwModel->getRw();
      exportRW($rw, 'Data_RW.xlsx');
   }
}
