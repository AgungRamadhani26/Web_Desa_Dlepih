<?= $this->extend('layout/templete'); ?>

<?= $this->section('content'); ?>

<!-- dashboard inner -->
<div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>Menu BUMDes</h2>
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
                           <h2>Daftar Anggota BUMDes</h2>
                        </div>
                        <div class="col-2">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambah_anggota_bumdes">
                              <div class="fa fa-plus"></div>
                           </button>
                        </div>
                        <div class="col-2">
                           <a href="/anggota_bumdes/export_anggota_bumdes" class="btn btn-secondary">
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
                              <th>Jabatan</th>
                              <th>No HP</th>
                              <th>Alamat</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $i = 1 ?>
                           <?php foreach ($anggota_bumdes as $angb) : ?>
                              <tr>
                                 <?php
                                 $nomor_teleponbd_1 = $angb['no_wa']; // nomor telepon dengan awalan 0
                                 if (substr($nomor_teleponbd_1, 0, 1) == '0') {
                                    $nomor_teleponbd = '+62' . substr($nomor_teleponbd_1, 1);
                                 }
                                 ?>
                                 <td><?= $i++ ?></td>
                                 <td><?= $angb['nama_dan_gelar'] ?></td>
                                 <td><?= $angb['nik'] ?></td>
                                 <td><?= $angb['no_kk'] ?></td>
                                 <td><?= $angb['jabatan'] ?></td>
                                 <td><?= $angb['no_wa'] ?></td>
                                 <td><?= $angb['alamat'] ?></td>
                                 <td>
                                    <a href="https://wa.me/<?= $nomor_teleponbd ?>" target="_blank" class="btn btn-success">
                                       <div class="fa fa-phone"></div>
                                    </a>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaledit_anggota_bumdes" onclick="edit_anggota_bumdes(<?php echo $angb['id_anggota_bumdes'] ?>)">
                                       <div class="fa fa-edit"></div>
                                    </button>
                                    <form action="/anggota_bumdes/delete_anggota_bumdes/<?= $angb['id_anggota_bumdes'] ?>" method="POST" class="d-inline">
                                       <?= csrf_field(); ?>
                                       <input type="hidden" name="_method" value="DELETE">
                                       <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data anggota BUMDes ?');">
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
<?= $this->include('/anggota_bumdes/modal_add_anggota_bumdes'); ?>
<!-- Modal untuk mengedit user -->
<?= $this->include('/anggota_bumdes/modal_edit_anggota_bumdes'); ?>

<?= $this->endSection(); ?>