<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaledit_anggota_bumdes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="" method="POST" id="formAnggotaBumdes_e">
            <div class="modal-header">
               <h5 class="modal-title">Edit Anggota BUMDes</h5>
               <button type="button" class="btn-close tombol-tutup-anggota-bumdes" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!--Kalau ada error-->
               <div class="alert alert-danger error-anggota-bumdes_e" role="alert" style="display: none"> <!--display none agar tidak ditampilkan saat pertama kali dan ditampilkan jika dipicu oleh hide() dan show() dari script jquery-->
               </div>
               <!--Kalau sukses-->
               <div class="alert alert-success sukses-anggota-bumdes_e" role="alert" style="display: none">
               </div>
               <?= csrf_field(); ?>
               <input type="hidden" name="id_anggota_bumdes_e" id="id_anggota_bumdes_e">
               <div class="row mb-3">
                  <label for="nama_dan_gelar" class="ms-1">Nama dan Gelar</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nama_dan_gelar_ab_e" id="nama_dan_gelar_ab_e">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="nik" class="ms-1">NIK</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nik_ab_e" id="nik_ab_e">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="nokk" class="ms-1">No KK</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nokk_ab_e" id="nokk_ab_e">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="jabatan" class="ms-1">Jabatan</label>
                  <div class="col-sm-12">
                     <select class="form-control" id="jabatan_ab_e">
                        <option value="">-- Pilih Jabatan --</option>
                        <option value="Penasihat">Penasihat</option>
                        <option value="Ketua Dewan Pengawas">Ketua Dewan Pengawas</option>
                        <option value="Sekretaris Dewan Pengawas">Sekretaris Dewan Pengawas</option>
                        <option value="Anggota Dewan Pengawas">Anggota Dewan Pengawas</option>
                        <option value="Direktur">Direktur</option>
                        <option value="Sekretaris">Sekretaris</option>
                        <option value="Bendahara">Bendahara</option>
                        <option value="Manager/Staf Unit Jasa dan Persewaan">Manager/Staf Unit Jasa dan Persewaan</option>
                        <option value="Manager/Staf Unit Perdagangan">Manager/Staf Unit Perdagangan</option>
                        <option value="Manager/Staf Unit Produksi">Manager/Staf Unit Produksi</option>
                        <option value="Manager/Staf Unit Industri dan Kerajinan Rakyat">Manager/Staf Unit Industri dan Kerajinan Rakyat</option>
                     </select>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="nowa" class="ms-1">No HP</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nowa_ab_e" id="nowa_ab_e">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="alamat" class="ms-1">Alamat</label>
                  <div class="col-sm-12">
                     <textarea class="form-control" name="alamat_ab_e" id="alamat_ab_e" rows="4"></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-anggota-bumdes" data-bs-dismiss="modal">Tutup</button>
               <button type="button" class="btn btn-primary" id="tombol-simpan-edit-anggota-bumdes">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>