<nav id="sidebar">
   <div class="sidebar_blog_1">
      <div class="sidebar-header">
         <div class="logo_section">
            <a href=""><img class="logo_icon img-responsive" src="assets/images/logo/logo_icon.png" alt="#" /></a>
         </div>
      </div>
      <div class="sidebar_user_info">
         <div class="icon_setting"></div>
         <div class="user_profle_side">
            <div class="user_img"><img width="100" height="80" class="img-responsive" src="assets/img/foto_users/<?= session()->get('foto') ?>" alt="#" /></div>
            <div class="user_info">
               <h6><?= session()->get('nama_user') ?></h6>
               <p><span class="online_animation"></span> Online</p>
            </div>
         </div>
      </div>
   </div>
   <div class="sidebar_blog_2">
      <?php $date = date('Y-m-d');
      $datenow = date('d F Y', strtotime($date)); ?>
      <h4><?= $datenow ?></h4>
      <ul class="list-unstyled components">
         <li class="flash <?= $url == 'dashboard' ? 'aktif' : '' ?>">
            <a href="/dashboard"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
         </li>
         <li class="flash <?= $url == 'users' ? 'aktif' : '' ?>">
            <a href="/users"><i class="fa fa-user-secret green_color"></i> <span>Users</span></a>
         </li>
         <li class="flash <?= $url == 'pegawai_desa' ? 'aktif' : '' ?>">
            <a href="/pegawai_desa"><i class="fa fa-user orange_color"></i> <span>Pegawai</span></a>
         </li>
         <li class="flash <?= $url == 'rw' ? 'aktif' : '' ?>">
            <a href="/rw"><i class="fa fa-users purple_color"></i> <span>Ketua RW</span></a>
         </li>
         <li class="flash <?= $url == 'rt' ? 'aktif' : '' ?>">
            <a href="/rt"><i class="fa fa-users red_color"></i> <span>Ketua RT</span></a>
         </li>
         <li class="flash <?= $url == 'anggota_pkk' ? 'aktif' : '' ?>">
            <a href="/anggota_pkk"><i class="fa fa-female purple_color2"></i> <span>Anggota PKK</span></a>
         </li>
         <li class="flash <?= $url == 'anggota_bumdes' ? 'aktif' : '' ?>">
            <a href="/anggota_bumdes"><i class="fa fa-university blue2_color"></i> <span>Anggota BUMDes</span></a>
         </li>
         <li class="flash <?= $url == 'konten' ? 'aktif' : '' ?>">
            <a href="/konten"><i class="fa fa-object-group blue1_color"></i> <span>Konten</span></a>
         </li>
      </ul>
   </div>
</nav>