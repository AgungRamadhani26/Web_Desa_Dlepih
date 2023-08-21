<?= $this->extend('layout/templete'); ?>

<?= $this->section('content'); ?>

<!-- dashboard inner -->
<div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>Menu Konten Berita</h2>
            </div>
         </div>
      </div>
      <div class="row column1">
         <!-- table section -->
         <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
               <div class="full graph_head">
                  <div class="heading1 margin_0">
                     <div class="row">
                        <div class="col-10">
                           <h2>Daftar Berita</h2>
                        </div>
                        <div class="col-2">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambah_konten">
                              <div class="fa fa-plus"></div>
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="table_section padding_infor_info">
                  <div class="table-responsive-sm">
                     <table class="table table-striped" id="datatablesSimple">
                        <thead>
                           <tr>
                              <th>No</th>
                              <th>Gambar</th>
                              <th>Caption Gambar</th>
                              <th>Judul</th>
                              <th>Deskripsi</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $i = 1 ?>
                           <?php foreach ($konten as $k) : ?>
                              <tr>
                                 <td><?= $i++ ?></td>
                                 <td><img src="/assets/img/konten/<?= $k['gambar'] ?>" alt="foto user" width="63px"></td>
                                 <td><?= $k['caption_gambar'] ?></td>
                                 <td><?= $k['judul'] ?></td>
                                 <td>
                                    <p style="text-align: justify; color: black"><?= $k['deskripsi'] ?></p>
                                 </td>
                                 <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaledit_konten" onclick="edit_konten(<?php echo $k['id_konten'] ?>)">
                                       <div class="fa fa-edit"></div>
                                    </button>
                                    <form action="/konten/delete_konten/<?= $k['id_konten'] ?>" method="POST" class="d-inline">
                                       <?= csrf_field(); ?>
                                       <input type="hidden" name="_method" value="DELETE">
                                       <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data konten ?');">
                                          <div class="fa fa-trash-o"></div>
                                       </button>
                                    </form>
                                 </td>
                              </tr>
                           <?php endforeach; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <!-- table section -->
      </div>
   </div>
</div>
<!-- end dashboard inner -->

<!-- Modal untuk menambah user baru-->
<?= $this->include('/konten/modal_add_konten'); ?>
<!-- Modal untuk mengedit user -->
<?= $this->include('/konten/modal_edit_konten'); ?>

<?= $this->endSection(); ?>