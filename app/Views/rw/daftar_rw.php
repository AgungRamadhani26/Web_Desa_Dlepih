<?= $this->extend('layout/templete'); ?>

<?= $this->section('content'); ?>

<!-- dashboard inner -->
<div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>Menu RW</h2>
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
                        <div class="col-8">
                           <h2>Daftar Ketua RW</h2>
                        </div>
                        <div class="col-2">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambah_rw">
                              <div class="fa fa-plus"></div>
                           </button>
                        </div>
                        <div class="col-2">
                           <a href="/rw/export_rw" class="btn btn-secondary">
                              <div class="fa fa-file-excel-o"></div>
                           </a>
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
                              <th>Nama dan Gelar</th>
                              <th>NIK</th>
                              <th>No KK</th>
                              <th>RW</th>
                              <th>Dusun</th>
                              <th>No HP</th>
                              <th>Alamat</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $i = 1 ?>
                           <?php foreach ($rw as $r) : ?>
                              <tr>
                                 <?php
                                 $nomor_teleponrw_1 = $r['no_wa']; // nomor telepon dengan awalan 0
                                 if (substr($nomor_teleponrw_1, 0, 1) == '0') {
                                    $nomor_teleponrw = '+62' . substr($nomor_teleponrw_1, 1);
                                 }
                                 ?>
                                 <td><?= $i++ ?></td>
                                 <td><?= $r['nama_dan_gelar'] ?></td>
                                 <td><?= $r['nik'] ?></td>
                                 <td><?= $r['no_kk'] ?></td>
                                 <td><?= $r['nama_rw'] ?></td>
                                 <td><?= $r['dusun'] ?></td>
                                 <td><?= $r['no_wa'] ?></td>
                                 <td><?= $r['alamat'] ?></td>
                                 <td>
                                    <a href="https://wa.me/<?= $nomor_teleponrw ?>" target="_blank" class="btn btn-success">
                                       <div class="fa fa-phone"></div>
                                    </a>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaledit_rw" onclick="edit_rw(<?php echo $r['id_rw'] ?>)">
                                       <div class="fa fa-edit"></div>
                                    </button>
                                    <form action="/rw/delete_rw/<?= $r['id_rw'] ?>" method="POST" class="d-inline">
                                       <?= csrf_field(); ?>
                                       <input type="hidden" name="_method" value="DELETE">
                                       <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data RW, penghapusan data RW akan berakibat pada terhapusnya data RT yang terkait dengan RW yang dihapus ?');">
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
<?= $this->include('/rw/modal_add_rw'); ?>
<!-- Modal untuk mengedit user -->
<?= $this->include('/rw/modal_edit_rw') ?>

<?= $this->endSection(); ?>