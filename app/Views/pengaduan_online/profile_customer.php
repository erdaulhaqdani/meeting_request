<?= $this->include('partials/main') ?>

<head>
    <meta charset="utf-8">

    <?= $this->include('partials/title-meta') ?>

    <?= $this->include('partials/head-css') ?>

    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?> " id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('assets/css/icons.min.css'); ?> " rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('assets/css/app.min.css'); ?>" id="app-style" rel="stylesheet" type="text/css" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico'); ?>">

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

                                <form action="/Pengaduan_online/in_profile" class="custom-validation" method="POST" enctype="multipart/form-data">
                                    <!-- beri penjelasan tiap input/desc -->
                                    <div class="row mt-3">
                                        <?php if (session()->getFlashdata('pesan')) : ?>
                                            <div class="alert alert-success" role="alert"><?= session()->getFlashdata('pesan'); ?></div>
                                        <?php endif; ?>
                                        <div class="col-1">
                                            <div class="my-2">
                                                <label class="m-2">Nama</label>
                                            </div>
                                            <div class="my-2">
                                                <label class="m-2">NIK</label>
                                            </div>
                                            <div class="my-2">
                                                <label class="m-2">Email</label>
                                            </div>
                                            <div class="my-2">
                                                <label class="m-2">Pekerjaan</label>
                                            </div>
                                        </div>
                                        <div class="col-11">
                                            <div class="my-2">
                                                <input class="form-control" type="text" name="nama" required minlength="5" value="<?= $customer['Nama']; ?>">
                                            </div>
                                            <div class="my-2">
                                                <input class="form-control" type="text" name="nik" disabled required minlength="5" value="<?= $customer['NIK']; ?>">
                                            </div>
                                            <div class="my-2">
                                                <input class="form-control" type="email" name="email" required minlength="5" value="<?= $customer['Email']; ?>">
                                            </div>
                                            <div class="my-2">
                                                <input class="form-control" type="text" name="pekerjaan" required minlength="5" value="<?= $customer['Pekerjaan']; ?>">
                                                <input type="hidden" name="idCustomer" value="<?= $customer['idCustomer']; ?>">
                                            </div>

                                            <div class="my-3 text-end">
                                                <button type="reset" class="btn btn-danger me-3">Reset</button>
                                                <button type="submit" class="btn btn-primary" name="rate">Simpan</button>
                                            </div>
                                        </div>

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

<!-- App js -->
<script src="<?php base_url('/assets/js/app.js') ?>"></script>

</body>

</html>