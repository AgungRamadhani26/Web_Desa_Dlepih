<?= $this->extend('layout/templete'); ?>

<?= $this->section('content'); ?>

<!-- dashboard inner -->
<div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>Menu RT</h2>
            </div>
         </div>
      </div>
      <div class="row column1">
         <div class="col-md-3">
            <div class="white_shd full margin_bottom_30">
               <div style="background-color: aliceblue;" class="card-header">
                  <h5>Jumlah RT Perdusun</h5>
               </div>
               <div class="card-body">
                  <table>
                     <tr class="text-secondary">
                        <th>Natah</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th><?= $jumlah_RT_Natah ?></th>
                     </tr>
                     <tr class="text-primary">
                        <th>Ngrejeng</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th><?= $jumlah_RT_Ngrejeng ?></th>
                     </tr>
                     <tr class="text-success">
                        <th>Sugihan</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th><?= $jumlah_RT_Sugihan ?></th>
                     </tr>
                     <tr class="text-danger">
                        <th>Ngelo</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th><?= $jumlah_RT_Ngelo ?></th>
                     </tr>
                     <tr class="text-warning">
                        <th>Bengle</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th><?= $jumlah_RT_Bengle ?></th>
                     </tr>
                     <tr class="text-info">
                        <th>Warak</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th><?= $jumlah_RT_Warak ?></th>
                     </tr>
                     <tr class="text-success-emphasis">
                        <th>Karakan</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th><?= $jumlah_RT_Karakan ?></th>
                     </tr>
                     <tr class="text-danger-emphasis">
                        <th>Dlepih</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th><?= $jumlah_RT_Dlepih ?></th>
                     </tr>
                     <tr class="text-warning-emphasis">
                        <th>Bangunsari</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th><?= $jumlah_RT_Bangunsari ?></th>
                     </tr>
                     <tr class="text-info-emphasis">
                        <th>Sumberejo</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th><?= $jumlah_RT_Sumberejo ?></th>
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
                           <h2>Daftar Ketua RT</h2>
                        </div>
                        <div class="col-2">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambah_rt">
                              <div class="fa fa-plus"></div>
                           </button>
                        </div>
                        <div class="col-2">
                           <a href="/rt/export_rt" class="btn btn-secondary">
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
                              <th>No_KK</th>
                              <th>RT</th>
                              <th>RW</th>
                              <th>Dusun</th>
                              <th>No HP</th>
                              <th>Alamat</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $i = 1 ?>
                           <?php foreach ($rtdusun as $rt) : ?>
                              <tr>
                                 <?php
                                 $nomor_teleponrt_1 = $rt['no_wa']; // nomor telepon dengan awalan 0
                                 if (substr($nomor_teleponrt_1, 0, 1) == '0') {
                                    $nomor_teleponrt = '+62' . substr($nomor_teleponrt_1, 1);
                                 }
                                 ?>
                                 <td><?= $i++ ?></td>
                                 <td><?= $rt['nama_dan_gelar'] ?></td>
                                 <td><?= $rt['nik'] ?></td>
                                 <td><?= $rt['no_kk'] ?></td>
                                 <td><?= $rt['nama_rt'] ?></td>
                                 <td><?= $rt['nama_rw'] ?></td>
                                 <td><?= $rt['dusun'] ?></td>
                                 <td><?= $rt['no_wa'] ?></td>
                                 <td><?= $rt['alamat'] ?></td>
                                 <td>
                                    <a href="https://wa.me/<?= $nomor_teleponrt ?>" target="_blank" class="btn btn-success">
                                       <div class="fa fa-phone"></div>
                                    </a>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaledit_rt" onclick="edit_rt(<?php echo $rt['id_rt'] ?>)">
                                       <div class="fa fa-edit"></div>
                                    </button>
                                    <form action="/rt/delete_rt/<?= $rt['id_rt'] ?>" method="POST" class="d-inline">
                                       <?= csrf_field(); ?>
                                       <input type="hidden" name="_method" value="DELETE">
                                       <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data RT ?');">
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

<!-- Modal untuk menambah rt baru-->
<?= $this->include('/rt/modal_add_rt'); ?>
<!-- Modal untuk mengedit rt -->
<?= $this->include('/rt/modal_edit_rt'); ?>

<?= $this->endSection(); ?>