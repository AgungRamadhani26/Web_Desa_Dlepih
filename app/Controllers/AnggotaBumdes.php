<?php

namespace App\Controllers;

use App\Models\AnggotaBumdesModel;

class AnggotaBumdes extends BaseController
{
   //konstruktor agar semua method dapat menggunakan model AnggotaBumdes
   protected $anggotaBumdesModel;
   public function __construct()
   {
      $this->anggotaBumdesModel = new AnggotaBumdesModel();
      helper(['swal_helper']);
      helper(['print_helper']);
   }


   public function daftar_anggota_bumdes()
   {
      $data = [
         'anggota_bumdes' => $this->anggotaBumdesModel->getAnggotaBumdes(),
         'url' => 'anggota_bumdes'
      ];
      return view('anggota_bumdes/daftar_anggota_bumdes', $data);
   }


   public function tambah_anggota_bumdes()
   {
      $validasi = \Config\Services::validation();
      $aturan = [
         'nama_dan_gelar_ab' => [
            'rules' => 'required|regex_match[/^[a-zA-Z.,\s]+$/]',
            'errors' => [
               'required' => 'Nama harus diisi',
               'regex_match' => 'Nama dan gelar hanya boleh berisi huruf, spasi, titik, dan koma'
            ]
         ],
         'nik_ab' => [
            'rules' => 'required|numeric|is_unique[anggota_bumdes.nik]|max_length[16]|min_length[16]',
            'errors' => [
               'required' => 'NIK harus diisi',
               'numeric' => 'NIK harus berupa angka',
               'is_unique' => 'NIK sudah terdaftar',
               'max_length' => 'NIK maksimal 16 digit',
               'min_length' => 'NIK minimal 16 digit'
            ]
         ],
         'nokk_ab' => [
            'rules' => 'required|numeric|is_unique[anggota_bumdes.no_kk]|max_length[16]|min_length[16]',
            'errors' => [
               'required' => 'No KK harus diisi',
               'numeric' => 'No KK harus berupa angka',
               'is_unique' => 'No KK sudah terdaftar',
               'max_length' => 'No KK maksimal 16 digit',
               'min_length' => 'No KK minimal 16 digit'
            ]
         ],
         'jabatan_ab' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Jabatan harus dipilih'
            ]
         ],
         'nowa_ab' => [
            'rules' => 'required|numeric|is_unique[anggota_bumdes.no_wa]|max_length[13]|min_length[10]',
            'errors' => [
               'required' => 'No Wa harus diisi',
               'numeric' => 'No Wa harus berupa angka',
               'is_unique' => 'No Wa sudah terdaftar',
               'max_length' => 'No Wa maksimal 13 digit',
               'min_length' => 'No Wa minimal 10 digit'
            ]
         ],
         'alamat_ab' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Alamat harus diisi'
            ]
         ]
      ];
      $validasi->setRules($aturan);
      if ($validasi->withRequest($this->request)->run()) {
         //Mengambil data dari ajax
         $nama_dan_gelar_ab1 = $this->request->getPost('nama_dan_gelar_ab');
         $nama_dan_gelar_ab = trim($nama_dan_gelar_ab1); //Menghapus spasi di awal dan akhir string
         $nik_ab1 = $this->request->getPost('nik_ab');
         $nik_ab = trim($nik_ab1); //Menghapus spasi di awal dan akhir string
         $nokk_ab1 = $this->request->getPost('nokk_ab');
         $nokk_ab = trim($nokk_ab1); //Menghapus spasi di awal dan akhir string
         $jabatan_ab = $this->request->getPost('jabatan_ab');
         $nowa_ab1 = $this->request->getPost('nowa_ab');
         $nowa_ab = trim($nowa_ab1); //Menghapus spasi di awal dan akhir string
         $alamat_ab1 = $this->request->getPost('alamat_ab');
         $alamat_ab = trim($alamat_ab1); //Menghapus spasi di awal dan akhir string
         //proses memasukkan data ke database
         $data = [
            'nama_dan_gelar' => $nama_dan_gelar_ab,
            'nik' => $nik_ab,
            'no_kk' => $nokk_ab,
            'jabatan' => $jabatan_ab,
            'no_wa' => $nowa_ab,
            'alamat' => $alamat_ab
         ];
         $this->anggotaBumdesModel->save($data);
         $hasil = [
            'sukses' => 'Data anggota BUMDes berhasil ditambahkan',
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


   //Fungsi edit anggota bumdes
   public function edit_anggota_bumdes($id_anggota_bumdes)
   {
      return json_encode($this->anggotaBumdesModel->find($id_anggota_bumdes));
   }
   //Fungsi update_anggota_pkk
   public function update_anggota_bumdes()
   {
      $validasi = \Config\Services::validation();
      $anggotaBumdesLama = $this->anggotaBumdesModel->getAnggotaBumdes($this->request->getPost('id_anggota_bumdes'));
      if ($anggotaBumdesLama['no_wa'] == $this->request->getPost('nowa_ab')) {
         $aturan_nowa = 'required|numeric|max_length[13]|min_length[10]';
      } else {
         $aturan_nowa = 'required|numeric|is_unique[anggota_bumdes.no_wa]|max_length[13]|min_length[10]';
      }

      if ($anggotaBumdesLama['nik'] == $this->request->getPost('nik_ab')) {
         $aturan_nik = 'required|numeric|max_length[16]|min_length[16]';
      } else {
         $aturan_nik = 'required|numeric|is_unique[anggota_bumdes.nik]|max_length[16]|min_length[16]';
      }

      if ($anggotaBumdesLama['no_kk'] == $this->request->getPost('nokk_ab')) {
         $aturan_nokk = 'required|numeric|max_length[16]|min_length[16]';
      } else {
         $aturan_nokk = 'required|numeric|is_unique[anggota_bumdes.no_kk]|max_length[16]|min_length[16]';
      }

      $aturan = [
         'nama_dan_gelar_ab' => [
            'rules' => 'required|regex_match[/^[a-zA-Z.,\s]+$/]',
            'errors' => [
               'required' => 'Nama harus diisi',
               'regex_match' => 'Nama dan gelar hanya boleh berisi huruf, spasi, titik, dan koma'
            ]
         ],
         'nik_ab' => [
            'rules' => $aturan_nik,
            'errors' => [
               'required' => 'NIK harus diisi',
               'numeric' => 'NIK harus berupa angka',
               'is_unique' => 'NIK sudah terdaftar',
               'max_length' => 'NIK maksimal 16 digit',
               'min_length' => 'NIK minimal 16 digit'
            ]
         ],
         'nokk_ab' => [
            'rules' => $aturan_nokk,
            'errors' => [
               'required' => 'No KK harus diisi',
               'numeric' => 'No KK harus berupa angka',
               'is_unique' => 'No KK sudah terdaftar',
               'max_length' => 'No KK maksimal 16 digit',
               'min_length' => 'No KK minimal 16 digit'
            ]
         ],
         'jabatan_ab' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Jabatan harus dipilih'
            ]
         ],
         'nowa_ab' => [
            'rules' => $aturan_nowa,
            'errors' => [
               'required' => 'No Wa harus diisi',
               'numeric' => 'No Wa harus berupa angka',
               'is_unique' => 'No Wa sudah terdaftar',
               'max_length' => 'No Wa maksimal 13 digit',
               'min_length' => 'No Wa minimal 10 digit'
            ]
         ],
         'alamat_ab' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Alamat harus diisi'
            ]
         ]
      ];
      $validasi->setRules($aturan);
      if ($validasi->withRequest($this->request)->run()) {
         //mengambil data dari ajax
         $id_anggota_bumdes = $this->request->getPost('id_anggota_bumdes');
         $nama_dan_gelar_ab1 = $this->request->getPost('nama_dan_gelar_ab');
         $nama_dan_gelar_ab = trim($nama_dan_gelar_ab1); //Menghapus spasi di awal dan akhir string
         $nik_ab1 = $this->request->getPost('nik_ab');
         $nik_ab = trim($nik_ab1);
         $nokk_ab1 = $this->request->getPost('nokk_ab');
         $nokk_ab = trim($nokk_ab1);
         $jabatan_ab = $this->request->getPost('jabatan_ab');
         $nowa_ab1 = $this->request->getPost('nowa_ab');
         $nowa_ab = trim($nowa_ab1); //Menghapus spasi di awal dan akhir string
         $alamat_ab1 = $this->request->getPost('alamat_ab');
         $alamat_ab = trim($alamat_ab1); //Menghapus spasi di awal dan akhir string
         //proses memasukkan data ke database
         $data = [
            'id_anggota_bumdes' => $id_anggota_bumdes,
            'nama_dan_gelar' => $nama_dan_gelar_ab,
            'nik' => $nik_ab,
            'no_kk' => $nokk_ab,
            'jabatan' => $jabatan_ab,
            'no_wa' => $nowa_ab,
            'alamat' => $alamat_ab
         ];
         $this->anggotaBumdesModel->save($data);
         $hasil = [
            'sukses' => 'Berhasil mengedit data anggota BUMDes',
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


   //Fungsi delete_anggota_bumdes
   public function delete_anggota_bumdes($id_anggota_bumdes)
   {
      $this->anggotaBumdesModel->delete($id_anggota_bumdes);
      Set_notifikasi_swal('success', 'Berhasil', 'Data anggota BUMDes berhasil dihapus');
      return redirect()->to('/anggota_bumdes');
   }


   // Fungsi export_rw
   public function export_anggota_bumdes()
   {
      $anggota_bumdes = $this->anggotaBumdesModel->getAnggotaBumdes();
      exportAnggotaBumdes($anggota_bumdes, 'Data_Anggota_BUMDes.xlsx');
   }
}
