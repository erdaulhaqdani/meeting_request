<?= $this->include('partials/main') ?>

<head>
    <?= $this->include("partials/title-meta"); ?>

    <!-- Plugins css -->
    <link href="/assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <?= $this->include('partials/head-css') ?>

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

                                <h1 class="card-title">Tanggapan Meeting Request</h1>
                                <form action="/petugas_MR/inputTanggapan" method="POST" enctype="multipart/form-data" class="custom-validation">

                                    <div class="mb-3">
                                        <label for="isi">Status Meeting Request</label>
                                        <select name="status" id="s" onchange="tampilPetugas()" class="form-select" aria-label="Default select example">
                                            <option value="Selesai diproses">Selesai diproses</option>
                                            <option value="Eskalasi">Eskalasi</option>
                                            <option value="Sedang diproses">Sedang diproses</option>
                                            <option value="Tidak disetujui">Tidak disetujui</option>
                                        </select>
                                    </div>

                                    <div class="mb-3" id="petugas" style="display: none;">
                                        <label for="petugas">Petugas tujuan</label>
                                        <select name="petugas" class="form-select">
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

                                    <div class="mb-3">
                                        <label for="isi">Uraian Tanggapan</label>
                                        <textarea name="isi" class="form-control" required minlength="10" rows="3" placeholder="Masukkan uraian"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="lampiran">Lampiran</label>
                                        <input type="file" name="lampiran" class="form-control" id="lampiran">
                                    </div>

                                    <input type="hidden" name="idMeeting" value="<?= $idMeeting; ?>">

                                    <div class="mb-3 text-start">
                                        <button type="submit" class="btn btn-primary me-2" name="tanggapan">Submit</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
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
<script src="/assets/libs/dropzone/min/dropzone.min.js"></script>
<script src="/assets/libs/parsleyjs/parsley.min.js"></script>
<script src="/assets/js/pages/form-validation.init.js"></script>

<!-- App js -->
<script src="/assets/js/app.js"></script>

<!-- A javascript function that will hide the input field if the status is not "Eskalasi" */ -->
<script>
    function tampilPetugas() {
        let s = document.getElementById("s");
        let petugas = document.getElementById("petugas");
        if (s.value == "Eskalasi") {
            s.style.display = "block";
            petugas.style.display = "block";
        } else {
            s.style.display = "block";
            petugas.style.display = "none";
        }
    }
</script>

</body>

</html>