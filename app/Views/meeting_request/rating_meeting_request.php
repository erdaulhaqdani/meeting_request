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

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Rating Janji Temu</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Janji Temu</a></li>
                                    <li class="breadcrumb-item active">Rating Janji Temu</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Rating Pelayanan Janji Temu</h4>

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
                                        <input type="button" value="Kembali" class="btn btn-warning waves-effect me-2 mt-2" onclick="history.back(-1)" />
                                        <button type="reset" class="btn btn-secondary me-2 mt-2">Reset</button>
                                        <button type="submit" class="btn btn-primary me-2 mt-2" name="rate">Submit</button>
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