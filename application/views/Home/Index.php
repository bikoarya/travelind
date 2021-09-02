<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Travelind</title>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url('assets/toastr/toastr.min.css'); ?>">
    <!-- Sweet Alert 2 -->
    <link rel="stylesheet" href="<?= base_url('assets/sweetalert2/sweetalert2.min.css'); ?>">
    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/home.css'); ?>">
    <script defer type="text/javascript">
        var base_url = '<?= base_url() ?>';
        var site_url = '<?= site_url() ?>';
    </script>
</head>

<body>

    <div class="container">
        <h1 class="text-center title mt-5 mb-5">Travelind</h1>
        <div class="log-out d-flex justify-content-end mr-3">
            <a class="btn-logout" href="javascript:void(0);" id="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
        <?php foreach ($post as $p) : ?>
            <div class="img-wrapper d-flex align-items-center justify-content-center mt-4">
                <img src="<?= base_url('assets/img/' . $p['image']) ?>" class="images" alt="Images">
            </div>
            <h4 class="destination text-center font-weight-bold mt-2 mb-0"><?= $p['destination'] ?></h4>
            <p class="description text-center mb-2"><?= $p['description'] ?></p>
            <div class="d-flex align-items-center justify-content-center mx-auto w-50">
                <p class="about-destination text-center"><?= $p['about'] ?></p>
            </div>
        <?php endforeach; ?>

        <div class="footer">
            <hr class="line w-50">
            <div class="comments w-50 mx-auto">
                <div id="totalComment">

                </div>
                <form id="formComment">
                    <textarea class="input-comment w-100" name="comment" id="comment" placeholder="Write a comment . . ."></textarea>
                    <button type="submit" class="post-comment w-100 mt-2 mb-3" id="postComment">Post</button>
                </form>
                <div id="showComment" class="comment-wrapper mb-5">

                </div>
            </div>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="<?= base_url('assets/vendor/js/core/jquery.3.2.1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/js/core/popper.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/js/core/bootstrap.min.js'); ?>"></script>

    <!-- jQuery UI -->
    <script src="<?= base_url('assets/vendor/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js'); ?>"></script>

    <!-- JQuery Validate -->
    <script src="<?= base_url('assets/jquery-validation/jquery.validate.min.js'); ?>"></script>

    <!-- Toastr -->
    <script src="<?= base_url('assets/toastr/toastr.min.js'); ?>"></script>
    <!-- Sweet Alert 2 -->
    <script src="<?= base_url('assets/sweetalert2/sweetalert2.all.min.js'); ?>"></script>

    <!-- Main JS -->
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
</body>

</html>