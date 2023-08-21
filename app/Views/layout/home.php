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

   <link rel="stylesheet" href="assets/frontend_home/css/style.css" />
</head>

<body>
   <!--navbar start-->
   <nav class="navbar">
      <a href="#" class="navbar-logo">
         <img class="img-responsive" src="/assets/frontend_home/img/Struktur/simbolpemkab.png" alt="#" width="30px">
         Desa<span>Dlepih</span>
      </a>

      <div class="navbar-nav">
         <a href="#">Home</a>
         <a href="#about">About</a>
         <a href="#struktur">Struktur</a>
         <a href="#visimisi">Visi dan Misi</a>
         <a href="#IndWis">Wisata dan Industri</a>
         <a href="#berita">Berita</a>
         <a href="#contact">Contact</a>
      </div>

      <div class="navbar-extra">
         <a href="#" id="menu"><i data-feather="menu"></i></a>
      </div>
   </nav>
   <!--navbar end-->

   <!--Hero Section start-->
   <section class="hero" id="home" style="background-image: url('assets/frontend_home/img/Struktur/Background1.jpg');">
      <main class="content">
         <h1>Selamat Datang di Desa <span>Dlepih</span></h1>
         <p>
            Kecamatan Tirtomoyo, Kabupaten Wonogiri, Provinsi Jawa Tengah
         </p>
         <a href="/halaman_login" class="cta">Masuk Sebagai Admin</a>
      </main>
   </section>

   <!--Hero Section end-->

   <!--About Section start-->
   <section id="about" class="about">
      <h2><span>About</span></h2>

      <div class="row">
         <!-- <div class="about-img">
            <img src="assets/frontend_home/img/header-bg.jpeg.JPG" alt="image" height="400" weidh="400" alt="About" />
         </div> -->
         <div class="content" style="text-align: justify;">
            <h3>Tentang Desa Dlepih</h3>
            <p>
               Desa Dlepih terletak di Kecamatan Tirtomoyo, Kabupaten Wonogiri, Provinsi Jawa Tengah.
               Desa Dlepih terdiri dari 10 dusun dan 24 RT. Desa Dlepih memiliki lahan pertanian yang luas,
               lahan ini dimanfaatkan sebagai lahan penanaman padi dan empon-empon. Desa Dlepih sendiri
               berada di daerah dataran tinggi bagian timur dari Kecamatan Tirtomoyo. Desa Dlepih memiliki
               beragam potensi mulai dari UMKM empon-empon, laham pertanian padi, industri batu bata dan genteng,
               serta wisata kahyangan yang merupakan tempat wisata spiritual. Beragam potensi tersebut akan terus
               dimanfaatkan dan dikembangkan untuk meningkatkan kesejahteraan masyarakat Desa Dlepih.
            </p>
         </div>
      </div>
   </section>
   <!--About Section end-->

   <!--Menu Section start-->
   <section id="struktur" class="struktur">
      <h2><span>Struktur</span></h2>
      <div class="row">
         <div class="struktur-card">
            <img src="assets/frontend_home/img/Struktur/kades1.jpg" alt="Kepala Desa" class="struktur-card-img" width="200" height="300" />
            <h3 class="struktur-card-tittle">- Kepala Desa -</h3>
            <p class="struktur-card-name" style="font-size: 15px;">Sutarmo, S.E</p>
         </div>
         <div class="struktur-card">
            <img src="assets/frontend_home/img/Struktur/sekdes.jpg" alt="Kepala Desa" class="struktur-card-img" width="200" height="300" />
            <h3 class="struktur-card-tittle">- Sekretaris Desa -</h3>
            <p class="struktur-card-name" style="font-size: 15px;">Wahyu Eko Yulianingrum</p>
         </div>
      </div>
   </section>
   <!--Menu Section end-->

   <!--Visi dan Misi Section start-->
   <section id="visimisi" class="about">
      <h2><span>Visi dan Misi</span></h2>
      <div class="row">
         <table class="content">
            <thead>
               <tr>
                  <th>
                     <h3>Visi</h3>
                  </th>
                  <th></th>
                  <th>
                     <h3>Misi</h3>
                  </th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td class="card-visi-misi">
                     <center>
                        <p style="font-weight: bold;">Membangun Desa Dlepih, beriman, berbudaya, berkeadilan, berdaya saing, dan demokratis</p>
                     </center>
                  </td>
                  <td class="card-pemisah"></td>
                  <td class="card-visi-misi" style="text-align: justify;">
                     <p style="font-weight: bold;">Untuk mewujudkan visi Desa Dlepih Kecamatan Tirtomoyo Kabupaten Wonogiri, maka dijabarkan dalam misi yang menjadi pedoman bagi pembangunan Desa Dlepih, yaitu :</p>
                     <ol class="misi" style="font-weight: bold;">
                        <li>Pelestarian budaya lokal sebagai ciri masyarakat Desa Dlepih</li>
                        <li>Meningkatkan mutu pendidikan keagamaan di tiap-tiap dusun</li>
                        <li>Pengelolaan BUMDes secara maksimal</li>
                        <li>Pengambilan keputusan dengan mengutamakan kepentingan masyarakat</li>
                     </ol>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
   </section>
   <!--Visi dan Misi Section end-->

   <!--Industri dan Wisata Section start-->

   <section id="IndWis" class="about">
      <h2><span>Wisata dan Industri</span></h2>
      <div class="card-konten">
         <div class="row">
            <div class="content" style="text-align: justify;">
               <h3>Industri</h3>
               <p>
                  Desa Dlepih memiliki industri paling besar dan terkenal yaitu indutri pembuatan batu bata dan genteng. Industri pembuatan
                  batu bata dan genteng terletak di Dusun Karakan, yaitu salah satu dusun yang ada di Desa Dlepih. Salah satu yang membuat
                  industri batu bata dan genteng terkenal yaitu berkaitan dengan kualitas yang dimiliki, proses pembuatan, dan alat yang
                  digunakan. Pembuatan batu bata dan genteng dilakukan melalui dua cara, yaitu secara tradisional dan secara modern melalui
                  mesin. Perbedaan keduanya terletak pada alat-alat yang digunakan.
               </p>
            </div>
         </div>
         <div class="row">
            <img class="pisahgambar" src="assets/frontend_home/img/Struktur/PetaWisata.jpg" width="410" height="590" alt="PetaWisata">
            <div class="pisahgambar content">
               <div style="text-align: justify;">
               </div>
               <div class="about-img slideshow-container">
                  <div class="slide">
                     <img src="assets/frontend_home/img/Struktur/Bata1.jpg" alt="Slide1">
                  </div>
                  <div class="slide">
                     <img src="assets/frontend_home/img/Struktur/Bata2.jpg" alt="Slide2">
                  </div>
                  <div class="slide">
                     <img src="assets/frontend_home/img/Struktur/Bata3.jpg" alt="Slide3">
                  </div>
                  <div class="slide">
                     <img src="assets/frontend_home/img/Struktur/Bata4.jpg" alt="Slide4">
                  </div>
                  <div class="slide">
                     <img src="assets/frontend_home/img/Struktur/pertanian1.jpg" alt="Slide5">
                  </div>
                  <div class="slide">
                     <img src="assets/frontend_home/img/Struktur/pertanian2.jpg" alt="Slide6">
                  </div>
                  <div class="slide">
                     <img src="assets/frontend_home/img/Struktur/pertanian3.png" alt="Slide7">
                  </div>
                  <div class="slide">
                     <img src="assets/frontend_home/img/Struktur/pertanian4.png" alt="Slide8">
                  </div>
                  <div class="slide">
                     <img src="assets/frontend_home/img/Struktur/pertanian5.jpg" alt="Slide9">
                  </div>
                  <div class="slide">
                     <img src="assets/frontend_home/img/Struktur/kahyangan.jpg" alt="Slide10">
                  </div>
                  <div class="slide">
                     <img src="assets/frontend_home/img/Struktur/kahyangan1.png" alt="Slide11">
                  </div>
                  <div class="slide">
                     <img src="assets/frontend_home/img/Struktur/kahyangan2.png" alt="Slide12">
                  </div>
                  <div class="slide">
                     <img src="assets/frontend_home/img/Struktur/kahyangan3.png" alt="Slide13">
                  </div>
               </div>
               <div style="text-align: justify;">
                  <h3>Wisata</h3>
                  <p>
                     Desa Dlepih dengan segala potensinya memiliki salah satu potensi pariwisata, yaitu Wisata Kahyangan. Wisata ini sebagai
                     wisata spiritual yang kental dengan aspek sejarah. Sejalan dengan hal tersebut, Wisata Kahyangan pernah digunakan Panembahan
                     Senopati sebagai tempat bertapa pada masa Kerajaan Mataram pada tahun 1586. Hingga saat ini Wisata Kahyangan terus berkembang
                     dan dikunjungi wisatawan yang tertarik dalam hal sejarah maupun religi. Keberadaan Wisata Kahyangan mampu meningkatkan
                     eksistensi Desa Dlepih sebagai salah satu desa di Kecamatan Tirtomoyo, Kabupaten Wonogiri.
                  </p>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="content" style="text-align: justify;">
               <h3>Pertanian</h3>
               <p>
                  Selain memiliki potensi wisata dan industri, Desa Dlepih turut unggul dalam hal pertanian. Hal ini ditunjukkan melalui
                  luasnya lahan pertanian yang dimiliki Desa Dlepih. Komoditas pertanian yang dimiliki Desa Dlepih berupa padi dan empon-empon.
                  Majunya kualitas pertanian di Desa Dlepih tidak terlepas dari pengairan yang baik. Di mana perairan lahan pertanian
                  didapatkan dari Kahyangan.
               </p>
            </div>
         </div>
      </div>
   </section>
   <!--Industri dan Wisata Section end-->

   <!--Industri dan Wisata Section start-->
   <center>
      <section id="berita" class="about">
         <h2><span>Berita</span></h2>
         <div class="card">
            <table>
               <?php foreach ($konten as $k) : ?>
                  <tr>
                     <td><img src="/assets/img/konten/<?= $k['gambar'] ?>" alt="foto user" width="150px" height="100px"></td>
                     <td style="font-size: 16px; font-weight: bold; padding: 7px;">
                        <?= $k['judul'] ?>
                        <br>
                        <p style="font-size: 11px; font-weight: 295">Edited : <?= $k['updated_at'] ?></p>
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
            <br><br>
            <a class="btn-lihat-lebih-lengkap" style="font-size: 14px; font-weight: bold" href="/daftar_baca_berita">Lihat lebih banyak berita</a>
         </div>
      </section>
   </center>
   <!--Industri dan Wisata Section end-->

   <!--Contact Sction start-->
   <section id="contact" class="contact">
      <h2><span>Contact</span></h2>
      <div class="row">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25175.232617966172!2d111.07320092406611!3d-7.980440222816897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7bd59a8250aeed%3A0x5027a76e356a940!2sDlepih%2C%20Tirtomoyo%2C%20Wonogiri%20Regency%2C%20Central%20Java!5e0!3m2!1sen!2sid!4v1690959962430!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
         <form action="">
            <div class="input-group" style="background-color:#eee">
               <i data-feather="user"></i>
               <input style="font-size: 15px; font-weight: bold;" type="text" placeholder="+62 823-4161-6285 (Admin)" readonly />
            </div>
            <div class="input-group" style="background-color:#eee">
               <i data-feather="mail"></i>
               <input style="font-size: 15px; font-weight: bold" type="text" placeholder="dlepihdesa@gmail.com" readonly />
            </div>
         </form>
      </div>
   </section>
   <!--Contact Sction end-->

   <!--Footer start-->

   <!--Footer end-->
   <footer>
      <div>
         <h3>Our Social Media</h3>
      </div>
      <div class="socials">
         <a href="https://www.tiktok.com/@desa_dlepih?_t=8eiwFXNcpMI&_r=1" target="_blank">
            <img src="assets/frontend_home/img/media/tiktok.png" alt="tiktok" height="30" alt="About" />
         </a>
         <a href="https://instagram.com/dessadlepih?igshid=MzRlODBiNWFlZA==" target="_blank">
            <img src="assets/frontend_home/img/media/instagram.png" alt="instagram" height="30" alt="About" />
         </a>
         <a href="https://www.facebook.com/profile.php?id=61550018125567&mibextid=ZbWKwL" target="_blank">
            <img src="assets/frontend_home/img/media/facebook.png" alt="facebook" height="30" alt="About" />
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
   <script src="assets/frontend_home/js/script.js"></script>
</body>

</html>