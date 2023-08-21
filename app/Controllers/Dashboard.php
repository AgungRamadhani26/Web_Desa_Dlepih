<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\PegawaiDesaModel;
use App\Models\RwModel;
use App\Models\RtModel;
use App\Models\AnggotaPkkModel;
use App\Models\AnggotaBumdesModel;
use App\Models\KontenModel;

class Dashboard extends BaseController
{
   //Konstruktor agar semua method dapat menggunakan model Users
   protected $usersModel;
   protected $pegawaiDesaModel;
   protected $rwModel;
   protected $rtModel;
   protected $anggotaPkkModel;
   protected $anggotaBumdesModel;
   protected $kontenModel;
   public function __construct()
   {
      $this->usersModel = new UsersModel();
      $this->pegawaiDesaModel = new PegawaiDesaModel();
      $this->rwModel = new RwModel();
      $this->rtModel = new RtModel();
      $this->anggotaPkkModel = new AnggotaPkkModel();
      $this->anggotaBumdesModel = new AnggotaBumdesModel();
      $this->kontenModel = new KontenModel();
      helper(['swal_helper']);
   }

   public function index()
   {
      $data = [
         'users' => $this->usersModel->getUsers(),
         'konten' => $this->kontenModel->getKontenTerbaru(),
      ];
      return view('layout/home', $data);
   }

   public function dashboard()
   {
      $data = [
         'url' => 'dashboard',
         'jumlah_user' => $this->usersModel->countUsers(),
         'jumlah_pegawai_desa' => $this->pegawaiDesaModel->countPegawaiDesa(),
         'jumlah_rw' => $this->rwModel->countRw(),
         'jumlah_rt' => $this->rtModel->countRT(),
         'jumlah_anggota_pkk' => $this->anggotaPkkModel->countAnggotaPkk(),
         'jumlah_anggota_bumdes' => $this->anggotaBumdesModel->countAnggotaBumdes()
      ];
      return view('dashboard/dashboard', $data);
   }

   public function bacaberita($id_konten)
   {
      $data = [
         'konten' => $this->kontenModel->getKonten($id_konten),
      ];
      return view('layout/bacaberita', $data);
   }

   public function daftar_baca_berita()
   {
      $data = [
         'konten' => $this->kontenModel->getKonten(),
         'jumlah_konten' => $this->kontenModel->countKonten(),
      ];
      return view('layout/daftar_baca_berita', $data);
   }
}
