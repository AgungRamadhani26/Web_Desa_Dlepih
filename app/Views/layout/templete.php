<!DOCTYPE html>
<html lang="en">

<head>
   <?= $this->include('/layout/link_dan_library'); ?>
</head>

<body class="dashboard dashboard_1">
   <div class="full_container">
      <div class="inner_container">

         <!-- Sidebar  -->
         <?= $this->include('/layout/sidebar'); ?>
         <!-- end sidebar -->

         <!-- right content -->
         <div id="content">
            <!-- topbar -->
            <div class="topbar">
               <nav class="navbar navbar-expand-lg navbar-light">
                  <div class="full">
                     <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                     <div class="logo_section">
                        <img class="img-responsive" src="/assets/frontend_home/img/Struktur/simbolpemkab.png" alt="#">
                        <img class="img-responsive" src="/assets/img/tampilan/dlepih.png" alt="#" />
                     </div>
                     <div class="right_topbar">
                        <div class="icon_info">
                           <ul class="user_profile_dd">
                              <li>
                                 <a class="dropdown-toggle" data-toggle="dropdown"><img height="37" class="img-responsive rounded-circle" src="assets/img/foto_users/<?= session()->get('foto') ?>" alt="#" /><span class="name_user"><?= session()->get('nama_user') ?></span></a>
                                 <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/profile">My Profile</a>
                                    <a class="dropdown-item" href="/logout"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </nav>
            </div>
            <!-- end topbar -->

            <?= $this->renderSection('content'); ?>

         </div>
      </div>
   </div>

   <?= $this->include('/layout/footer'); ?>

   <?= $this->include('/layout/link_dan_library1'); ?>

</body>

</html>