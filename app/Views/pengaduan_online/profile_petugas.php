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

        <?php if (session('Kelompok') == 'LP') : ?>
            <?= $this->include('partials/menu_admin_landing') ?>
        <?php elseif (session('Kelompok') == 'APT') : ?>
            <?= $this->include('partials/menu_petugas') ?>
        <?php endif; ?>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title"> Profil Petugas </h4>

                                <form action="/Admin_pengaduan/in_profile" class="custom-validation" method="POST" enctype="multipart/form-data">
                                    <!-- beri penjelasan tiap input/desc -->
                                    <div class="mt-3">
                                        <?php if (session()->getFlashdata('pesan')) : ?>
                                            <div class="alert alert-success" role="alert"><?= session()->getFlashdata('pesan'); ?></div>
                                        <?php endif; ?>

                                        <div class="row my-2">
                                            <label class="col-sm-1 mt-2" for="nama">Nama</label>
                                            <div class="col-sm-11">
                                                <input class="form-control" type="text" name="nama" required minlength="4" value="<?= $petugas['Nama']; ?>">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <label class="col-sm-1 mt-2" for="nama">NIP</label>
                                            <div class="col-sm-11">
                                                <input class="form-control" type="text" name="nip" required minlength="4" disabled value="<?= $petugas['NIP']; ?>">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <label class="col-sm-1 mt-2" for="nama">Email</label>
                                            <div class="col-sm-11">
                                                <input class="form-control" type="email" name="email" required minlength="4" value="<?= $petugas['Email']; ?>">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <label class="col-sm-1 mt-2" for="nama">Kantor</label>
                                            <div class="col-sm-11">
                                                <select class="form-select" name="kantor" aria-label="Default select example" disabled required>
                                                    <option selected><?= $petugas['Kantor']; ?></option>
                                                    <option value="KPKNL Bandung">KPKNL Bandung</option>
                                                    <option value="DJKN Jabar">DJKN Jawa Barat</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <label class="col-sm-1 mt-2" for="nama">Level</label>
                                            <div class="col-sm-11">
                                                <input class="form-control" type="text" name="level" required minlength="4" disabled value="<?= $level['Level']; ?>">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <label class="col-sm-1 mt-2" for="nama">Unit</label>
                                            <div class="col-sm-11">
                                                <input class="form-control" type="text" name="unit" required minlength="4" disabled value="<?= $kategori['namaKategori']; ?>">
                                            </div>
                                            <input type="hidden" name="idPetugas" required value="<?= $petugas['idPetugas']; ?>">
                                        </div>
                                        <div class="my-3 text-end">
                                            <button type="reset" class="btn btn-danger me-3">Reset</button>
                                            <button type="submit" class="btn btn-primary" name="save">Simpan</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title"> Ganti Password </h4>

                                <form action="/Admin_pengaduan/gantiPassword" class="custom-validation" method="POST" enctype="multipart/form-data">
                                    <!-- beri penjelasan tiap input/desc -->
                                    <div class="mt-3">
                                        <?php if (session()->getFlashdata('pesan_pass')) : ?>
                                            <div class="alert alert-success" role="alert"><?= session()->getFlashdata('pesan_pass'); ?></div>
                                        <?php elseif (session()->getFlashdata('pesan_error')) : ?>
                                            <div class="alert alert-danger" role="alert"><?= session()->getFlashdata('pesan_error'); ?></div>
                                        <?php endif; ?>

                                        <div class="row my-2">
                                            <label class="col-sm-2 mt-2" for="oldPass">Password Lama</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="Password" name="oldPass" required minlength="4">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <label class="col-sm-2 mt-2" for="newPass">Password Baru</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="Password" name="newPass" required minlength="4">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <label class="col-sm-2 mt-2" for="confPass">Konfirmasi Password</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="Password" name="confPass" required minlength="4">
                                            </div>
                                        </div>

                                        <input type="hidden" name="idPetugas" required value="<?= $petugas['idPetugas']; ?>">
                                        <div class="my-3 text-end">
                                            <button type="reset" class="btn btn-danger me-3">Reset</button>
                                            <button type="submit" class="btn btn-primary" name="save">Simpan</button>
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
<script src="<?= base_url('assets/js/app.js') ?>"></script>

</body>

</html>