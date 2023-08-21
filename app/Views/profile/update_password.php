<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="image/png" href="/assets/frontend_home/img/Struktur/simbolpemkab.png">
   <title>Web Profile desa Dlepih</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
   <div class="container">
      <div class="row">
         <div class="col-md-12 min-vh-100 d-flex flex-column justify-content-center">
            <div class="row">
               <div class="col-lg-6 col-md-8 mx-auto">
                  <!-- form card login -->
                  <div class="card rounded shadow shadow-sm">
                     <div class="card-header">
                        <h3 class="mb-0">Form Update Password</h3>
                     </div>
                     <div class="card-body">
                        <form action="/profil/save_update_password/<?= $user['id_user'] ?>" method="POST">
                           <?php if (session()->getFlashdata('err_pass_konf')) { ?>
                              <div class="alert alert-danger">
                                 <?= session()->getFlashdata('err_pass_konf') ?>
                              </div>
                           <?php } ?>
                           <?php if (session()->getFlashdata('success_pass_Konf')) { ?>
                              <div class="alert alert-success">
                                 <?= session()->getFlashdata('success_pass_Konf') ?>
                              </div>
                           <?php } ?>
                           <?= csrf_field(); ?>
                           <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" class="form-control <?= (session()->getFlashdata('error_email')) ? 'is-invalid' : ''; ?>" name="email" placeholder="E-mail" autofocus value="<?= $user['email'] ?>" readonly />
                              <div class=" invalid-feedback">
                              </div>
                           </div>
                           <div class="form-group">
                              <label>Password Baru</label>
                              <input type="password" class="form-control <?= (session()->getFlashdata('error_passwordbaru')) ? 'is-invalid' : ''; ?>" name="passwordbaru" placeholder="Password Baru" value="<?= old('passwordbaru') ?>" />
                              <div class=" invalid-feedback">
                                 <?= session()->getFlashdata('error_passwordbaru') ?>
                              </div>
                           </div>
                           <div class="form-group">
                              <label>Konfirmasi Password Baru</label>
                              <input type="password" class="form-control <?= (session()->getFlashdata('error_konfpassword')) ? 'is-invalid' : ''; ?>" name="konfpassword" placeholder="Konfirmasi Password Baru" value="<?= old('konfpassword') ?>" />
                              <div class=" invalid-feedback">
                                 <?= session()->getFlashdata('error_konfpassword') ?>
                              </div>
                           </div>
                           <button type="submit" class="btn btn-success btn-lg float-right">Submit</button>
                        </form>
                        <div class="mb-4">
                           <a href="/halaman_login"><b>Kembali ke menu login</b></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>