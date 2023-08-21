<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<!--Sweet alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Ajax -->
<script src="/assets/vendors/crud_js/ajax.js"></script>
<!--Load script datatable dari folder public-->
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="/assets/vendors/simple-datatables/datatables-simple-demo.js"></script>
<!-- wow animation -->
<script src="/assets/js/animate.js"></script>
<!-- select country -->
<script src="/assets/js/bootstrap-select.js"></script>
<!-- owl carousel -->
<script src="/assets/js/owl.carousel.js"></script>
<!-- nice scrollbar -->
<script src="/assets/js/perfect-scrollbar.min.js"></script>
<script>
   var ps = new PerfectScrollbar('#sidebar');
</script>
<!-- custom js -->
<script src="/assets/js/custom.js"></script>

<script>
   <?php if (session()->getFlashdata('swal_icon')) { ?>
      Swal.fire({
         icon: '<?= session()->getFlashdata('swal_icon') ?>',
         title: '<?= session()->getFlashdata('swal_title') ?>',
         text: '<?= session()->getFlashdata('swal_text') ?>',
      })
   <?php } ?>
</script>