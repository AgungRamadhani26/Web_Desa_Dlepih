<?php

namespace App\Controllers;

use App\Models\AnggotaPkkModel;

class AnggotaPkk extends BaseController
{
   //Konstruktor agar semua method dapat menggunakan model AnggotaPkk
   protected $anggotaPkkModel;
   public function __construct()
   {
      $this->anggotaPkkModel = new  AnggotaPkkModel();
      helper(['swal_helper']);
      helper(['print_helper']);
   }


   public function daftar_anggota_pkk()
   {
      $data = [
         'anggota_pkk' => $this->anggotaPkkModel->getAnggotaPkk(),
         'jlh_anggota_pkk' => $this->anggotaPkkModel->countAnggotaPkk(),
         'jlh_ketua' => $this->anggotaPkkModel->countKetua(),
         'jlh_wakil_ketua' => $this->anggotaPkkModel->countWakilKetua(),
         'jlh_sekretaris' => $this->anggotaPkkModel->countSekretaris(),
         'jlh_bendahara' => $this->anggotaPkkModel->countBendahara(),
         'jlh_ketua_pokja' => $this->anggotaPkkModel->countKetuaPokja(),
         'jlh_anggota' => $this->anggotaPkkModel->countAnggota(),
         'url' => 'anggota_pkk'
      ];
      return view('anggota_pkk/daftar_anggota_pkk', $data);
   }


   public function tambah_anggota_pkk()
   {
      $validasi = \Config\Services::validation();
      $aturan = [
         'nama_dan_gelar_ap' => [
            'rules' => 'required|regex_match[/^[a-zA-Z.,\s]+$/]',
            'errors' => [
               'required' => 'Nama harus diisi',
               'regex_match' => 'Nama dan gelar hanya boleh berisi huruf, spasi, titik, dan koma'
            ]
         ],
         'nik_ap' => [
            'rules' => 'required|numeric|is_unique[anggota_pkk.nik]|max_length[16]|min_length[16]',
            'errors' => [
               'required' => 'NIK harus diisi',
               'numeric' => 'NIK harus berupa angka',
               'is_unique' => 'NIK sudah terdaftar',
               'max_length' => 'NIK maksimal 16 digit',
               'min_length' => 'NIK minimal 16 digit'
            ]
         ],
         'nokk_ap' => [
            'rules' => 'required|numeric|is_unique[anggota_pkk.no_kk]|max_length[16]|min_length[16]',
            'errors' => [
               'required' => 'No KK harus diisi',
               'numeric' => 'No KK harus berupa angka',
               'is_unique' => 'No KK sudah terdaftar',
               'max_length' => 'No KK maksimal 16 digit',
               'min_length' => 'No KK minimal 16 digit'
            ]
         ],
         'jabatan_ap' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Jabatan harus dipilih'
            ]
         ],
         'nowa_ap' => [
            'rules' => 'required|numeric|is_unique[anggota_pkk.no_wa]|max_length[13]|min_length[10]',
            'errors' => [
               'required' => 'No Wa harus diisi',
               'numeric' => 'No Wa harus berupa angka',
               'is_unique' => 'No Wa sudah terdaftar',
               'max_length' => 'No Wa maksimal 13 digit',
               'min_length' => 'No Wa minimal 10 digit'
            ]
         ],
         'alamat_ap' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Alamat harus diisi'
            ]
         ]
      ];
      $validasi->setRules($aturan);
      if ($validasi->withRequest($this->request)->run()) {
         //Mengambil data dari ajax
         $nama_dan_gelar_ap1 = $this->request->getPost('nama_dan_gelar_ap');
         $nama_dan_gelar_ap = trim($nama_dan_gelar_ap1); //Menghapus spasi di awal dan akhir string
         $nik_ap1 = $this->request->getPost('nik_ap');
         $nik_ap = trim($nik_ap1); //Menghapus spasi di awal dan akhir string
         $nokk_ap1 = $this->request->getPost('nokk_ap');
         $nokk_ap = trim($nokk_ap1); //Menghapus spasi di awal dan akhir string
         $jabatan_ap = $this->request->getPost('jabatan_ap');
         $nowa_ap1 = $this->request->getPost('nowa_ap');
         $nowa_ap = trim($nowa_ap1); //Menghapus spasi di awal dan akhir string
         $alamat_ap1 = $this->request->getPost('alamat_ap');
         $alamat_ap = trim($alamat_ap1); //Menghapus spasi di awal dan akhir string
         //proses memasukkan data ke database
         $data = [
            'nama_dan_gelar' => $nama_dan_gelar_ap,
            'nik' => $nik_ap,
            'no_kk' => $nokk_ap,
            'jabatan' => $jabatan_ap,
            'no_wa' => $nowa_ap,
            'alamat' => $alamat_ap
         ];
         $this->anggotaPkkModel->save($data);
         $hasil = [
            'sukses' => 'Data anggota pkk berhasil ditambahkan',
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


   //Fungsi edit anggota pkk
   public function edit_anggota_pkk($id_anggota_pkk)
   {
      return json_encode($this->anggotaPkkModel->find($id_anggota_pkk));
   }
   //Fungsi update_anggota_pkk
   public function update_anggota_pkk()
   {
      $validasi = \Config\Services::validation();
      $anggotaPkkLama = $this->anggotaPkkModel->getAnggotaPkk($this->request->getPost('id_anggota_pkk'));
      if ($anggotaPkkLama['no_wa'] == $this->request->getPost('nowa_ap')) {
         $aturan_nowa = 'required|numeric|max_length[13]|min_length[10]';
      } else {
         $aturan_nowa = 'required|numeric|is_unique[anggota_pkk.no_wa]|max_length[13]|min_length[10]';
      }

      if ($anggotaPkkLama['nik'] == $this->request->getPost('nik_ap')) {
         $aturan_nik = 'required|numeric|max_length[16]|min_length[16]';
      } else {
         $aturan_nik = 'required|numeric|is_unique[anggota_pkk.nik]|max_length[16]|min_length[16]';
      }

      if ($anggotaPkkLama['no_kk'] == $this->request->getPost('nokk_ap')) {
         $aturan_nokk = 'required|numeric|max_length[16]|min_length[16]';
      } else {
         $aturan_nokk = 'required|numeric|is_unique[anggota_pkk.no_kk]|max_length[16]|min_length[16]';
      }

      $aturan = [
         'nama_dan_gelar_ap' => [
            'rules' => 'required|regex_match[/^[a-zA-Z.,\s]+$/]',
            'errors' => [
               'required' => 'Nama harus diisi',
               'regex_match' => 'Nama dan gelar hanya boleh berisi huruf, spasi, titik, dan koma'
            ]
         ],
         'nik_ap' => [
            'rules' => $aturan_nik,
            'errors' => [
               'required' => 'NIK harus diisi',
               'numeric' => 'NIK harus berupa angka',
               'is_unique' => 'NIK sudah terdaftar',
               'max_length' => 'NIK maksimal 16 digit',
               'min_length' => 'NIK minimal 16 digit'
            ]
         ],
         'nokk_ap' => [
            'rules' => $aturan_nokk,
            'errors' => [
               'required' => 'No KK harus diisi',
               'numeric' => 'No KK harus berupa angka',
               'is_unique' => 'No KK sudah terdaftar',
               'max_length' => 'No KK maksimal 16 digit',
               'min_length' => 'No KK minimal 16 digit'
            ]
         ],
         'jabatan_ap' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Jabatan harus dipilih'
            ]
         ],
         'nowa_ap' => [
            'rules' => $aturan_nowa,
            'errors' => [
               'required' => 'No Wa harus diisi',
               'numeric' => 'No Wa harus berupa angka',
               'is_unique' => 'No Wa sudah terdaftar',
               'max_length' => 'No Wa maksimal 13 digit',
               'min_length' => 'No Wa minimal 10 digit'
            ]
         ],
         'alamat_ap' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Alamat harus diisi'
            ]
         ]
      ];
      $validasi->setRules($aturan);
      if ($validasi->withRequest($this->request)->run()) {
         //mengambil data dari ajax
         $id_anggota_pkk = $this->request->getPost('id_anggota_pkk');
         $nama_dan_gelar_ap1 = $this->request->getPost('nama_dan_gelar_ap');
         $nama_dan_gelar_ap = trim($nama_dan_gelar_ap1); //Menghapus spasi di awal dan akhir string
         $nik_ap1 = $this->request->getPost('nik_ap');
         $nik_ap = trim($nik_ap1); //Menghapus spasi di awal dan akhir string
         $nokk_ap1 = $this->request->getPost('nokk_ap');
         $nokk_ap = trim($nokk_ap1); //Menghapus spasi di awal dan akhir string
         $jabatan_ap = $this->request->getPost('jabatan_ap');
         $nowa_ap1 = $this->request->getPost('nowa_ap');
         $nowa_ap = trim($nowa_ap1); //Menghapus spasi di awal dan akhir string
         $alamat_ap1 = $this->request->getPost('alamat_ap');
         $alamat_ap = trim($alamat_ap1); //Menghapus spasi di awal dan akhir string
         //proses memasukkan data ke database
         $data = [
            'id_anggota_pkk' => $id_anggota_pkk,
            'nama_dan_gelar' => $nama_dan_gelar_ap,
            'nik' => $nik_ap,
            'no_kk' => $nokk_ap,
            'jabatan' => $jabatan_ap,
            'no_wa' => $nowa_ap,
            'alamat' => $alamat_ap
         ];
         $this->anggotaPkkModel->save($data);
         $hasil = [
            'sukses' => 'Berhasil mengedit data anggota pkk',
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

   //Fungsi delete_anggota_pkk
   public function delete_anggota_pkk($id_anggota_pkk)
   {
      $this->anggotaPkkModel->delete($id_anggota_pkk);
      Set_notifikasi_swal('success', 'Berhasil', 'Data anggota pkk berhasil dihapus');
      return redirect()->to('/anggota_pkk');
   }

   // Fungsi export anggota pkk
   public function export_anggota_pkk()
   {
      $anggota_pkk = $this->anggotaPkkModel->getAnggotaPkk();
      exportAnggotaPkk($anggota_pkk, 'Data_Anggota_PKK.xlsx');
   }
}
