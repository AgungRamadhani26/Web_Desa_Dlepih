//                                            //
// UNTUK MELAKUKAN TAMBAH DAN EDIT DATA USERS //
//                                            //

//Fungsi ini digunakan untuk membersihkan form modal add users
function bersihkanUsers() {
   $('#nama_dan_gelar').val('');
   $('#email').val('');
   $('#nowa').val('');
   $('#foto').val('');
   $('#id_user_e').val('');
   $('#fotolama_e').val('');
   $('#nama_dan_gelar_e').val('');
   $('#email_e').val('');
   $('#nowa_e').val('');
   $('#foto_e').val('');
}


//Digunakan untuk membersihkan form input jika kita mengclose modal
$('.tombol-tutup-user').on('click', function() {
   if ($('sukses-users').is(":visible")) {
       window.location.href = current_url() + "?" + $_SERVER['QUERY_STRING'];
   }
   $('.alert').hide();
   bersihkanUsers();
});


//Untuk melakukan proses tambah data users
$('#tombol-simpan-add-users').on('click', function() {
   let $nama_dan_gelar = $('#nama_dan_gelar').val();
   let $email = $('#email').val();
   let $nowa = $('#nowa').val();
   let $foto = $('#foto')[0].files[0];

   var fd = new FormData();
   fd.append('nama_dan_gelar', $nama_dan_gelar);
   fd.append('email', $email);
   fd.append('nowa', $nowa);
   fd.append('foto', $foto);
   $.ajax({
         url: '/users/tambah_users',
         type: 'POST',
         data: fd,
         processData: false,
         contentType: false,
         success: function(hasil) {
            var $obj = $.parseJSON(hasil);
            if($obj.sukses == false){
               $('.sukses-users').hide();
               $('.error-users').show();
               $('.error-users').html($obj.error);
            }else{
               $('.error-users').hide();
               $('.sukses-users').show();
               $('.sukses-users').html($obj.sukses);
               bersihkanUsers();
               reloadAfter();
            }
         }
   });
});
//Untuk mentrigger ketika menekan enter maka akan sama dengan submit form modal add kendaraan (sama dengan menekan save)
$('#formUser').on('keypress', function(e){
   if (e.which === 13){
       e.preventDefault();
       $('#tombol-simpan-add-users').click();
   }
});


//Untuk melakukan proses edit data users
function edit_user(id) {
   $.ajax({
      url: '/users/edit_users/' + id,
      type: 'GET',
      success: function(hasil) {
         var $obj = $.parseJSON(hasil);
         if ($obj.id_user != ''){
            $('#id_user_e').val($obj.id_user);
            $('#fotolama_e').val($obj.foto);
            $('#nama_dan_gelar_e').val($obj.nama_dan_gelar);
            $('#email_e').val($obj.email);
            $('#nowa_e').val($obj.no_wa);
            $('img#img-preview_e').attr('src', '/assets/img/foto_users/' + $obj.foto);
         }
      }
   });
}
//Untuk melakukan proses update data users
$('#tombol-simpan-edit-users').on('click', function() {
   let $id_user = $('#id_user_e').val();
   let $fotolama = $('#fotolama_e').val();
   let $nama_dan_gelar = $('#nama_dan_gelar_e').val();
   let $email = $('#email_e').val();
   let $nowa = $('#nowa_e').val();
   let $foto = $('#foto_e')[0].files[0];

   var fd = new FormData();
   fd.append('id_user', $id_user);
   fd.append('fotolama', $fotolama);
   fd.append('nama_dan_gelar', $nama_dan_gelar);
   fd.append('email', $email);
   fd.append('nowa', $nowa);
   fd.append('foto', $foto);
   $.ajax({
      url: '/users/update_users',
      type: 'POST',
      data: fd,
      processData: false,
      contentType: false,
      success: function(hasil) {
         var $obj = $.parseJSON(hasil);
         if($obj.sukses == false){
            $('.sukses-users_e').hide();
            $('.error-users_e').show();
            $('.error-users_e').html($obj.error);
         }else{
            $('.error-users_e').hide();
            $('.sukses-users_e').show();
            $('.sukses-users_e').html($obj.sukses);
            bersihkanUsers();
            reloadAfter();
         }
      }
   });
});
//untuk mentrigger ketika menekan enter maka akan sama dengan submit form modal edit users (sama dengan menekan save)
$('#formUser_e').on('keypress', function(e){
   if (e.which === 13){
         e.preventDefault();
         $('#tombol-simpan-edit-users').click();
   }
});



//                                             //
// UNTUK MELAKUKAN TAMBAH DAN EDIT DATA KONTEN //
//                                             //

//Fungsi ini digunakan untuk membersihkan form modal add users
function bersihkanKonten() {
   $('#judul').val('');
   $('#deskripsi').val('');
   $('#gambar').val('');
   $('#caption').val('');
   $('#id_konten_e').val('');
   $('#judul_e').val('');
   $('#deskripsi_e').val('');
   $('#gambar_e').val('');
   $('#caption_e').val('');
}


//Digunakan untuk membersihkan form input jika kita mengclose modal
$('.tombol-tutup-konten').on('click', function() {
   if ($('sukses-konten').is(":visible")) {
       window.location.href = current_url() + "?" + $_SERVER['QUERY_STRING'];
   }
   $('.alert').hide();
   bersihkanKonten();
});


//Untuk melakukan proses tambah data users
$('#tombol-simpan-add-konten').on('click', function() {
   let $judul = $('#judul').val();
   let $deskripsi = $('#deskripsi').val();
   let $gambar = $('#gambar')[0].files[0];
   let $caption = $('#caption').val();

   var fd = new FormData();
   fd.append('judul', $judul);
   fd.append('deskripsi', $deskripsi);
   fd.append('gambar', $gambar);
   fd.append('caption', $caption);
   $.ajax({
         url: '/konten/tambah_konten',
         type: 'POST',
         data: fd,
         processData: false,
         contentType: false,
         success: function(hasil) {
            var $obj = $.parseJSON(hasil);
            if($obj.sukses == false){
               $('.sukses-konten').hide();
               $('.error-konten').show();
               $('.error-konten').html($obj.error);
            }else{
               $('.error-konten').hide();
               $('.sukses-konten').show();
               $('.sukses-konten').html($obj.sukses);
               bersihkanKonten();
               reloadAfter();
            }
         }
   });
});



//Untuk melakukan proses edit data konten
function edit_konten(id) {
   $.ajax({
      url: '/konten/edit_konten/' + id,
      type: 'GET',
      success: function(hasil) {
         var $obj = $.parseJSON(hasil);
         if ($obj.id_konten != ''){
            $('#id_konten_e').val($obj.id_konten);
            $('#gambarlama_e').val($obj.gambar);
            $('#judul_e').val($obj.judul);
            $('#deskripsi_e').val($obj.deskripsi);
            $('img#img-preview-konten_e').attr('src', '/assets/img/konten/' + $obj.gambar);
            $('#caption_e').val($obj.caption_gambar);
         }
      }
   });
}
//Untuk melakukan proses update data users
$('#tombol-simpan-edit-konten').on('click', function() {
   let $id_konten = $('#id_konten_e').val();
   let $gambarlama = $('#gambarlama_e').val();
   let $judul = $('#judul_e').val();
   let $deskripsi = $('#deskripsi_e').val();
   let $gambar = $('#gambar_e')[0].files[0];
   let $caption = $('#caption_e').val();

   var fd = new FormData();
   fd.append('id_konten', $id_konten);
   fd.append('gambarlama', $gambarlama);
   fd.append('judul', $judul);
   fd.append('deskripsi', $deskripsi);
   fd.append('gambar', $gambar);
   fd.append('caption', $caption);
   $.ajax({
      url: '/konten/update_konten',
      type: 'POST',
      data: fd,
      processData: false,
      contentType: false,
      success: function(hasil) {
         var $obj = $.parseJSON(hasil);
         if($obj.sukses == false){
            $('.sukses-konten_e').hide();
            $('.error-konten_e').show();
            $('.error-konten_e').html($obj.error);
         }else{
            $('.error-konten_e').hide();
            $('.sukses-konten_e').show();
            $('.sukses-konten_e').html($obj.sukses);
            bersihkanKonten();
            reloadAfter();
         }
      }
   });
});


//                             //
// UNTUK MELAKUKAN EDIT Profil //
//                             //

//Fungsi ini digunakan untuk membersihkan form edit profil
function bersihkanProfil() {
   $('#id_ProfilUser').val('');
   $('#email_profil').val('');
   $('#password_profil').val('');
   $('#password_profil_baru').val('');
   $('#konfirmasi_password_profil_baru').val('');
}

//Digunakan untuk membersihkan form input jika kita mengclose modal
$('.tombol-tutup-profil').on('click', function() {
   if ($('sukses-profil').is(":visible")) {
       window.location.href = current_url() + "?" + $_SERVER['QUERY_STRING'];
   }
   $('.alert').hide();
   bersihkanProfil();
});

//Untuk melakukan proses edit profil
function edit_profil(id) {
   $.ajax({
      url: '/edit_profil/' + id,
      type: 'GET',
      success: function(hasil) {
         var $obj = $.parseJSON(hasil);
         if ($obj.id_user != ''){
            $('#id_ProfilUser').val($obj.id_user);
            $('#email_profil').val($obj.email);
         }
      }
   });
}
//Untuk melakukan proses update profil
$('#tombol-simpan-edit-profil').on('click', function() {
   let $id_ProfilUser = $('#id_ProfilUser').val();
   let $email_profil = $('#email_profil').val();
   let $password_profil = $('#password_profil').val();
   let $password_profil_baru = $('#password_profil_baru').val();
   let $konfirmasi_password_profil_baru = $('#konfirmasi_password_profil_baru').val();
   $.ajax({
      url: '/update_profil',
      type: 'POST',
      data: {
         id_ProfilUser : $id_ProfilUser,
         email_profil : $email_profil,
         password_profil : $password_profil,
         password_profil_baru : $password_profil_baru,
         konfirmasi_password_profil_baru : $konfirmasi_password_profil_baru
      },
      success: function(hasil) {
         var $obj = $.parseJSON(hasil);
         if($obj.sukses == false){
            $('.sukses-profil').hide(); 
            $('.error-profil').show();
            $('.error-profil').html($obj.error);
         }else{
            $('.error-profil').hide();
            $('.sukses-profil').show();
            $('.sukses-profil').html($obj.sukses);
            bersihkanProfil();
            reloadAfter();
         }
      }
   });
});
//untuk mentrigger ketika menekan enter maka akan sama dengan submit form modal edit pegawai desa (sama dengan menekan save)
$('#formProfil').on('keypress', function(e){
   if (e.which === 13){
      e.preventDefault();
      $('#tombol-simpan-edit-profil').click();
   }
});



//                                              //
// UNTUK MELAKUKAN TAMBAH DAN EDIT DATA PEGAWAI //
//                                              //

//Fungsi ini digunakan untuk membersihkan form modal add pegawai
function bersihkanPegawaiDesa() {
   $('#nama_dan_gelar_pd').val('');
   $('#jabatan_pd').val('');
   $('nik_pd').val('');
   $('nokk_pd').val('');
   $('#email_pd').val('');
   $('#nowa_pd').val('');
   $('#alamat_pd').val('');
   $('#id_pegawai_desa_e').val('');
   $('#nama_dan_gelar_pd_e').val('');
   $('#jabatan_pd_e').val('');
   $('#nik_pd_e').val('');
   $('#nokk_pd_e').val('');
   $('#email_pd_e').val('');
   $('#nowa_pd_e').val('');
   $('#alamat_pd_e').val('');
}

//Digunakan untuk membersihkan form input jika kita mengclose modal
$('.tombol-tutup-pegawai-desa').on('click', function() {
   if ($('sukses-pegawai-desa').is(":visible")) {
      window.location.href = current_url() + "?" + $_SERVER['QUERY_STRING'];
   }
   $('.alert').hide();
   bersihkanPegawaiDesa();
});


//Untuk melakukan proses tambah data pegawai desa
$('#tombol-simpan-pegawai-desa').on('click', function() {
   let $nama_dan_gelar_pd = $('#nama_dan_gelar_pd').val();
   let $jabatan_pd = $('#jabatan_pd').val();
   let $nik_pd = $('#nik_pd').val();
   let $nokk_pd = $('#nokk_pd').val();
   let $email_pd = $('#email_pd').val();
   let $nowa_pd = $('#nowa_pd').val();
   let $alamat_pd = $('#alamat_pd').val();
   $.ajax({
      url: '/pegawai_desa/tambah_pegawai_desa',
      type: 'POST',
      data: {
         nama_dan_gelar_pd: $nama_dan_gelar_pd,
         jabatan_pd: $jabatan_pd,
         nik_pd: $nik_pd,
         nokk_pd: $nokk_pd,
         email_pd: $email_pd,
         nowa_pd: $nowa_pd,
         alamat_pd: $alamat_pd
      },
      success: function(hasil) {
         var $obj = $.parseJSON(hasil);
         if($obj.sukses == false){
            $('.sukses-pegawai-desa').hide();
            $('.error-pegawai-desa').show();
            $('.error-pegawai-desa').html($obj.error);
         }else{
            $('.error-pegawai-desa').hide();
            $('.sukses-pegawai-desa').show();
            $('.sukses-pegawai-desa').html($obj.sukses);
            bersihkanPegawaiDesa();
            reloadAfter();
         }
      }
   });
});
//Untuk mentrigger ketika menekan enter maka akan sama dengan submit form modal add pegawai desa (sama dengan menekan save)
$('#formPegawaiDesa').on('keypress', function(e){
   if (e.which === 13){
      e.preventDefault();
      $('#tombol-simpan-pegawai-desa').click();
   }
});


//Untuk melakukan proses edit data pegawai desa
function edit_pegawai_desa($id) {
   $.ajax({
      url: '/pegawai_desa/edit_pegawai_desa/' + $id,
      type: 'GET',
      success: function(hasil) {
         var $obj = $.parseJSON(hasil);
         if ($obj.id_pegawai_desa != ''){
            $('#id_pegawai_desa_e').val($obj.id_pegawai_desa);
            $('#nama_dan_gelar_pd_e').val($obj.nama_dan_gelar);
            $('#jabatan_pd_e').val($obj.jabatan);
            $('#nik_pd_e').val($obj.nik);
            $('#nokk_pd_e').val($obj.no_kk);
            $('#email_pd_e').val($obj.email);
            $('#nowa_pd_e').val($obj.no_wa);
            $('#alamat_pd_e').val($obj.alamat);
         }
      }
   });
}
//Untuk melakukan proses update data pegawai desa
$('#tombol-simpan-edit-pegawai-desa').on('click', function() {
   let $id_pegawai_desa = $('#id_pegawai_desa_e').val();
   let $nama_dan_gelar_pd = $('#nama_dan_gelar_pd_e').val();
   let $jabatan_pd = $('#jabatan_pd_e').val();
   let $nik_pd = $('#nik_pd_e').val();
   let $nokk_pd = $('#nokk_pd_e').val();
   let $email_pd = $('#email_pd_e').val();
   let $nowa_pd = $('#nowa_pd_e').val();
   let $alamat_pd = $('#alamat_pd_e').val();
   $.ajax({
      url: '/pegawai_desa/update_pegawai_desa',
      type: 'POST',
      data: {
         id_pegawai_desa: $id_pegawai_desa,
         nama_dan_gelar: $nama_dan_gelar_pd,
         jabatan: $jabatan_pd,
         nik: $nik_pd,
         nokk: $nokk_pd,
         email: $email_pd,
         nowa: $nowa_pd,
         alamat: $alamat_pd
      },
      success: function(hasil) {
         var $obj = $.parseJSON(hasil);
         if($obj.sukses == false){
            $('.sukses-pegawai-desa_e').hide(); 
            $('.error-pegawai-desa_e').show();
            $('.error-pegawai-desa_e').html($obj.error);
         }else{
            $('.error-pegawai-desa_e').hide();
            $('.sukses-pegawai-desa_e').show();
            $('.sukses-pegawai-desa_e').html($obj.sukses);
            bersihkanPegawaiDesa();
            reloadAfter();
         }
      }
   });
});
//untuk mentrigger ketika menekan enter maka akan sama dengan submit form modal edit pegawai desa (sama dengan menekan save)
$('#formPegawaiDesa_e').on('keypress', function(e){
   if (e.which === 13){
      e.preventDefault();
      $('#tombol-simpan-edit-pegawai-desa').click();
   }
});


//                                                  //
// UNTUK MELAKUKAN TAMBAH DAN EDIT DATA Anggota PKK //
//                                                  //

//Fungsi ini digunakan untuk membersihkan form modal add anggota pkk
function bersihkanAnggotaPkk() {
   $('#nama_dan_gelar_ap').val('');
   $('#nik_ap').val('');
   $('#nokk_ap').val('');
   $('#jabatan_ap').val('');
   $('#nowa_ap').val('');
   $('#alamat_ap').val('');
   $('#id_anggota_pkk_e').val('');
   $('#nama_dan_gelar_ap_e').val('');
   $('#nik_ap_e').val('');
   $('#nokk_ap_e').val('');
   $('#jabatan_ap_e').val('');
   $('#nowa_ap_e').val('');
   $('#alamat_ap_e').val('');
}

//Digunakan untuk membersihkan form input jika kita mengclose modal
$('.tombol-tutup-anggota-pkk').on('click', function() {
   if ($('sukses-anggota-pkk').is(":visible")) {
      window.location.href = current_url() + "?" + $_SERVER['QUERY_STRING'];
   }
   $('.alert').hide();
   bersihkanAnggotaPkk();
});


//Untuk melakukan proses tambah data anggota pkk
$('#tombol-simpan-anggota-pkk').on('click', function() {
   let $nama_dan_gelar_ap = $('#nama_dan_gelar_ap').val();
   let $nik_ap = $('#nik_ap').val();
   let $nokk_ap = $('#nokk_ap').val();
   let $jabatan_ap = $('#jabatan_ap').val();
   let $nowa_ap = $('#nowa_ap').val();
   let $alamat_ap = $('#alamat_ap').val();
   $.ajax({
      url: '/anggota_pkk/tambah_anggota_pkk',
      type: 'POST',
      data: {
         nama_dan_gelar_ap: $nama_dan_gelar_ap,
         nik_ap: $nik_ap,
         nokk_ap: $nokk_ap,
         jabatan_ap: $jabatan_ap,
         nowa_ap: $nowa_ap,
         alamat_ap: $alamat_ap
      },
      success: function(hasil) {
         var $obj = $.parseJSON(hasil);
         if($obj.sukses == false){
            $('.sukses-anggota-pkk').hide();
            $('.error-anggota-pkk').show();
            $('.error-anggota-pkk').html($obj.error);
         }else{
            $('.error-anggota-pkk').hide();
            $('.sukses-anggota-pkk').show();
            $('.sukses-anggota-pkk').html($obj.sukses);
            bersihkanAnggotaPkk();
            reloadAfter();
         }
      }
   });
});
//Untuk mentrigger ketika menekan enter maka akan sama dengan submit form modal add anggota pkk (sama dengan menekan save)
$('#formAnggotaPkk').on('keypress', function(e){
   if (e.which === 13){
      e.preventDefault();
      $('#tombol-simpan-anggota-pkk').click();
   }
});


//Untuk melakukan proses edit data anggota pkk
function edit_anggota_pkk($id) {
   $.ajax({
      url: '/anggota_pkk/edit_anggota_pkk/' + $id,
      type: 'GET',
      success: function(hasil) {
         var $obj = $.parseJSON(hasil);
         if ($obj.id_anggota_pkk != ''){
            $('#id_anggota_pkk_e').val($obj.id_anggota_pkk);
            $('#nama_dan_gelar_ap_e').val($obj.nama_dan_gelar);
            $('#nik_ap_e').val($obj.nik);
            $('#nokk_ap_e').val($obj.no_kk);
            $('#jabatan_ap_e').val($obj.jabatan);
            $('#nowa_ap_e').val($obj.no_wa);
            $('#alamat_ap_e').val($obj.alamat);
         }
      }
   });
}
//Untuk melakukan proses update data anggota pkk
$('#tombol-simpan-edit-anggota-pkk').on('click', function() {
   let $id_anggota_pkk = $('#id_anggota_pkk_e').val();
   let $nama_dan_gelar_ap = $('#nama_dan_gelar_ap_e').val();
   let $nik_ap = $('#nik_ap_e').val();
   let $nokk_ap = $('#nokk_ap_e').val();
   let $jabatan_ap = $('#jabatan_ap_e').val();
   let $nowa_ap = $('#nowa_ap_e').val();
   let $alamat_ap = $('#alamat_ap_e').val();
   $.ajax({
      url: '/anggota_pkk/update_anggota_pkk',
      type: 'POST',
      data: {
         id_anggota_pkk: $id_anggota_pkk,
         nama_dan_gelar_ap: $nama_dan_gelar_ap,
         nik_ap: $nik_ap,
         nokk_ap: $nokk_ap,
         jabatan_ap: $jabatan_ap,
         nowa_ap: $nowa_ap,
         alamat_ap: $alamat_ap
      },
      success: function(hasil) {
         var $obj = $.parseJSON(hasil);
         if ($obj.sukses == false){
            $('.sukses-anggota-pkk_e').hide();
            $('.error-anggota-pkk_e').show();
            $('.error-anggota-pkk_e').html($obj.error);
         }else{
            $('.error-anggota-pkk_e').hide();
            $('.sukses-anggota-pkk_e').show();
            $('.sukses-anggota-pkk_e').html($obj.sukses);
            bersihkanAnggotaPkk();
            reloadAfter();
         }
      }
   });
});
//Untuk mentrigger ketika menekan enter maka akan sama dengan submit form
$('#formAnggotaPkk_e').on('keypress', function(e){
   if (e.which === 13){
      e.preventDefault();
      $('#tombol-simpan-edit-anggota-pkk').click();
   }
});


//                                         //
// UNTUK MELAKUKAN TAMBAH DAN EDIT DATA RW //
//                                         //

//Fungsi ini digunakan untuk membersihkan form modal add RW
function bersihkanRW() {
   $('#nama_dan_gelar_rw').val('');
   $('#nik_rw').val('');
   $('#nokk_rw').val('');
   $('#rw').val('');
   $('#dusun_rw').val('')
   $('#nowa_rw').val('');
   $('#alamat_rw').val('');
   $('#id_rw_e').val('');
   $('#nama_dan_gelar_rw_e').val('');
   $('#nik_rw_e').val('');
   $('#nokk_rw_e').val('');
   $('#rw_e').val('');
   $('#dusun_rw_e').val('')
   $('#nowa_rw_e').val('');
   $('#alamat_rw_e').val('');
}

//Digunakan untuk membersihkan form input jika kita mengclose modal
$('.tombol-tutup-rw').on('click', function() {
   if ($('sukses-rw').is(":visible")) {
      window.location.href = current_url() + "?" + $_SERVER['QUERY_STRING'];
   }
   $('.alert').hide();
   bersihkanRW();
});


//Untuk melakukan proses tambah data rw
$('#tombol-simpan-add-rw').on('click', function() {
   let $nama_dan_gelar_rw = $('#nama_dan_gelar_rw').val();
   let $nik_rw = $('#nik_rw').val();
   let $nokk_rw = $('#nokk_rw').val();
   let $rw = $('#rw').val();
   let $dusun_rw = $('#dusun_rw').val();
   let $nowa_rw = $('#nowa_rw').val();
   let $alamat_rw = $('#alamat_rw').val();
   $.ajax({
      url: '/rw/tambah_rw',
      type: 'POST',
      data: {
         nama_dan_gelar_rw: $nama_dan_gelar_rw,
         nik_rw: $nik_rw,
         nokk_rw: $nokk_rw,
         rw: $rw,
         dusun_rw: $dusun_rw,
         nowa_rw: $nowa_rw,
         alamat_rw: $alamat_rw
      },
      success: function(hasil) {
         var $obj = $.parseJSON(hasil);
         if($obj.sukses == false){
            $('.sukses-rw').hide();
            $('.error-rw').show();
            $('.error-rw').html($obj.error);
         }else{
            $('.error-rw').hide();
            $('.sukses-rw').show();
            $('.sukses-rw').html($obj.sukses);
            bersihkanRW();
            reloadAfter();
         }
      }
   });
});
//Untuk mentrigger ketika menekan enter maka akan sama dengan submit form modal add RW (sama dengan menekan save)
$('#formRW').on('keypress', function(e){
   if (e.which === 13){
      e.preventDefault();
      $('#tombol-simpan-add-rw').click();
   }
});


//Untuk melakukan proses edit data rw
function edit_rw($id) {
   $.ajax({
      url: '/rw/edit_rw/' + $id,
      type: 'GET',
      success: function(hasil) {
         var $obj = $.parseJSON(hasil);
         if ($obj.id_rw != ''){
            $('#id_rw_e').val($obj.id_rw);
            $('#nama_dan_gelar_rw_e').val($obj.nama_dan_gelar);
            $('#nik_rw_e').val($obj.nik);
            $('#nokk_rw_e').val($obj.no_kk);
            $('#rw_e').val($obj.nama_rw);
            $('#dusun_rw_e').val($obj.dusun);
            $('#nowa_rw_e').val($obj.no_wa);
            $('#alamat_rw_e').val($obj.alamat);
         }
      }
   });
}
//Untuk melakukan proses update data RW
$('#tombol-simpan-edit-rw').on('click', function() {
   let $id_rw = $('#id_rw_e').val();
   let $nama_dan_gelar_rw = $('#nama_dan_gelar_rw_e').val();
   let $nik_rw = $('#nik_rw_e').val();
   let $nokk_rw = $('#nokk_rw_e').val();
   let $rw = $('#rw_e').val();
   let $dusun_rw = $('#dusun_rw_e').val();
   let $nowa_rw = $('#nowa_rw_e').val();
   let $alamat_rw = $('#alamat_rw_e').val();
   $.ajax({
      url: '/rw/update_rw',
      type: 'POST',
      data: {
         id_rw: $id_rw,
         nama_dan_gelar_rw: $nama_dan_gelar_rw,
         nik_rw: $nik_rw,
         nokk_rw: $nokk_rw,
         rw: $rw,
         dusun_rw: $dusun_rw,
         nowa_rw: $nowa_rw,
         alamat_rw: $alamat_rw
      },
      success: function(hasil) {
         var $obj = $.parseJSON(hasil);
         if ($obj.sukses == false){
            $('.sukses-rw_e').hide();
            $('.error-rw_e').show();
            $('.error-rw_e').html($obj.error);
         }else{
            $('.error-rw_e').hide();
            $('.sukses-rw_e').show();
            $('.sukses-rw_e').html($obj.sukses);
            bersihkanRW();
            reloadAfter();
         }
      }
   });
});
//Untuk mentrigger ketika menekan enter maka akan sama dengan submit form
$('#formRW_e').on('keypress', function(e){
   if (e.which === 13){
      e.preventDefault();
      $('#tombol-simpan-edit-rw').click();
   }
});


//                                         //
// UNTUK MELAKUKAN TAMBAH DAN EDIT DATA RT //
//                                         //

//Fungsi ini digunakan untuk membersihkan form modal add RT
function bersihkanRT() {
   $('#nama_dan_gelar_rt').val('');
   $('#nik_rt').val('');
   $('#nokk_rt').val('');
   $('#rw_rt').val('');
   $('#rt').val('');
   $('#nowa_rt').val('');
   $('#alamat_rt').val('');
   $('#id_rt_e').val('');
   $('#nama_dan_gelar_rt_e').val('');
   $('nik_rt_e').val('');
   $('nokk_rt_e').val('');
   $('#rw_rt_e').val('');
   $('#rt_e').val('');
   $('#nowa_rt_e').val('');
   $('#alamat_rt_e').val('');
}

//Digunakan untuk membersihkan form input jika kita mengclose modal
$('.tombol-tutup-rt').on('click', function() {
   if ($('sukses-rt').is(":visible")) {
      window.location.href = current_url() + "?" + $_SERVER['QUERY_STRING'];
   }
   $('.alert').hide();
   bersihkanRT();
});


//Untuk melakukan proses tambah data RT
$('#tombol-simpan-add-rt').on('click', function() {
   let $nama_dan_gelar_rt = $('#nama_dan_gelar_rt').val();
   let $nik_rt = $('#nik_rt').val();
   let $nokk_rt = $('#nokk_rt').val();
   let $rw_rt = $('#rw_rt').val();
   let $rt = $('#rt').val();
   let $nowa_rt = $('#nowa_rt').val();
   let $alamat_rt = $('#alamat_rt').val();
   $.ajax({
      url: '/rt/tambah_rt',
      type: 'POST',
      data: {
         nama_dan_gelar_rt: $nama_dan_gelar_rt,
         nik_rt: $nik_rt,
         nokk_rt: $nokk_rt,
         rw_rt: $rw_rt,
         rt: $rt,
         nowa_rt: $nowa_rt,
         alamat_rt: $alamat_rt
      },
      success: function(hasil) {
         var $obj = $.parseJSON(hasil);
         if($obj.sukses == false){
            $('.sukses-rt').hide();
            $('.error-rt').show();
            $('.error-rt').html($obj.error);
         }else{
            $('.error-rt').hide();
            $('.sukses-rt').show();
            $('.sukses-rt').html($obj.sukses);
            bersihkanRT();
            reloadAfter();
         }
      }
   });
});
//Untuk mentrigger ketika menekan enter maka akan sama dengan submit form modal add anggota pkk (sama dengan menekan save)
$('#formRT').on('keypress', function(e){
   if (e.which === 13){
      e.preventDefault();
      $('#tombol-simpan-add-rt').click();
   }
});


//Untuk melakukan proses edit data RT
function edit_rt($id) {
   $.ajax({
      url: '/rt/edit_rt/' + $id,
      type: 'GET',
      success: function(hasil) {
         var $obj = $.parseJSON(hasil);
         if ($obj.id_rw != ''){
            $('#id_rt_e').val($obj.id_rt);
            $('#nama_dan_gelar_rt_e').val($obj.nama_dan_gelar);
            $('#nik_rt_e').val($obj.nik);
            $('#nokk_rt_e').val($obj.no_kk);
            $('#rw_rt_e').val($obj.id_rw);
            $('#rt_e').val($obj.nama_rt);
            $('#nowa_rt_e').val($obj.no_wa);
            $('#alamat_rt_e').val($obj.alamat);
         }
      }
   });
}
//Untuk melakukan proses update data RT
$('#tombol-simpan-edit-rt').on('click', function() {
   let $id_rt = $('#id_rt_e').val();
   let $nama_dan_gelar_rt = $('#nama_dan_gelar_rt_e').val();
   let $nik_rt = $('#nik_rt_e').val();
   let $nokk_rt = $('#nokk_rt_e').val();
   let $rw_rt = $('#rw_rt_e').val();
   let $rt = $('#rt_e').val();
   let $nowa_rt = $('#nowa_rt_e').val();
   let $alamat_rt = $('#alamat_rt_e').val();
   $.ajax({
      url: '/rt/update_rt',
      type: 'POST',
      data: {
         id_rt: $id_rt,
         nama_dan_gelar_rt: $nama_dan_gelar_rt,
         nik_rt: $nik_rt,
         nokk_rt: $nokk_rt,
         rw_rt: $rw_rt,
         rt: $rt,
         nowa_rt: $nowa_rt,
         alamat_rt: $alamat_rt
      },
      success: function(hasil) {
         var $obj = $.parseJSON(hasil);
         if ($obj.sukses == false){
            $('.sukses-rt_e').hide();
            $('.error-rt_e').show();
            $('.error-rt_e').html($obj.error);
         }else{
            $('.error-rt_e').hide();
            $('.sukses-rt_e').show();
            $('.sukses-rt_e').html($obj.sukses);
            bersihkanRT();
            reloadAfter();
         }
      }
   });
});
//Untuk mentrigger ketika menekan enter maka akan sama dengan submit form
$('#formRT_e').on('keypress', function(e){
   if (e.which === 13){
      e.preventDefault();
      $('#tombol-simpan-edit-rt').click();
   }
});


//                                                     //
// UNTUK MELAKUKAN TAMBAH DAN EDIT DATA Anggota BUMDes //
//                                                     //

//Fungsi ini digunakan untuk membersihkan form modal add anggota BUMDes
function bersihkanAnggotaBumdes() {
   $('#nama_dan_gelar_ab').val('');
   $('#nik_ab').val('');
   $('#nokk_ab').val('');
   $('#jabatan_ab').val('');
   $('#nowa_ab').val('');
   $('#alamat_ab').val('');
   $('#id_anggota_bumdes_e').val('');
   $('#nama_dan_gelar_ab_e').val('');
   $('#nik_ab_e').val('');
   $('#nokk_ab_e').val('');
   $('#jabatan_ab_e').val('');
   $('#nowa_ab_e').val('');
   $('#alamat_ab_e').val('');
}

//Digunakan untuk membersihkan form input jika kita mengclose modal
$('.tombol-tutup-anggota-bumdes').on('click', function() {
   if ($('sukses-anggota-bumdes').is(":visible")) {
      window.location.href = current_url() + "?" + $_SERVER['QUERY_STRING'];
   }
   $('.alert').hide();
   bersihkanAnggotaBumdes();
});


//Untuk melakukan proses tambah data pegawai desa
$('#tombol-simpan-add-anggota-bumdes').on('click', function() {
   let $nama_dan_gelar_ab = $('#nama_dan_gelar_ab').val();
   let $nik_ab = $('#nik_ab').val();
   let $nokk_ab = $('#nokk_ab').val();
   let $jabatan_ab = $('#jabatan_ab').val();
   let $nowa_ab = $('#nowa_ab').val();
   let $alamat_ab = $('#alamat_ab').val();
   $.ajax({
      url: '/anggota_bumdes/tambah_anggota_bumdes',
      type: 'POST',
      data: {
         nama_dan_gelar_ab: $nama_dan_gelar_ab,
         nik_ab: $nik_ab,
         nokk_ab: $nokk_ab,
         jabatan_ab: $jabatan_ab,
         nowa_ab: $nowa_ab,
         alamat_ab: $alamat_ab
      },
      success: function(hasil) {
         var $obj = $.parseJSON(hasil);
         if($obj.sukses == false){
            $('.sukses-anggota-bumdes').hide();
            $('.error-anggota-bumdes').show();
            $('.error-anggota-bumdes').html($obj.error);
         }else{
            $('.error-anggota-bumdes').hide();
            $('.sukses-anggota-bumdes').show();
            $('.sukses-anggota-bumdes').html($obj.sukses);
            bersihkanAnggotaBumdes();
            reloadAfter();
         }
      }
   });
});
//Untuk mentrigger ketika menekan enter maka akan sama dengan submit form modal add anggota pkk (sama dengan menekan save)
$('#formAnggotaBumdes').on('keypress', function(e){
   if (e.which === 13){
      e.preventDefault();
      $('#tombol-simpan-add-anggota-bumdes').click();
   }
});


//Untuk melakukan proses edit data anggota pkk
function edit_anggota_bumdes($id) {
   $.ajax({
      url: '/anggota_bumdes/edit_anggota_bumdes/' + $id,
      type: 'GET',
      success: function(hasil) {
         var $obj = $.parseJSON(hasil);
         if ($obj.id_anggota_bumdes != ''){
            $('#id_anggota_bumdes_e').val($obj.id_anggota_bumdes);
            $('#nama_dan_gelar_ab_e').val($obj.nama_dan_gelar);
            $('#nik_ab_e').val($obj.nik);
            $('#nokk_ab_e').val($obj.no_kk);
            $('#jabatan_ab_e').val($obj.jabatan);
            $('#nowa_ab_e').val($obj.no_wa);
            $('#alamat_ab_e').val($obj.alamat);
         }
      }
   });
}
//Untuk melakukan proses update data anggota pkk
$('#tombol-simpan-edit-anggota-bumdes').on('click', function() {
   let $id_anggota_bumdes = $('#id_anggota_bumdes_e').val();
   let $nama_dan_gelar_ab = $('#nama_dan_gelar_ab_e').val();
   let $nik_ab = $('#nik_ab_e').val();
   let $nokk_ab = $('#nokk_ab_e').val();
   let $jabatan_ab = $('#jabatan_ab_e').val();
   let $nowa_ab = $('#nowa_ab_e').val();
   let $alamat_ab = $('#alamat_ab_e').val();
   $.ajax({
      url: '/anggota_bumdes/update_anggota_bumdes',
      type: 'POST',
      data: {
         id_anggota_bumdes: $id_anggota_bumdes,
         nama_dan_gelar_ab: $nama_dan_gelar_ab,
         nik_ab: $nik_ab,
         nokk_ab: $nokk_ab,
         jabatan_ab: $jabatan_ab,
         nowa_ab: $nowa_ab,
         alamat_ab: $alamat_ab
      },
      success: function(hasil) {
         var $obj = $.parseJSON(hasil);
         if ($obj.sukses == false){
            $('.sukses-anggota-bumdes_e').hide();
            $('.error-anggota-bumdes_e').show();
            $('.error-anggota-bumdes_e').html($obj.error);
         }else{
            $('.error-anggota-bumdes_e').hide();
            $('.sukses-anggota-bumdes_e').show();
            $('.sukses-anggota-bumdes_e').html($obj.sukses);
            bersihkanAnggotaBumdes();
            reloadAfter();
         }
      }
   });
});
//Untuk mentrigger ketika menekan enter maka akan sama dengan submit form
$('#formAnggotaBumdes_e').on('keypress', function(e){
   if (e.which === 13){
      e.preventDefault();
      $('#tombol-simpan-edit-anggota-bumdes').click();
   }
});


function reloadAfter() {
   setTimeout(function() {
     location.reload();
   }, 700); // 700 milidetik (0.7 detik)
 }


 //Fungsi ini digunakan untuk menampilkan gambar pada form modal add konten
 function previewImg_konten() {
   const gambar = document.querySelector('#gambar');
   const imgPreview = document.querySelector('.img-preview-konten');
   const fileGambar = new FileReader();
   fileGambar.readAsDataURL(gambar.files[0]);
   fileGambar.onload = function(e) {
       imgPreview.src = e.target.result;
   }
 }


 //Fungsi ini digunakan untuk menampilkan gambar pada form modal add konten
 function previewImg_konten_e() {
   const gambar = document.querySelector('#gambar_e');
   const imgPreview = document.querySelector('.img-preview-konten_e');
   const fileGambar = new FileReader();
   fileGambar.readAsDataURL(gambar.files[0]);
   fileGambar.onload = function(e) {
       imgPreview.src = e.target.result;
   }
 }


//Fungsi ini digunakan untuk menampilkan gambar pada form modal add kendaraan
function previewImg() {
   const gambar = document.querySelector('#foto');
   const imgPreview = document.querySelector('.img-preview');
   const fileGambar = new FileReader();
   fileGambar.readAsDataURL(gambar.files[0]);
   fileGambar.onload = function(e) {
       imgPreview.src = e.target.result;
   }
}

//Fungsi ini digunakan untuk menampilkan gambar pada form modal edit kendaraan
function previewImg_e() {
   const gambar = document.querySelector('#foto_e');
   const imgPreview = document.querySelector('.img-preview_e');
   const fileGambar = new FileReader();
   fileGambar.readAsDataURL(gambar.files[0]);
   fileGambar.onload = function(e) {
       imgPreview.src = e.target.result;
   }
}
