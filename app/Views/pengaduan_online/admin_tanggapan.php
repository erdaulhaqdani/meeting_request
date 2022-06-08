<?= $this->include('partials/main') ?>

<head>
    <meta charset="utf-8">

    <?= $this->include("partials/title-meta"); ?>

    <?= $this->include("partials/head-css"); ?>

    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?> " id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('assets/css/icons.min.css'); ?> " rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('assets/css/app.min.css'); ?>" id="app-style" rel="stylesheet" type="text/css" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico'); ?>">

    <link rel="stylesheet" href="<?= base_url('assets/libs/dropify/css/dropify.min.css') ?>">
</head>

<?= $this->include('partials/body') ?>

<div class="container-fluid">
    <!-- Begin page -->
    <div id="layout-wrapper">

        <?= $this->include('partials/menu_petugas') ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h1 class="card-title"><?= $title ?></h1>
                                <form action="/Admin_pengaduan/input" method="POST" enctype="multipart/form-data">

                                    <div class="mb-3">
                                        <label for="isi">Status Pengaduan</label>
                                        <select name="status" id="s" onchange="tampilPetugas()" class="form-select" aria-label="Default select example">
                                            <option value="Selesai diproses">Selesai diproses</option>
                                            <option value="Eskalasi">Eskalasi</option>
                                            <option value="Sedang diproses">Sedang diproses</option>
                                            <option value="Tidak dapat diproses">Tidak dapat diproses</option>
                                            <option value="Belum bisa diproses">Belum bisa diproses</option>
                                        </select>
                                    </div>

                                    <div class="mb-3" id="petugas" style="display: none;">
                                        <label for="petugas">Petugas tujuan</label>
                                        <select name="petugas" class="form-select" id="selectPetugas">
                                            <?php foreach ($petugas as $p) : ?>
                                                <?php foreach ($level as $l) {
                                                    if ($l['idLevel'] == $p['idLevel']) {
                                                        $a = $l['Level'];
                                                    }
                                                } ?>
                                                <option value="<?= $p['idPetugas'] ?>"><?= $a ?> - <?= $p['Nama']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="mb-3" id="isi">
                                        <label for="isi">Uraian Tanggapan</label>
                                        <textarea name="isi" class="form-control" required minlength="5" rows="3" placeholder="Masukkan Isi"><?= old('isi'); ?></textarea>
                                    </div>

                                    <div class="mb-3" id="lampiran">
                                        <label for="lampiran">Lampiran</label>
                                        <input type="file" class="dropify" name="lampiran" />
                                    </div>

                                    <input type="hidden" name="idPengaduan" value="<?= $idPengaduan; ?>">

                                    <div class="mt-3 text-end">
                                        <button type="reset" class="btn btn-danger me-3">Reset</button>
                                        <button type="submit" class="btn btn-primary" name="tanggapan">Submit</button>
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

<!-- Plugins js -->
<!-- validation -->
<script src="<?= base_url('assets/libs/parsleyjs/parsley.min.js') ?>"></script>
<script src="<?= base_url('assets/js/pages/form-validation.init.js') ?>"></script>
<!-- drag n drop file -->
<script src="<?= base_url('assets/libs/dropify/js/dropify.min.js') ?>"></script>
<script src="<?= base_url('assets/js/custom-dropify.js') ?>"></script>

<!-- App js -->
<script src="<?= base_url('assets/js/app.js') ?>"></script>

<!-- A javascript function that will hide the input field if the status is not "Eskalasi" */ -->
<script>
    function tampilPetugas() {
        let s = document.getElementById("s");
        let petugas = document.getElementById("petugas");
        let selectPetugas = document.getElementById("selectPetugas");
        if (s.value == "Eskalasi") {
            s.style.display = "block";
            petugas.style.display = "block";
        } else {
            s.style.display = "block";
            petugas.style.display = "none";
            selectPetugas.option.value = <?= session('idPetugas'); ?>;
        }
    }
</script>
</body>

</html>