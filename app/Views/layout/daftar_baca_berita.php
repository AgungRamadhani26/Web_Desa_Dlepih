<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="icon" type="image/png" href="/assets/frontend_home/img/Struktur/simbolpemkab.png">
   <title>website desa Dlepih</title>

   <!--fonts-->
   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,700;1,700&display=swap" rel="stylesheet" />
   <!--feather icons-->
   <script src="https://unpkg.com/feather-icons"></script>

   <!--my style-->

   <link rel="stylesheet" href="/assets/frontend_home/css/style.css" />
</head>

<body>
   <!--navbar start-->
   <nav class="navbar">
      <a href="#" class="navbar-logo">
         <img class="img-responsive" src="/assets/frontend_home/img/Struktur/simbolpemkab.png" alt="#" width="30px">
         Desa<span>Dlepih</span>
      </a>

      <div class="navbar-nav">
         <a style="font-weight: bold;" href="/">Kembali ke halaman utama</a>
      </div>
   </nav>
   <!--navbar end-->

   <section id="visimisi" class="about">
      <h2><span>Berita Desa Dlepih</span></h2>
      <div class="row">
         <div class="card">
            <table>
               <?php foreach ($konten as $k) : ?>
                  <tr>
                     <td><img src="/assets/img/konten/<?= $k['gambar'] ?>" alt="foto user" width="150px" height="100px"></td>
                     <td style="font-size: 16px; font-weight: bold; padding: 7px;">
                        <?= $k['judul'] ?>
                        <br>
                        <p style="font-size: 11px; font-weight: 295px">Edited : <?= $k['updated_at'] ?></p>
                        <p style="font-size: 14px; font-weight: normal"><?= $k['caption_gambar'] ?></p>
                     </td>
                     <td>
                        <a href="/bacaberita/<?= $k['id_konten'] ?>" class="btn-baca">
                           Baca
                        </a>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </table>
         </div>
         <div class="card-pemisah"></div>
         <div class="card-18">
            <div class="row">
               <p style="font-size: 16px; font-weight: bold; padding: 7px; color:white">Jumlah Berita : <?= $jumlah_konten ?></p>
            </div>
         </div>
      </div>
   </section>

   <!--footer-->
   <footer>
      <div>
         <h3>Our Social Media</h3>
      </div>
      <div class="socials">
         <a href="https://www.tiktok.com/@desa_dlepih?_t=8eiwFXNcpMI&_r=1" target="_blank">
            <img src="/assets/frontend_home/img/media/tiktok.png" alt="tiktok" height="30" alt="About" />
         </a>
         <a href="https://instagram.com/dessadlepih?igshid=MzRlODBiNWFlZA==" target="_blank">
            <img src="/assets/frontend_home/img/media/instagram.png" alt="instagram" height="30" alt="About" />
         </a>
         <a href="https://www.facebook.com/profile.php?id=61550018125567&mibextid=ZbWKwL" target="_blank">
            <img src="/assets/frontend_home/img/media/facebook.png" alt="facebook" height="30" alt="About" />
         </a>
      </div>

      <div class="credit">
         <h3>2023 &copy; Web Profile Desa Dlepih</h3>
      </div>
   </footer>
   <!--feather icons-->
   <script>
      feather.replace();
   </script>

   <!--my javascript-->
   <script src="/assets/frontend_home/js/script.js"></script>
</body>

</html>