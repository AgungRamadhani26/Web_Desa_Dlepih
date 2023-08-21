<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<!-- dashboard inner -->
<div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>Profile</h2>
            </div>
         </div>
      </div>
      <!-- row -->
      <div class="row column1">
         <div class="col-md-2"></div>
         <div class="col-md-8">
            <div class="white_shd full margin_bottom_30">
               <div class="full graph_head">
                  <div class="heading1 margin_0">
                     <div class="col-12">
                        <h2>Profil User</h2>
                     </div>
                  </div>
               </div>
               <div class="full price_table padding_infor_info">
                  <div class="row ps-5">
                     <!-- user profile section -->
                     <!-- profile image -->
                     <div class="col-lg-12">
                        <div class="full dis_flex center_text">
                           <div class="profile_img"><img width="150" height="160" class="rounded-circle" src="assets/img/foto_users/<?= $users['foto'] ?>" alt="#" /></div>
                           <div class="profile_contant">
                              <div class="contact_inner">
                                 <h3><?= $users['nama_dan_gelar'] ?></h3>
                                 <ul class="list-unstyled">
                                    <li><i class="fa fa-envelope-o"></i><strong> : <?= $users['email'] ?></strong></li>
                                    <li><i class="fa fa-phone"></i><strong> : <?= $users['no_wa'] ?></strong></li>
                                 </ul>
                              </div>
                              <div class="position-absolute top-100 start-100 translate-middle">
                                 <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modaledit_profil" onclick="edit_profil(<?php echo $users['id_user'] ?>)">
                                    <div class="fa fa-edit"></div>
                                 </button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-2"></div>
      </div>
      <!-- end row -->
   </div>
</div>
<!-- end dashboard inner -->

<!-- Modal untuk mengedit user -->
<?= $this->include('/profile/modal_edit_profile') ?>

<?= $this->endSection(); ?>