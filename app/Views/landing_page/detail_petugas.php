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
                            <h4 class="mb-sm-0">Detail Petugas</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Kelola Petugas</a></li>
                                    <li class="breadcrumb-item active">Detail Petugas</li>
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

                                <h3 class="card-title">Detail Petugas</h3>
                                <p class="card-title-desc">Berikut adalah identitas dan detail Petugas</p>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <label class="col-sm-4">NIP</label>
                                            <label class="col-sm-8">: <?= $petugas['NIP']; ?></label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-4">Nama Lengkap</label>
                                            <label class="col-sm-8"> : <?= $petugas['Nama']; ?></label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-4">Kantor</label>
                                            <label class="col-sm-8">: <?= $petugas['Kantor']; ?></label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-4">Unit</label>
                                            <?php foreach ($kategori as $a) {
                                                if ($petugas['Unit'] == $a['idKategori']) {
                                                    $namaKategori = $a['namaKategori'];
                                                }
                                            }
                                            ?>
                                            <label class="col-sm-8">: <?= $namaKategori; ?></label>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-4">Email</label>
                                            <label class="col-sm-8">: <?= $petugas['Email']; ?></label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-4">Level</label>
                                            <?php
                                            foreach ($level as $b) {
                                                if ($petugas['idLevel'] == $b['idLevel']) {
                                                    $namaLevel = $b['Level'];
                                                }
                                            }
                                            ?>
                                            <label class="col-sm-8">: <?= $namaLevel ?></label>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <input type="button" value="Kembali" class="btn btn-warning waves-effect mt-2" onclick="history.back(-1)" />
                                            <a href="/Landing_page/edit_petugas/<?= $petugas['Email']; ?>" class="btn btn-info waves-effect ms-2 mt-2">Edit Petugas</a>
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