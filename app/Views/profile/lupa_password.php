<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <link rel="icon" type="image/png" href="/assets/frontend_home/img/Struktur/simbolpemkab.png">
   <!-- site metas -->
   <title>Web Profile desa Dlepih</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
   <!-- site css -->
   <link rel="stylesheet" href="assets/style.css" />
   <!-- responsive css -->
   <link rel="stylesheet" href="assets/css/responsive.css" />
   <!-- scrollbar css -->
   <link rel="stylesheet" href="assets/css/perfect-scrollbar.css" />
   <!-- custom css -->
   <link rel="stylesheet" href="assets/css/custom.css" />
</head>

<body class="inner_page login">
   <div class="full_container">
      <div class="container">
         <div class="center verticle_center full_height">
            <div class="login_section">
               <div class="logo_login">
                  <div class="center">
                     <img width="210" src="assets/img/tampilan/dlepih.png" alt="#" />
                  </div>
               </div>
               <div class="center mt-5">
                  <h4>Masukkan Email Saudara</h4>
               </div>
               <center>
                  <p>Hal ini bertujuan agar kami dapat memastikan apakah email<br>saudara terdaftar atau tidak</p>
               </center>
               <div class="login_form">
                  <form action="/cek_email" method="POST">
                     <?php if (session()->getFlashdata('error_email')) { ?>
                        <div class="alert alert-danger">
                           <?= session()->getFlashdata('error_email') ?>
                        </div>
                     <?php } ?>
                     <?= csrf_field(); ?>
                     <div class="form-outline field">
                        <label class="label_field">Email Address</label>
                        <input type="email" class="form-control <?= (session()->getFlashdata('error_email')) ? 'is-invalid' : ''; ?>" name="email" placeholder="E-mail" autofocus value="<?= old('email') ?>" />
                        <div class=" invalid-feedback">
                           <?= session()->getFlashdata('error_email') ?>
                        </div>
                     </div>
                     <div class="field margin_0">
                        <label class="label_field hidden">hidden label</label>
                        <button class="main_bt" type="submit">Next</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- jQuery -->
   <script src="assets/js/jquery.min.js"></script>
   <script src="assets/js/popper.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
   <!-- wow animation -->
   <script src="assets/js/animate.js"></script>
   <!-- select country -->
   <script src="assets/js/bootstrap-select.js"></script>
</body>

</html>