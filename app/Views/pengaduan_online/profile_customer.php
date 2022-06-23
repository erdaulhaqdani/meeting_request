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

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Profil Customer</h4>

                                <form action="/Pengaduan_online/in_profile" class="custom-validation" method="POST" enctype="multipart/form-data">
                                    <!-- beri penjelasan tiap input/desc -->
                                    <div class="mt-3">
                                        <?php if (session()->getFlashdata('pesan')) : ?>
                                            <div class="alert alert-success" role="alert"><?= session()->getFlashdata('pesan'); ?></div>
                                        <?php endif; ?>

                                        <div class="row my-2">
                                            <label class="col-sm-2 mt-2" for="nama">Nama Lengkap</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="nama" id="Nama" onfocusout="regexHuruf()" required value="<?= $customer['Nama']; ?>">
                                                <p id="alert" class="text-danger" style="font-size: 0.7rem; Display: none;">Nama lengkap hanya berisikan huruf</p>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <label class="col-sm-2 mt-2" for="username">Username</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="username" required minlength="4" value="<?= $customer['Username']; ?>">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <label class="col-sm-2 mt-2" for="nik">NIK</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="nik" required minlength="16" maxlength="16" data-parsley-type="digits" value="<?= $customer['NIK']; ?>">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <label class="col-sm-2 mt-2" for="tanggal">Tanggal Lahir</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="date" name="tanggal" max="<?php echo date("Y-m-d"); ?>" value="<?= $customer['tglLahir']; ?>">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <label class="col-sm-2 mt-2" for="email">Email</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="email" name="email" required minlength="4" value="<?= $customer['Email']; ?>">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <label class="col-sm-2 mt-2" for="noHP">No HP</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="noHP" required minlength="9" maxlength="13" data-parsley-type="digits" value="<?= $customer['noHP']; ?>" placeholder="contoh: 085794214986">
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <label class="col-sm-2 mt-2" for="pekerjaan">Pekerjaan</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="pekerjaan" required minlength="4" value="<?= $customer['Pekerjaan']; ?>">
                                            </div>
                                            <input type="hidden" name="idCustomer" required value="<?= $customer['idCustomer']; ?>">
                                        </div>
                                        <div class="my-3 text-end">
                                            <button type="reset" class="btn btn-danger me-3">Reset</button>
                                            <button type="submit" class="btn btn-primary" id="save">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title"> Ganti Password </h4>

                                <form action="/Pengaduan_online/gantiPassword" class="custom-validation" method="POST" enctype="multipart/form-data">
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

                                        <input type="hidden" name="idCustomer" required value="<?= $customer['idCustomer']; ?>">
                                        <div class="my-3 text-end">
                                            <button type="reset" class="btn btn-danger me-3">Reset</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
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
<!-- validation -->
<script src="<?= base_url('assets/libs/parsleyjs/parsley.min.js') ?>"></script>
<script src="<?= base_url('assets/js/pages/form-validation.init.js') ?>"></script>
<script>
    function regexHuruf() {
        let regex = /^[a-zA-Z\s]*$/g;
        let nama = document.getElementById('Nama');
        let alert = document.getElementById('alert');
        let save = document.getElementById('save');
        if (regex.test(nama.value)) {
            nama.style.borderColor = '#ced4da';
            alert.style.display = 'none';
            save.disabled = false;
            return true;
        } else {
            nama.style.borderColor = '#f32f53';
            alert.style.display = 'block';
            save.disabled = true;
            return false;
        }
    }
</script>

<!-- App js -->
<script src="<?= base_url('assets/js/app.js') ?>"></script>

</body>

</html>