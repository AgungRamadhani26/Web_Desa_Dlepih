<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaledit_profil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="" method="POST" id="formProfil">
            <div class="modal-header">
               <h5 class="modal-title">Edit Profil</h5>
               <button type="button" class="btn-close tombol-tutup-profil" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!--Kalau ada error-->
               <div class="alert alert-danger error-profil" role="alert" style="display: none"> <!--display none agar tidak ditampilkan saat pertama kali dan ditampilkan jika dipicu oleh hide() dan show() dari script jquery-->
               </div>
               <!--Kalau sukses-->
               <div class="alert alert-success sukses-profil" role="alert" style="display: none">
               </div>
               <?= csrf_field(); ?>
               <input type="hidden" name="id_ProfilUser" id="id_ProfilUser">
               <div class="row mb-3">
                  <label for="email" class="ms-1">Email</label>
                  <div class="col-sm-12">
                     <input type="email" class="form-control" name="email_profil" id="email_profil">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="password" class="ms-1">Password Lama</label>
                  <div class="col-sm-12">
                     <input type="password" class="form-control" name="password_profil" id="password_profil">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="password" class="ms-1">Password Baru</label>
                  <div class="col-sm-12">
                     <input type="password" class="form-control" name="password_profil_baru" id="password_profil_baru">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="password" class="ms-1">Konfirmasi Password Baru</label>
                  <div class="col-sm-12">
                     <input type="password" class="form-control" name="konfirmasi_password_profil_baru" id="konfirmasi_password_profil_baru">
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-profil" data-bs-dismiss="modal">Tutup</button>
               <button type="button" class="btn btn-primary" id="tombol-simpan-edit-profil">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>