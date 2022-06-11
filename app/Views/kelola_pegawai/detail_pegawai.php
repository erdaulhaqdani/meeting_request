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

    <?= $this->include('partials/menu') ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h3 class="card-title">Detail Pegawai</h3>
                                <p class="card-title-desc">Berikut adalah identitas dan detail pengajuan Meeting Request Anda.</p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row mb-1">
                                            <label class="col-sm-6">IDENTITTAS PEGAWAI</label>
                                            <hr>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-4">NIP</label>
                                            <label class="col-sm-8">: <?= $pegawai['nip']; ?></label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-4">Nama Lengkap</label>
                                            <label class="col-sm-8"> : <?= $pegawai['nama']; ?></label>
                                        </div>
                                        <?php foreach ($jabatan as $x) {
                                            if ($a['idJabatan'] == $x['idJabatan']) {
                                                $posisiJabatan = $x['posisiJabatan'];
                                            }
                                        } ?>
                                        <div class="row">
                                            <label class="col-sm-4">Jabatan</label>
                                            <label class="col-sm-8">: <?= $posisiJabatan; ?></label>
                                        </div>
                                        <?php foreach ($unit as $x) {
                                            if ($a['idUnit'] == $x['idUnit']) {
                                                $namaUnit = $x['namaUnit'];
                                            }
                                        } ?>
                                        <div class="row">
                                            <label class="col-sm-4">Unit</label>
                                            <label class="col-sm-8">: <?= $namaUnit; ?></label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-4">Jenis Kelamin</label>
                                            <label class="col-sm-8">: <?= $pegawai['jenisKelamin']; ?></label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-4">Email</label>
                                            <label class="col-sm-8">: <?= $pegawai['email']; ?></label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-4">Status</label>
                                            <label class="col-sm-8">: <?= $pegawai['status']; ?></label>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <input type="button" value="Kembali" class="btn btn-warning waves-effect" onclick="history.back(-1)" />
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