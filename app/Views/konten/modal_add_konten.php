<!-- Modal untuk menambah user baru-->
<div class="modal fade" id="modaltambah_konten" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="" method="POST" id="formKonten">
            <div class="modal-header">
               <h5 class="modal-title">Tambah Konten Berita</h5>
               <button type="button" class="btn-close tombol-tutup-konten" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!--Kalau ada error-->
               <div class="alert alert-danger error-konten" role="alert" style="display: none"> <!--display none agar tidak ditampilkan saat pertama kali dan ditampilkan jika dipicu oleh hide() dan show() dari script jquery-->
               </div>
               <!--Kalau sukses-->
               <div class="alert alert-success sukses-konten" role="alert" style="display: none">
               </div>
               <?= csrf_field(); ?>
               <div class="row mb-3">
                  <label for="judul" class="ms-1">Judul</label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="judul" id="judul">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="deskripsi" class="ms-1">Deskripsi</label>
                  <div class="col-sm-12">
                     <textarea class="form-control" name="deskripsi" id="deskripsi" rows="10"></textarea>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="foto" class="ms-1">Gambar</label>
                  <div style="color: red; font-size: 13px;" class="ms-1">Ukuran maksimal gambar 1 mb</div>
                  <div class="col-sm-3">
                     <img src="" class="img-thumbnail img-preview-konten" id="img-preview-konten" alt="">
                  </div>
                  <div class="col-sm-9">
                     <div class="input-group">
                        <input class="form-control" type="file" id="gambar" onchange="previewImg_konten()">
                     </div>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="caption" class="ms-1">Caption Gambar</label>
                  <div class="col-sm-12">
                     <textarea class="form-control" name="caption" id="caption" rows="3"></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary tombol-tutup-konten" data-bs-dismiss="modal">Tutup</button>
               <button type="button" class="btn btn-primary" id="tombol-simpan-add-konten">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>