<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaltambah_rw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="" method="POST" id="formRW">
            <div class="modal-header">
               <h5 class="modal-title">Tambah Ketua RW</h5>
               <button type="button" class="btn-close tombol-tutup-rw" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!--Kalau ada error-->
               <div class="alert alert-danger error-rw" role="alert" style="display: none"> <!--display none agar tidak ditampilkan saat pertama kali dan ditampilkan jika dipicu oleh hide() dan show() dari script jquery-->
               </div>
               <!--Kalau sukses-->
               <div class="alert alert-success sukses-rw" role="alert" style="display: none">
               </div>
               <?= csrf_field(); ?>
               <div class="row mb-3">
                  <label for="nama_dan_gelar" class="ms-1">Nama dan Gelar</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nama_dan_gelar_rw" id="nama_dan_gelar_rw">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="nik" class="ms-1">NIK</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nik_rw" id="nik_rw">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="nokk" class="ms-1">No KK</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nokk_rw" id="nokk_rw">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="rw" class="ms-1">RW</label>
                  <div class="col-sm-12">
                     <select class="form-control" id="rw">
                        <option value="">-- Pilih RW --</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                     </select>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="dusun" class="ms-1">Dusun</label>
                  <div class="col-sm-12">
                     <select class="form-control" id="dusun_rw">
                        <option value="">-- Pilih Dusun --</option>
                        <option value="Natah">Natah</option>
                        <option value="Ngrejeng">Ngrejeng</option>
                        <option value="Sugihan">Sugihan</option>
                        <option value="Ngelo">Ngelo</option>
                        <option value="Bengle">Bengle</option>
                        <option value="Warak">Warak</option>
                        <option value="Karakan">Karakan</option>
                        <option value="Dlepih">Dlepih</option>
                        <option value="Bangunsari">Bangunsari</option>
                        <option value="Sumberejo">Sumberejo</option>
                     </select>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="nowa" class="ms-1">No HP</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nowa_rw" id="nowa_rw">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="alamat" class="ms-1">Alamat</label>
                  <div class="col-sm-12">
                     <textarea class="form-control" name="alamat_rw" id="alamat_rw" rows="4"></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-rw" data-bs-dismiss="modal">Tutup</button>
               <button type="button" class="btn btn-primary" id="tombol-simpan-add-rw">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>