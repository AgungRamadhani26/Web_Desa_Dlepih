<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaledit_konten" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="" method="POST" id="formKonten_e">
            <div class="modal-header">
               <h5 class="modal-title">Edit Konten Berita</h5>
               <button type="button" class="btn-close tombol-tutup-konten" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!--Kalau ada error-->
               <div class="alert alert-danger error-konten_e" role="alert" style="display: none"> <!--display none agar tidak ditampilkan saat pertama kali dan ditampilkan jika dipicu oleh hide() dan show() dari script jquery-->
               </div>
               <!--Kalau sukses-->
               <div class="alert alert-success sukses-konten_e" role="alert" style="display: none">
               </div>
               <?= csrf_field(); ?>
               <input type="hidden" name="id_konten_e" id="id_konten_e">
               <input type="hidden" name="gambarlama_e" id="gambarlama_e">
               <div class="row mb-3">
                  <label for="judul" class="ms-1">Judul</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="judul_e" id="judul_e">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="deskripsi" class="ms-1">Deskripsi</label>
                  <div class="col-sm-12">
                     <textarea class="form-control" name="deskripsi_e" id="deskripsi_e" rows="10"></textarea>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="foto" class="ms-1">Gambar</label>
                  <div style="color: red; font-size: 13px;" class="ms-1">Ukuran maksimal gambar 1 mb</div>
                  <div class="col-sm-3">
                     <img src="" class="img-thumbnail img-preview-konten_e" id="img-preview-konten_e" alt="">
                  </div>
                  <div class="col-sm-9">
                     <div class="input-group">
                        <input class="form-control" type="file" id="gambar_e" onchange="previewImg_konten_e()">
                     </div>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="caption" class="ms-1">Caption Gambar</label>
                  <div class="col-sm-12">
                     <textarea class="form-control" name="caption_e" id="caption_e" rows="3"></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-konten" data-bs-dismiss="modal">Tutup</button>
               <button type="button" class="btn btn-primary" id="tombol-simpan-edit-konten">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>