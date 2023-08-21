<?= $this->extend('/layout/templete'); ?>

<?= $this->section('content'); ?>

<!-- dashboard inner -->
<div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>Menu Pengguna</h2>
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
                           <h2>Daftar Pengguna</h2>
                        </div>
                        <div class="col-2">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambah_user">
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
                              <th>Foto</th>
                              <th>Nama dan Gelar</th>
                              <th>Email</th>
                              <th>No HP</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $i = 1 ?>
                           <?php foreach ($users as $u) : ?>
                              <tr>
                                 <?php
                                 $nomor_telepon1 = $u['no_wa']; // nomor telepon dengan awalan 0
                                 if (substr($nomor_telepon1, 0, 1) == '0') {
                                    $nomor_telepon = '+62' . substr($nomor_telepon1, 1);
                                 }
                                 ?>
                                 <td><?= $i++ ?></td>
                                 <td><img src="/assets/img/foto_users/<?= $u['foto'] ?>" alt="foto user" width="63px"></td>
                                 <td><?= $u['nama_dan_gelar'] ?></td>
                                 <td><?= $u['email'] ?></td>
                                 <td><?= $u['no_wa'] ?></td>
                                 <td>
                                    <a href="https://wa.me/<?= $nomor_telepon ?>" target="_blank" class="btn btn-success">
                                       <div class="fa fa-phone"></div>
                                    </a>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaledit_user" onclick="edit_user(<?php echo $u['id_user'] ?>)">
                                       <div class="fa fa-edit"></div>
                                    </button>
                                    <form action="/users/delete_users/<?= $u['id_user'] ?>" method="POST" class="d-inline">
                                       <?= csrf_field(); ?>
                                       <input type="hidden" name="_method" value="DELETE">
                                       <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data user ?');">
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
<?= $this->include('/users/modal_add_users'); ?>
<!-- Modal untuk mengedit user -->
<?= $this->include('/users/modal_edit_users'); ?>

<?= $this->endSection(); ?>