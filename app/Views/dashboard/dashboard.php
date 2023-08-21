<?= $this->extend('layout/templete'); ?>

<?= $this->section('content'); ?>

<!-- dashboard inner -->
<div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>Dashboard</h2>
            </div>
         </div>
      </div>
      <div class="row column1">
         <div class="col-md-6 col-lg-4">
            <a href="/users" class="full counter_section margin_bottom_30">
               <div class="couter_icon">
                  <div>
                     <i class="fa fa-user-secret green_color"></i>
                  </div>
               </div>
               <div class="counter_no">
                  <div>
                     <p class="total_no"><?= $jumlah_user ?></p>
                     <p class="head_couter">Users</p>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-6 col-lg-4">
            <a href="/pegawai_desa" class="full counter_section margin_bottom_30">
               <div class="couter_icon">
                  <div>
                     <i class="fa fa-user yellow_color"></i>
                  </div>
               </div>
               <div class="counter_no">
                  <div>
                     <p class="total_no"><?= $jumlah_pegawai_desa ?></p>
                     <p class="head_couter">Pegawai</p>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-6 col-lg-4">
            <a href="/rw" class="full counter_section margin_bottom_30">
               <div class="couter_icon">
                  <div>
                     <i class="fa fa-users purple_color"></i>
                  </div>
               </div>
               <div class="counter_no">
                  <div>
                     <p class="total_no"><?= $jumlah_rw ?></p>
                     <p class="head_couter">Ketua RW</p>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-6 col-lg-4">
            <a href="/rt" class="full counter_section margin_bottom_30">
               <div class="couter_icon">
                  <div>
                     <i class="fa fa-users red_color"></i>
                  </div>
               </div>
               <div class="counter_no">
                  <div>
                     <p class="total_no"><?= $jumlah_rt ?></p>
                     <p class="head_couter">Ketua RT</p>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-6 col-lg-4">
            <a href="/anggota_pkk" class="full counter_section margin_bottom_30">
               <div class="couter_icon">
                  <div>
                     <i class="fa fa-female purple_color2"></i>
                  </div>
               </div>
               <div class="counter_no">
                  <div>
                     <p class="total_no"><?= $jumlah_anggota_pkk ?></p>
                     <p class="head_couter">Anggota PKK</p>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-6 col-lg-4">
            <a href="/anggota_bumdes" class="full counter_section margin_bottom_30">
               <div class="couter_icon">
                  <div>
                     <i class="fa fa-university blue2_color"></i>
                  </div>
               </div>
               <div class="counter_no">
                  <div>
                     <p class="total_no"><?= $jumlah_anggota_bumdes ?></p>
                     <p class="head_couter">Anggota BUMDes</p>
                  </div>
               </div>
            </a>
         </div>
      </div>
   </div>
</div>

<?= $this->endSection(); ?>