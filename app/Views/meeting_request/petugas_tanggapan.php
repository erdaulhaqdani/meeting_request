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

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Tanggapan Janji Temu</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Janji Temu</a></li>
                                    <li class="breadcrumb-item active">Tanggapan Janji Temu</li>
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

                                <h1 class="card-title">Form Tanggapan</h1>
                                <p class="card-title-desc">Masukkan informasi Tanggapan dengan lengkap.</p>
                                <form action="/petugas_MR/inputTanggapan" method="POST" enctype="multipart/form-data" class="custom-validation">

                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="status">Status Janji Temu </label>
                                        <div class="col-sm-9">
                                            <select name="status" id="s" onchange="tampilPetugas()" class="form-select">
                                                <option selected disabled value="">Pilih status</option>
                                                <option value="Selesai diproses">Selesai diproses</option>
                                                <option value="Eskalasi">Eskalasi</option>
                                                <option value="Sedang diproses">Sedang diproses</option>
                                                <option value="Tidak disetujui">Tidak disetujui</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3" id="petugas" style="display: none">
                                        <div class="col-sm-3">
                                            <label class="form-label" for="petugas">Petugas Tujuan</label>
                                        </div>
                                        <div class="col-sm-9">
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
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="isi">
                                            Uraian Tanggapan </label>
                                        <div class="col-sm-9">
                                            <textarea name="isi" class="form-control" required minlength="10" rows="3" placeholder="Masukkan uraian"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="lampiran">
                                            Lampiran (opsional) </label>
                                        <div class="col-sm-9">
                                            <input type="file" name="lampiran" class="form-control" id="lampiran">
                                        </div>
                                    </div>

                                    <input type="hidden" name="idMeeting" value="<?= $idMeeting; ?>">

                                    <div class="mb-3 text-end">
                                        <input type="button" value="Kembali" class="btn btn-warning waves-effect me-2 mt-2" onclick="history.back(-1)" />
                                        <button type="reset" class="btn btn-secondary me-2 mt-2">Reset</button>
                                        <button type="submit" class="btn btn-primary me-2 mt-2" name="tanggapan">Submit</button>
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
            s.style.display = "";
            petugas.style.display = "";
        } else {
            s.style.display = "block";
            petugas.style.display = "none";
        }
    }
</script>

</body>

</html>