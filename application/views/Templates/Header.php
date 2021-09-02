<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?= $title; ?></title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

    <!-- Fonts and icons -->
    <script src="<?= base_url('assets/vendor/js/plugin/webfont/webfont.min.js'); ?>"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['assets/vendor/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- Data Tables -->
    <link rel="stylesheet" href="<?= base_url('assets/datatables/dataTables.bootstrap4.css'); ?>">
    <!-- Select 2 -->
    <link rel="stylesheet" href="<?= base_url('assets/select2/css/select2.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/select2/css/select2-bootstrap4.min.css'); ?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url('assets/toastr/toastr.min.css'); ?>">
    <!-- Sweet Alert 2 -->
    <link rel="stylesheet" href="<?= base_url('assets/sweetalert2/sweetalert2.min.css'); ?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?= base_url('assets/datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
    <!-- CSS Style -->
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/atlantis.min.css'); ?>">

    <script defer type="text/javascript">
        var base_url = '<?= base_url() ?>';
        var site_url = '<?= site_url() ?>';
    </script>

</head>

<body>