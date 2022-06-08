<?= $this->include('partials/main') ?>

<head>
    <meta charset="utf-8">

    <?= $this->include('partials/title-meta') ?>

    <?= $this->include('partials/head-css') ?>

    <link href="/assets/libs/bootstrap-rating/bootstrap-rating.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?> " id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('assets/css/icons.min.css'); ?> " rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('assets/css/app.min.css'); ?>" id="app-style" rel="stylesheet" type="text/css" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico'); ?>">

    <style>
        .custom-star {
            font-size: 3em;
        }

        .custom-star2 {
            font-size: 1.8em;
        }
    </style>
</head>

<?= $this->include('partials/body') ?>

<div class="container-fluid">
    <!-- Begin page -->
    <div id="layout-wrapper">

        <?= $this->include('partials/menu') ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title"> <?= $title ?> Meeting Request</h4>

                                <form action="/Meeting_request/input_rating" class="custom-validation" method="POST" enctype="multipart/form-data">
                                    <!-- beri penjelasan tiap input/desc -->

                                    <div class="my-3">
                                        <label for="rating">Rating</label>
                                        <div class="rating-star text-center">
                                            <input type="text" id="rating" name="rating" oninput="hideUlasan()" class="rating" data-filled="mdi mdi-star custom-star2 text-primary" data-empty="mdi mdi-star-outline custom-star text-muted" />
                                        </div>
                                    </div>

                                    <div class="mb-3" id="ulasan">
                                        <label for="ulasan">Ulasan</label>
                                        <input class="form-control" type="text" name="ulasan" required minlength="5" placeholder="Berikan ulasan" value="<?= old('ulasan'); ?>">
                                    </div>

                                    <input type="hidden" name="idMeeting" value="<?= $meeting['idMeeting'] ?>">

                                    <div class="mb-3 text-end">
                                        <button type="reset" class="btn btn-danger me-3">Reset</button>
                                        <button type="submit" class="btn btn-primary" name="rate">Submit</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- End Page-content -->

            <?= $this->include('partials/footer') ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

</div>
<!-- end container-fluid -->

<?= $this->include('partials/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<!-- Bootstrap rating js -->
<script type="text/javascript" src="<?= base_url('assets/libs/bootstrap-rating/bootstrap-rating.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/pages/rating-init.js') ?>"></script>

<!-- App js -->
<script src="<?= base_url('assets/js/app.js') ?>"></script>


<!-- Hide ulasan jika rating 5 -->
<script>
    function hideUlasan() {
        var rate = document.getElementById('rating').value;
        var ulasan = document.getElementById("ulasan");
        if (rate == 5) {
            ulasan.style.display = "none";
        } else {
            ulasan.style.display = "block";
        }
    }
</script>

</body>

</html>