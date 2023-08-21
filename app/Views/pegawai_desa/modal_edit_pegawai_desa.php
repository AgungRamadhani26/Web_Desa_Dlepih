<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaledit_pegawai_desa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="" method="POST" id="formPegawaiDesa_e">
            <div class="modal-header">
               <h5 class="modal-title">Edit Pegawai Desa</h5>
               <button type="button" class="btn-close tombol-tutup-pegawai-desa" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!--Kalau ada error-->
               <div class="alert alert-danger error-pegawai-desa_e" role="alert" style="display: none"> <!--display none agar tidak ditampilkan saat pertama kali dan ditampilkan jika dipicu oleh hide() dan show() dari script jquery-->
               </div>
               <!--Kalau sukses-->
               <div class="alert alert-success sukses-pegawai-desa_e" role="alert" style="display: none">
               </div>
               <?= csrf_field(); ?>
               <input type="hidden" name="id_pegawai_desa_e" id="id_pegawai_desa_e">
               <div class="row mb-3">
                  <label for="nama_dan_gelar" class="ms-1">Nama dan Gelar</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nama_dan_gelar_pd_e" id="nama_dan_gelar_pd_e">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="jabatan" class="ms-1">Jabatan</label>
                  <div class="col-sm-12">
                     <select class="form-control" id="jabatan_pd_e">
                        <option value="">-- Pilih Jabatan --</option>
                        <option value="Kepala Desa">Kepala Desa</option>
                        <option value="Sekretaris Desa">Sekretaris Desa</option>
                        <option value="Kepala Urusan Keuangan">Kepala Urusan Keuangan</option>
                        <option value="Kepala Urusan Perencanaan">Kepala Urusan Perencanaan</option>
                        <option value="Kepala Seksi Pemerintahan">Kepala Seksi Pemerintahan</option>
                        <option value="Kepala Seksi Kesejahteraan">Kepala Seksi Kesejahteraan</option>
                        <option value="Kepala Seksi Pelayanan">Kepala Seksi Pelayanan</option>
                        <option value="Kepala Dusun Natah, Ngrejeng, Sugihan">Kepala Dusun Natah, Ngrejeng, Sugihan</option>
                        <option value="Kepala Dusun Ngelo, Warak, Bengle">Kepala Dusun Ngelo, Warak, Bengle</option>
                        <option value="Kepala Dusun Karakan, Dlepih, Bangunsari, Sumberejo">Kepala Dusun Karakan, Dlepih, Bangunsari, Sumberejo</option>
                     </select>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="nik" class="ms-1">NIK</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nik_pd_e" id="nik_pd_e">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="nokk" class="ms-1">No KK</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nokk_pd_e" id="nokk_pd_e">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="email" class="ms-1">Email</label>
                  <div class="col-sm-12">
                     <input type="email" class="form-control" name="email_pd_e" id="email_pd_e">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="nowa" class="ms-1">No HP</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nowa_pd_e" id="nowa_pd_e">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="alamat" class="ms-1">Alamat</label>
                  <div class="col-sm-12">
                     <textarea class="form-control" name="alamat_pd_e" id="alamat_pd_e" rows="4"></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-pegawai-desa" data-bs-dismiss="modal">Tutup</button>
               <button type="button" class="btn btn-primary" id="tombol-simpan-edit-pegawai-desa">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>