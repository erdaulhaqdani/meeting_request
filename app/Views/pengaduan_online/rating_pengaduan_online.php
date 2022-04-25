<?= $this->include('partials/main') ?>

<head>
    <meta charset="utf-8">

    <?= $this->include('partials/title-meta') ?>

    <link href="/assets/libs/bootstrap-rating/bootstrap-rating.css" rel="stylesheet" type="text/css" />

    <?= $this->include('partials/head-css') ?>

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

                <?= $title ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title"> <?= $title ?></h4>

                                <form action="/Pengaduan_online/in_rate" class="custom-validation" method="POST" enctype="multipart/form-data">
                                    <!-- beri penjelasan tiap input/desc -->

                                    <div class="my-3">
                                        <label for="rating">Rating</label>
                                        <div class="rating-star text-center">
                                            <input type="hidden" name="rating" class="rating" data-filled="mdi mdi-star custom-star2 text-primary" data-empty="mdi mdi-star-outline custom-star text-muted" />
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="ulasan">Ulasan</label>
                                        <input class="form-control" type="text" name="ulasan" required minlength="5" placeholder="Berikan ulasan" value="<?= old('ulasan'); ?>">
                                        <input type="hidden" name="idPengaduan" value="<?= $pengaduan['idPengaduan'] ?>">
                                    </div>

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
<script type="text/javascript" src="/assets/libs/bootstrap-rating/bootstrap-rating.min.js"></script>
<script type="text/javascript" src="/assets/js/pages/rating-init.js"></script>

<!-- App js -->
<script src="/assets/js/app.js"></script>

</body>

</html>