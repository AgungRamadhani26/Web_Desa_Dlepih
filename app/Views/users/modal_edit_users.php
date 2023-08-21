<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaledit_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="" method="POST" id="formUser_e">
            <div class="modal-header">
               <h5 class="modal-title">Edit User</h5>
               <button type="button" class="btn-close tombol-tutup-user" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!--Kalau ada error-->
               <div class="alert alert-danger error-users_e" role="alert" style="display: none"> <!--display none agar tidak ditampilkan saat pertama kali dan ditampilkan jika dipicu oleh hide() dan show() dari script jquery-->
               </div>
               <!--Kalau sukses-->
               <div class="alert alert-success sukses-users_e" role="alert" style="display: none">
               </div>
               <?= csrf_field(); ?>
               <input type="hidden" name="id_user_e" id="id_user_e">
               <input type="hidden" name="fotolama_e" id="fotolama_e">
               <div class="row mb-3">
                  <label for="nama_dan_gelar" class="ms-1">Nama dan Gelar</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nama_dan_gelar_e" id="nama_dan_gelar_e">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="email" class="ms-1">Email</label>
                  <div class="col-sm-12">
                     <input type="email" class="form-control" name="email_e" id="email_e">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="nowa" class="ms-1">No HP</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="nowa_e" id="nowa_e">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="foto" class="ms-1">Foto</label>
                  <div style="color: red; font-size: 13px;" class="ms-1">Ukuran maksimal gambar 1 mb</div>
                  <div class="col-sm-3">
                     <img src="" class="img-thumbnail img-preview_e" id="img-preview_e" alt="">
                  </div>
                  <div class="col-sm-9">
                     <div class="input-group">
                        <input class="form-control" type="file" id="foto_e" onchange="previewImg_e()">
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-user" data-bs-dismiss="modal">Tutup</button>
               <button type="button" class="btn btn-primary" id="tombol-simpan-edit-users">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>