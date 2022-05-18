<?= $this->include('partials/main') ?>

<head>

    <?= $this->include('partials/title-meta') ?>

    <!-- Plugins css -->
    <link href="/assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

    <?= $this->include('partials/head-css') ?>

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

                                <h1 class="card-title"><?= $title ?></h1>
                                <form action="/Admin_pengaduan/input" method="POST" enctype="multipart/form-data">

                                    <div class="mb-3">
                                        <label for="isi">Status Pengaduan</label>
                                        <select name="status" class="form-select" aria-label="Default select example">
                                            <option value="Selesai diproses">Selesai diproses</option>
                                            <option value="Sedang diproses">Sedang diproses</option>
                                            <option value="Tidak dapat diproses">Tidak dapat diproses</option>
                                            <option value="Belum bisa diproses">Belum bisa diproses</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="isi">Uraian Tanggapan</label>
                                        <textarea name="isi" class="form-control" required minlength="5" rows="3" placeholder="Masukkan Isi"><?= old('isi'); ?></textarea>
                                    </div>

                                    <label for="lampiran">Lampiran</label>
                                    <div class="dropzone mb-3">
                                        <div class="fallback">
                                            <input name="lampiran" type="file">
                                        </div>
                                        <div class="dz-message needsclick">
                                            <div class="mb-3">
                                                <i class="display-4 text-muted mdi mdi-upload-network-outline"></i>
                                            </div>
                                            <h4>Drop files here or click to upload.</h4>
                                        </div>
                                    </div>

                                    <input type="hidden" name="idPengaduan" value="<?= $idPengaduan; ?>">

                                    <div class="mb-3 text-end">
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
<script src="/assets/libs/dropzone/min/dropzone.min.js"></script>
<script src="/assets/libs/parsleyjs/parsley.min.js"></script>
<script src="/assets/js/pages/form-validation.init.js"></script>

<!-- App js -->
<script src="/assets/js/app.js"></script>

</body>

</html>