<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaltambah_anggota_pkk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="" method="POST" id="formAnggotaPkk">
            <div class="modal-header">
               <h5 class="modal-title">Tambah Anggota PKK</h5>
               <button type="button" class="btn-close tombol-tutup-anggota-pkk" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!--Kalau ada error-->
               <div class="alert alert-danger error-anggota-pkk" role="alert" style="display: none"> <!--display none agar tidak ditampilkan saat pertama kali dan ditampilkan jika dipicu oleh hide() dan show() dari script jquery-->
               </div>
               <!--Kalau sukses-->
               <div class="alert alert-success sukses-anggota-pkk" role="alert" style="display: none">
               </div>
               <?= csrf_field(); ?>
               <div class="row mb-3">
                  <label for="nama_dan_gelar" class="ms-1">Nama dan Gelar</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nama_dan_gelar_ap" id="nama_dan_gelar_ap">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="nik" class="ms-1">NIK</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nik_ap" id="nik_ap">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="nokk" class="ms-1">No KK</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nokk_ap" id="nokk_ap">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="jabatan" class="ms-1">Jabatan</label>
                  <div class="col-sm-12">
                     <select class="form-control" id="jabatan_ap">
                        <option value="">-- Pilih Jabatan --</option>
                        <option value="Ketua">Ketua</option>
                        <option value="Wakil Ketua">Wakil Ketua</option>
                        <option value="Sekretaris I">Sekretaris I</option>
                        <option value="Sekretaris II">Sekretaris II</option>
                        <option value="Bendahara I">BendaharaI</option>
                        <option value="Bendahara II">BendaharaI</option>
                        <option value="Ketua POKJA I">Ketua POKJA I</option>
                        <option value="Ketua POKJA II">Ketua POKJA II</option>
                        <option value="Ketua POKJA III">Ketua POKJA III</option>
                        <option value="Ketua POKJA IV">Ketua POKJA IV</option>
                        <option value="Anggota">Anggota</option>
                     </select>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="nowa" class="ms-1">No HP</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nowa_ap" id="nowa_ap">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="alamat" class="ms-1">Alamat</label>
                  <div class="col-sm-12">
                     <textarea class="form-control" name="alamat_ap" id="alamat_ap" rows="4"></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-anggota-pkk" data-bs-dismiss="modal">Tutup</button>
               <button type="button" class="btn btn-primary" id="tombol-simpan-anggota-pkk">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>