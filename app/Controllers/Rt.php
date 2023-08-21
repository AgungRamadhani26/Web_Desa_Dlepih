<?php

namespace App\Controllers;

use App\Models\RtModel;
use App\Models\RwModel;

class Rt extends BaseController
{
   //Konstruktor agar semua method dapat menggunakan model Rt
   protected $rtModel;
   protected $rwModel;
   public function __construct()
   {
      $this->rtModel = new  RtModel();
      $this->rwModel = new RwModel();
      helper(['swal_helper']);
      helper(['print_helper']);
   }


   public function daftar_rt()
   {
      $data = [
         'rtdusun' => $this->rtModel->getRtDusun(),
         'rw' => $this->rwModel->getRw(),
         'url' => 'rt',
         'jumlah_RT' => $this->rtModel->countRT(),
         'jumlah_RT_Natah' => $this->rtModel->countRTNatah(),
         'jumlah_RT_Ngrejeng' => $this->rtModel->countRTNgrejeng(),
         'jumlah_RT_Sugihan' => $this->rtModel->countRTSugihan(),
         'jumlah_RT_Ngelo' => $this->rtModel->countRTNgelo(),
         'jumlah_RT_Bengle' => $this->rtModel->countRTBengle(),
         'jumlah_RT_Warak' => $this->rtModel->countRTWarak(),
         'jumlah_RT_Karakan' => $this->rtModel->countRTKarakan(),
         'jumlah_RT_Dlepih' => $this->rtModel->countRTDlepih(),
         'jumlah_RT_Bangunsari' => $this->rtModel->countRTBangunsari(),
         'jumlah_RT_Sumberejo' => $this->rtModel->countRTSumberejo(),
      ];
      return view('rt/daftar_rt', $data);
   }


   public function tambah_rt()
   {
      $validasi = \Config\Services::validation();
      $aturan = [
         'nama_dan_gelar_rt' => [
            'rules' => 'required|regex_match[/^[a-zA-Z.,\s]+$/]',
            'errors' => [
               'required' => 'Nama harus diisi',
               'regex_match' => 'Nama dan gelar hanya boleh berisi huruf, spasi, titik, dan koma'
            ]
         ],
         'nik_rt' => [
            'rules' => 'required|numeric|is_unique[rt.nik]|max_length[16]|min_length[16]',
            'errors' => [
               'required' => 'NIK harus diisi',
               'numeric' => 'NIK harus berupa angka',
               'is_unique' => 'NIK sudah terdaftar',
               'max_length' => 'NIK maksimal 16 digit',
               'min_length' => 'NIK minimal 16 digit'
            ]
         ],
         'nokk_rt' => [
            'rules' => 'required|numeric|is_unique[rt.no_kk]|max_length[16]|min_length[16]',
            'errors' => [
               'required' => 'No KK harus diisi',
               'numeric' => 'No KK harus berupa angka',
               'is_unique' => 'No KK sudah terdaftar',
               'max_length' => 'No KK maksimal 16 digit',
               'min_length' => 'No KK minimal 16 digit'
            ]
         ],
         'rw_rt' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'RW harus dipilih'
            ]
         ],
         'rt' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'RT harus dipilih'
            ]
         ],
         'nowa_rt' => [
            'rules' => 'required|numeric|is_unique[rt.no_wa]|max_length[13]|min_length[10]',
            'errors' => [
               'required' => 'No Wa harus diisi',
               'numeric' => 'No Wa harus berupa angka',
               'is_unique' => 'No Wa sudah terdaftar',
               'max_length' => 'No Wa maksimal 13 digit',
               'min_length' => 'No Wa minimal 10 digit'
            ]
         ],
         'alamat_rt' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Alamat harus diisi'
            ]
         ]
      ];
      $validasi->setRules($aturan);
      if ($validasi->withRequest($this->request)->run()) {
         //Mengambil data dari ajax
         $nama_dan_gelar_rt1 = $this->request->getPost('nama_dan_gelar_rt');
         $nama_dan_gelar_rt = trim($nama_dan_gelar_rt1); //Menghapus spasi di awal dan akhir string
         $nik_rt1 = $this->request->getPost('nik_rt');
         $nik_rt = trim($nik_rt1);
         $nokk_rt1 = $this->request->getPost('nokk_rt');
         $nokk_rt = trim($nokk_rt1);
         $rw_rt = $this->request->getPost('rw_rt');
         $rt = $this->request->getPost('rt');
         $nowa_rt1 = $this->request->getPost('nowa_rt');
         $nowa_rt = trim($nowa_rt1); //Menghapus spasi di awal dan akhir string
         $alamat_rt1 = $this->request->getPost('alamat_rt');
         $alamat_rt = trim($alamat_rt1); //Menghapus spasi di awal dan akhir string
         //proses memasukkan data ke database
         $data = [
            'nama_dan_gelar' => $nama_dan_gelar_rt,
            'nik' => $nik_rt,
            'no_kk' => $nokk_rt,
            'id_rw' => $rw_rt,
            'nama_rt' => $rt,
            'no_wa' => $nowa_rt,
            'alamat' => $alamat_rt,
         ];
         $this->rtModel->save($data);
         $hasil = [
            'sukses' => 'Data RT berhasil ditambahkan',
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


   public function edit_rt($id_rt)
   {
      return json_encode($this->rtModel->find($id_rt));
   }
   //Fungsi update_pegawai_desa
   public function update_rt()
   {
      $validasi = \Config\Services::validation();
      $rtLama = $this->rtModel->getRt($this->request->getPost('id_rt'));

      if ($rtLama['no_wa'] == $this->request->getPost('nowa_rt')) {
         $aturan_nowa = 'required|numeric|max_length[13]|min_length[10]';
      } else {
         $aturan_nowa = 'required|numeric|is_unique[rt.no_wa]|max_length[13]|min_length[10]';
      }

      if ($rtLama['nik'] == $this->request->getPost('nik_rt')) {
         $aturan_nik = 'required|numeric|max_length[16]|min_length[16]';
      } else {
         $aturan_nik = 'required|numeric|is_unique[rt.nik]|max_length[16]|min_length[16]';
      }

      if ($rtLama['no_kk'] == $this->request->getPost('nokk_rt')) {
         $aturan_nokk = 'required|numeric|max_length[16]|min_length[16]';
      } else {
         $aturan_nokk = 'required|numeric|is_unique[rt.no_kk]|max_length[16]|min_length[16]';
      }

      $aturan = [
         'nama_dan_gelar_rt' => [
            'rules' => 'required|regex_match[/^[a-zA-Z.,\s]+$/]',
            'errors' => [
               'required' => 'Nama harus diisi',
               'regex_match' => 'Nama dan gelar hanya boleh berisi huruf, spasi, titik, dan koma'
            ]
         ],
         'nik_rt' => [
            'rules' => $aturan_nik,
            'errors' => [
               'required' => 'NIK harus diisi',
               'numeric' => 'NIK harus berupa angka',
               'is_unique' => 'NIK sudah terdaftar',
               'max_length' => 'NIK maksimal 16 digit',
               'min_length' => 'NIK minimal 16 digit'
            ]
         ],
         'nokk_rt' => [
            'rules' => $aturan_nokk,
            'errors' => [
               'required' => 'No KK harus diisi',
               'numeric' => 'No KK harus berupa angka',
               'is_unique' => 'No KK sudah terdaftar',
               'max_length' => 'No KK maksimal 16 digit',
               'min_length' => 'No KK minimal 16 digit'
            ]
         ],
         'rw_rt' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'RW harus dipilih'
            ]
         ],
         'rt' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'RW harus dipilih'
            ]
         ],
         'nowa_rt' => [
            'rules' => $aturan_nowa,
            'errors' => [
               'required' => 'No Wa harus diisi',
               'numeric' => 'No Wa harus berupa angka',
               'is_unique' => 'No Wa sudah terdaftar',
               'max_length' => 'No Wa maksimal 13 digit',
               'min_length' => 'No Wa minimal 10 digit'
            ]
         ],
         'alamat_rt' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Alamat harus diisi'
            ]
         ]
      ];
      $validasi->setRules($aturan);
      if ($validasi->withRequest($this->request)->run()) {
         //mengambil data dari ajax
         $id_rt = $this->request->getPost('id_rt');
         $nama_dan_gelar_rt1 = $this->request->getPost('nama_dan_gelar_rt');
         $nama_dan_gelar_rt = trim($nama_dan_gelar_rt1); //Menghapus spasi di awal dan akhir string
         $nik_rt1 = $this->request->getPost('nik_rt');
         $nik_rt = trim($nik_rt1);
         $nokk_rt1 = $this->request->getPost('nokk_rt');
         $nokk_rt = trim($nokk_rt1);
         $rt = $this->request->getPost('rt');
         $rw_rt = $this->request->getPost('rw_rt');
         $nowa_rt1 = $this->request->getPost('nowa_rt');
         $nowa_rt = trim($nowa_rt1); //Menghapus spasi di awal dan akhir string
         $alamat_rt1 = $this->request->getPost('alamat_rt');
         $alamat_rt = trim($alamat_rt1); //Menghapus spasi di awal dan akhir string
         //proses memasukkan data ke database
         $data = [
            'id_rt' => $id_rt,
            'nama_dan_gelar' => $nama_dan_gelar_rt,
            'nik' => $nik_rt,
            'no_kk' => $nokk_rt,
            'id_rw' => $rw_rt,
            'nama_rt' => $rt,
            'no_wa' => $nowa_rt,
            'alamat' => $alamat_rt,
         ];
         $this->rtModel->save($data);
         $hasil = [
            'sukses' => 'Berhasil mengedit data RT',
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
   public function delete_rt($id_rt)
   {
      $this->rtModel->delete($id_rt);
      Set_notifikasi_swal('success', 'Berhasil', 'Data RT berhasil dihapus');
      return redirect()->to('/rt');
   }

   // Fungsi export_rt
   public function export_rt()
   {
      $rt = $this->rtModel->getRtDusun();
      exportRT($rt, 'Data_RT.xlsx');
   }
}
