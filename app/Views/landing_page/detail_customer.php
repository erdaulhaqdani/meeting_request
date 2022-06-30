<?= $this->include('partials/main') ?>

<head>

    <?= $this->include("partials/title-meta"); ?>

    <?= $this->include('/partials/head-css') ?>
    <!-- Bootstrap Css -->
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">


</head>

<?= $this->include('partials/body') ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('partials/menu_admin_landing') ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Detail Customer</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Daftar Customer</a></li>
                                    <li class="breadcrumb-item active">Detail Customer</li>
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

                                <h3 class="card-title">Detail Akun Customer</h3>
                                <p class="card-title-desc">Berikut adalah detail Akun Customer</p>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <label class="col-sm-4">NIK</label>
                                            <label class="col-sm-8">: <?= $customer['NIK']; ?></label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-4">Username</label>
                                            <label class="col-sm-8">: <?= $customer['Username']; ?></label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-4">Nama Lengkap</label>
                                            <label class="col-sm-8"> : <?= $customer['Nama']; ?></label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-4">Email</label>
                                            <label class="col-sm-8">: <?= $customer['Email']; ?></label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-4">Nomor HP</label>
                                            <label class="col-sm-8">: <?= $customer['noHP']; ?></label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-4">Jenis Kelamin</label>
                                            <label class="col-sm-8">: <?= $customer['jenisKelamin']; ?></label>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-4">Pekerjaan</label>
                                            <label class="col-sm-8">: <?= $customer['Pekerjaan']; ?></label>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">
                                        <?php
                                        $tanggal = date('Y-m-d', strtotime($customer['created_at']));

                                        ?>

                                        <div class="row">
                                            <label class="col-sm-4">Tanggal Registrasi</label>
                                            <label class="col-sm-8">: <?= tanggal_indo($tanggal) ?></label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-4">Status Akun</label>
                                            <label class="col-sm-8">: <?= $customer['StatusAkun']; ?></label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-4">Jumlah Pengaduan</label>
                                            <label class="col-sm-8"> : <?= 0 ?></label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-4">Jumlah Janji Temu</label>
                                            <label class="col-sm-8"> : <?= 0 ?></label>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <input type="button" value="Kembali" class="btn btn-warning waves-effect mt-2" onclick="history.back(-1)" />
                                            <a href="/verifikasi_customer/<?= $customer['idCustomer']; ?>" class="btn btn-info waves-effect ms-2 mt-2">Verifikasi</a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->


            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?= $this->include('partials/footer') ?>

    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?= $this->include('partials/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<!-- Plugins js -->
<script src="/assets/libs/dropzone/min/dropzone.min.js"></script>
<script src="/assets/js/app.js"></script>

</body>

</html>