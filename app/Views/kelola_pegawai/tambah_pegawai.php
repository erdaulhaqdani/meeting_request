<?= $this->include('partials/main') ?>

<head>
    <?= $this->include("partials/title-meta"); ?>

    <!-- Bootstrap Css -->
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <?= $this->include("partials/head-css"); ?>
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

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h3 class="card-title">Tambah Pegawai</h3>
                                <p class="card-title-desc">Masukkan informasi Pegawai dengan lengkap.</p>
                                <?php
                                if (session()->get('pesan')) {
                                ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session()->get('pesan'); ?>
                                    </div>
                                <?php
                                }
                                ?>

                                <form action="/KelolaPegawai/input_pegawai" class="custom-validation" method="POST" enctype="multipart/form-data">

                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">Jabatan</label>
                                        <div class="col-sm-9">
                                            <select name="jabatan" class="form-select" aria-label="Default select example" required>
                                                <option selected disabled value="">Pilih level pegawai</option>
                                                <?php foreach ($jabatan as $a) : ?>
                                                    <option value="<?= $a['idJabatan']; ?>"><?= $a['posisiJabatan']; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">Unit Pegawai</label>
                                        <div class="col-sm-9">
                                            <select name="unit" class="form-select" aria-label="Default select example" required>
                                                <option selected disabled value="">Pilih unit pegawai</option>
                                                <?php foreach ($unit as $a) : ?>
                                                    <option value="<?= $a['idUnit']; ?>"><?= $a['namaUnit']; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" name="status" aria-label="Default select example" required>
                                                <option selected disabled value="">Pilih kantor pegawai</option>
                                                <option value="Nonaktif">Nonaktif</option>
                                                <option value="Aktif">Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row mb-3">
                                        <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" placeholder="Masukkan nama lengkap" id="nama" name="nama" required>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" name="jenisKelamin" aria-label="Default select example" required>
                                                <option selected disabled value="">Pilih Jenis Kelamin</option>
                                                <option value="pria">Pria</option>
                                                <option value="wanita">Wanita</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" placeholder="Masukkan NIP pegawai" id="nip" name="nip" required data-parsley-minlength="9" data-parsley-maxlength="15">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row mb-3">
                                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="email" placeholder="Masukkan email pegawai" id="email" name="email" required>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row mb-3">
                                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="password" placeholder="Masukkan password pegawai" id="pegawai" name="password" required>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="mb-0">
                                        <div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </form>
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

<script src="/assets/libs/parsleyjs/parsley.min.js"></script>

<script src="/assets/js/pages/form-validation.init.js"></script>

<!-- Plugins js -->
<script src="/assets/libs/dropzone/min/dropzone.min.js"></script>
<script src="/assets/js/app.js"></script>

</body>

</html>