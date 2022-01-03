   <!-- Bootstrap core JavaScript-->
   <script src="<?= BASE_URL; ?>/assets/vendor/jquery/jquery.min.js"></script>
   <script src="<?= BASE_URL; ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- Core plugin JavaScript-->
   <script src="<?= BASE_URL; ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
   <!-- Fontawesome plugins JavaScript -->
   <script src="<?= BASE_URL; ?>/assets/vendor/fontawesome/fontawesome.js"></script>
   <!-- bs-custom-file-input plugin JavaScript -->
   <script src="<?= BASE_URL; ?>/assets/vendor/bs-custom-file-input/bs-custom-file-input.js"></script>
     <!-- ckeditor plugin JavaScript -->
     <script src="<?= BASE_URL; ?>/assets/vendor/ckeditor/ckeditor.js"></script>

   <!-- Custom scripts for all pages-->
   <script src="<?= BASE_URL; ?>/assets/js/sb-admin-2.min.js"></script>
   <script>
      $(document).ready(function() {
         bsCustomFileInput.init();
         CKEDITOR.replace( 'body' );
      });
     
   </script>