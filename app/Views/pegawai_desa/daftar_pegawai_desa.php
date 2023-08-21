<?= $this->extend('/layout/templete'); ?>

<?= $this->section('content'); ?>

<!-- dashboard inner -->
<div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>Menu Pegawai</h2>
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
                           <h2>Daftar Pegawai</h2>
                        </div>
                        <div class="col-2">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambah_pegawai_desa">
                              <div class="fa fa-plus"></div>
                           </button>
                        </div>
                        <div class="col-2">
                           <a href="/pegawai_desa/export_pegawai_desa" class="btn btn-secondary">
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
                              <th>Jabatan</th>
                              <th>NIK</th>
                              <th>No KK</th>
                              <th>email</th>
                              <th>No HP</th>
                              <th>Alamat</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $i = 1 ?>
                           <?php foreach ($pegawaidesa as $pd) : ?>
                              <tr>
                                 <?php
                                 $nomor_teleponpd_1 = $pd['no_wa']; // nomor telepon dengan awalan 0
                                 if (substr($nomor_teleponpd_1, 0, 1) == '0') {
                                    $nomor_teleponpd = '+62' . substr($nomor_teleponpd_1, 1);
                                 }
                                 ?>
                                 <td><?= $i++ ?></td>
                                 <td><?= $pd['nama_dan_gelar'] ?></td>
                                 <td><?= $pd['jabatan'] ?></td>
                                 <td><?= $pd['nik'] ?></td>
                                 <td><?= $pd['no_kk'] ?></td>
                                 <td><?= $pd['email'] ?></td>
                                 <td><?= $pd['no_wa'] ?></td>
                                 <td><?= $pd['alamat'] ?></td>
                                 <td>
                                    <a href="https://wa.me/<?= $nomor_teleponpd ?>" target="_blank" class="btn btn-success">
                                       <div class="fa fa-phone"></div>
                                    </a>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaledit_pegawai_desa" onclick="edit_pegawai_desa(<?php echo $pd['id_pegawai_desa'] ?>)">
                                       <div class="fa fa-edit"></div>
                                    </button>
                                    <form action="/pegawai_desa/delete_pegawai_desa/<?= $pd['id_pegawai_desa'] ?>" method="POST" class="d-inline">
                                       <?= csrf_field(); ?>
                                       <input type="hidden" name="_method" value="DELETE">
                                       <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data pegawai desa ?');">
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
<?= $this->include('/pegawai_desa/modal_add_pegawai_desa'); ?>
<!-- Modal untuk mengedit user -->
<?= $this->include('/pegawai_desa/modal_edit_pegawai_desa') ?>

<?= $this->endSection(); ?>