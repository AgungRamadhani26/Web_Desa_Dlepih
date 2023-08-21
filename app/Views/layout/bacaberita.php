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
         <a style="font-weight: bold;" href="/daftar_baca_berita">Lihat daftar berita lainnya</a>
      </div>
   </nav>
   <!--navbar end-->

   <section id="visimisi" class="about">
      <h2><span>Berita Desa Dlepih</span></h2>
      <div class="row">
         <div class="card-pemisahberita"></div>
         <div class="card-isiberita">
            <center>
               <p style="font-size: 17px; font-weight: bold"><?= $konten['judul'] ?></p>
               <br>
               <img src="/assets/img/konten/<?= $konten['gambar'] ?>" alt="foto user" width="590px" height="420px" class="rounded-image">
            </center>
            <p style="font-size: 12px;"><?= $konten['caption_gambar'] ?></p><br>
            <p style="font-size: 10px;">Edited : <?= $konten['updated_at'] ?></p>
            <p style="font-size: 10px;">Penulis: Admin</p><br>
            <p style="font-size: 14px; text-align: justify;"><?= $konten['deskripsi'] ?></p>
         </div>
         <div class="card-pemisahberita"></div>
      </div>
   </section>

   <!--footer-->
   <footer>
      <div>
         <h3>Our Social Media</h3>
      </div>
      <div class="socials">
         <a href="#">
            <img src="/assets/frontend_home/img/media/tiktok.png" alt="tiktok" height="30" alt="About" />
         </a>
         <a href="#">
            <img src="/assets/frontend_home/img/media/instagram.png" alt="instagram" height="30" alt="About" />
         </a>
         <a href="#">
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