<?= $this->extend('/layout/templete'); ?>

<?= $this->section('content'); ?>

<!-- dashboard inner -->
<div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>Menu PKK</h2>
            </div>
         </div>
      </div>
      <div class="row column1">
         <div class="col-md-3">
            <div class="white_shd full margin_bottom_30">
               <div style="background-color: aliceblue;" class="card-header">
                  <h5>Jumlah Anggota PKK</h5>
               </div>
               <div class="card-body">
                  <table>
                     <tr class="text-secondary">
                        <th>Semua</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th><?= $jlh_anggota_pkk ?></th>
                     </tr>
                     <tr class="text-primary">
                        <th>Ketua</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th><?= $jlh_ketua ?></th>
                     </tr>
                     <tr class="text-danger-emphasis">
                        <th>Wakil Ketua</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th><?= $jlh_wakil_ketua ?></th>
                     </tr>
                     <tr class="text-success">
                        <th>Sekretaris</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th><?= $jlh_sekretaris ?></th>
                     </tr>
                     <tr class="text-danger">
                        <th>Bendahara</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th><?= $jlh_bendahara ?></th>
                     </tr>
                     <tr class="text-warning">
                        <th>Ketua Pokja</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th><?= $jlh_ketua_pokja ?></th>
                     </tr>
                     <tr class="text-info">
                        <th>Anggota</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th><?= $jlh_anggota ?></th>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
         <!-- table section -->
         <div class="col-md-9">
            <div class="white_shd full margin_bottom_30">
               <div class="full graph_head">
                  <div class="heading1 margin_0">
                     <div class="row">
                        <div class="col-8">
                           <h2>Daftar Anggota PKK</h2>
                        </div>
                        <div class="col-2">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambah_anggota_pkk">
                              <div class="fa fa-plus"></div>
                           </button>
                        </div>
                        <div class="col-2">
                           <a href="/anggota_pkk/export_anggota_pkk" class="btn btn-secondary">
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
                           <?php foreach ($anggota_pkk as $angpkk) : ?>
                              <tr>
                                 <?php
                                 $nomor_teleponap_1 = $angpkk['no_wa']; // nomor telepon dengan awalan 0
                                 if (substr($nomor_teleponap_1, 0, 1) == '0') {
                                    $nomor_teleponap = '+62' . substr($nomor_teleponap_1, 1);
                                 }
                                 ?>
                                 <td><?= $i++ ?></td>
                                 <td><?= $angpkk['nama_dan_gelar'] ?></td>
                                 <td><?= $angpkk['nik'] ?></td>
                                 <td><?= $angpkk['no_kk'] ?></td>
                                 <td><?= $angpkk['jabatan'] ?></td>
                                 <td><?= $angpkk['no_wa'] ?></td>
                                 <td><?= $angpkk['alamat'] ?></td>
                                 <td>
                                    <a href="https://wa.me/<?= $nomor_teleponap ?>" target="_blank" class="btn btn-success">
                                       <div class="fa fa-phone"></div>
                                    </a>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaledit_anggota_pkk" onclick="edit_anggota_pkk(<?php echo $angpkk['id_anggota_pkk'] ?>)">
                                       <div class="fa fa-edit"></div>
                                    </button>
                                    <form action="/anggota_pkk/delete_anggota_pkk/<?= $angpkk['id_anggota_pkk'] ?>" method="POST" class="d-inline">
                                       <?= csrf_field(); ?>
                                       <input type="hidden" name="_method" value="DELETE">
                                       <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data anggota pkk ?');">
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
<?= $this->include('/anggota_pkk/modal_add_anggota_pkk'); ?>
<!-- Modal untuk mengedit user -->
<?= $this->include('/anggota_pkk/modal_edit_anggota_pkk'); ?>

<?= $this->endSection(); ?>