<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaltambah_rt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="" method="POST" id="formRT">
            <div class="modal-header">
               <h5 class="modal-title">Tambah Ketua RT</h5>
               <button type="button" class="btn-close tombol-tutup-rt" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!--Kalau ada error-->
               <div class="alert alert-danger error-rt" role="alert" style="display: none"> <!--display none agar tidak ditampilkan saat pertama kali dan ditampilkan jika dipicu oleh hide() dan show() dari script jquery-->
               </div>
               <!--Kalau sukses-->
               <div class="alert alert-success sukses-rt" role="alert" style="display: none">
               </div>
               <?= csrf_field(); ?>
               <div class="row mb-3">
                  <label for="nama_dan_gelar" class="ms-1">Nama dan Gelar</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nama_dan_gelar_rt" id="nama_dan_gelar_rt">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="nik" class="ms-1">NIK</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nik_rt" id="nik_rt">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="nokk" class="ms-1">No KK</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nokk_rt" id="nokk_rt">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="rw" class="ms-1">RW</label>
                  <div class="col-sm-12">
                     <select class="form-control" id="rw_rt">
                        <option value="">-- Pilih RW --</option>
                        <?php foreach ($rw as $w) : ?>
                           <option value="<?= $w['id_rw'] ?>"><?= $w['nama_rw'] . '-' . $w['dusun'] ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="rt" class="ms-1">RT</label>
                  <div class="col-sm-12">
                     <select class="form-control" id="rt">
                        <option value="">-- Pilih RT --</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                     </select>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="nowa" class="ms-1">No HP</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nowa_rt" id="nowa_rt">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="alamat" class="ms-1">Alamat</label>
                  <div class="col-sm-12">
                     <textarea class="form-control" name="alamat_rt" id="alamat_rt" rows="4"></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-rt" data-bs-dismiss="modal">Tutup</button>
               <button type="button" class="btn btn-primary" id="tombol-simpan-add-rt">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>