<!--   Core JS Files   -->
<script src="<?= base_url('assets/vendor/js/core/jquery.3.2.1.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/js/core/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/js/core/bootstrap.min.js'); ?>"></script>

<!-- jQuery UI -->
<script src="<?= base_url('assets/vendor/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js'); ?>"></script>

<!-- jQuery Scrollbar -->
<script src="<?= base_url('assets/vendor/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js'); ?>"></script>


<!-- Chart JS -->
<script src="<?= base_url('assets/vendor/js/plugin/chart.js/chart.min.js'); ?>"></script>

<!-- jQuery Sparkline -->
<script src="<?= base_url('assets/vendor/js/plugin/jquery.sparkline/jquery.sparkline.min.js'); ?>"></script>

<!-- Chart Circle -->
<script src="<?= base_url('assets/vendor/js/plugin/chart-circle/circles.min.js'); ?>"></script>

<!-- Datatables -->
<script src="<?= base_url('assets/vendor/js/plugin/datatables/datatables.min.js'); ?>"></script>

<!-- Datatables Bootstrap 4 -->
<script src="<?= base_url('assets/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

<!-- JQuery Validate -->
<script src="<?= base_url('assets/jquery-validation/jquery.validate.min.js'); ?>"></script>

<!-- Select 2 -->
<script src="<?= base_url('assets/select2/js/select2.min.js') ?>"></script>
<!-- Toastr -->
<script src="<?= base_url('assets/toastr/toastr.min.js'); ?>"></script>
<!-- Sweet Alert 2 -->
<script src="<?= base_url('assets/sweetalert2/sweetalert2.all.min.js'); ?>"></script>
<!-- Date Picker -->
<script src="<?= base_url('assets/datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>

<!-- jQuery Vector Maps -->
<script src="<?= base_url('assets/vendor/js/plugin/jqvmap/jquery.vmap.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/js/plugin/jqvmap/maps/jquery.vmap.world.js'); ?>"></script>

<!-- Sweet Alert -->
<script src="<?= base_url('assets/vendor/js/plugin/sweetalert/sweetalert.min.js'); ?>"></script>

<!-- Atlantis JS -->
<script src="<?= base_url('assets/vendor/js/atlantis.min.js'); ?>"></script>

<!-- Main JS -->
<script src="<?= base_url('assets/js/main.js') ?>"></script>
<script>
    let loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
    let loadImg = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('editOutput');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
</body>

</html>