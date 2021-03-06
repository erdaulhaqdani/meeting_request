<?= $this->include('partials/main') ?>

<head>

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

    <link rel="stylesheet" href="<?= base_url('assets/libs/dropify/css/dropify.min.css') ?>">

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

                <?= $title ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title"><?= $title; ?></h4>

                                <form action="/Pengaduan_online/update/<?= $pengaduan['idPengaduan']; ?>" method="POST" enctype="multipart/form-data">

                                    <div class="my-3">
                                        <label for="kategori">Kategori</label>
                                        <select name="kategori" class="form-select" aria-label="Default select example">
                                            <?php foreach ($kategori as $a) : ?>
                                                <option value="<?= $a['idKategori'] ?>"><?= $a['namaKategori']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="judul">Judul</label>
                                        <div>
                                            <input class="form-control" required minlength="5" type="text" name="judul" placeholder="Masukkan judul" value="<?= (old('judul')) ? old('judul') : $pengaduan['Judul'] ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="isi">Isi</label>
                                        <textarea name="isi" class="form-control" required minlength="5" rows="3" placeholder="Masukkan Isi"><?= (old('Isi')) ? old('Isi') : $pengaduan['Isi'] ?></textarea>
                                        <input type="hidden" name="idCustomer" value="<?= session('idCustomer'); ?>">
                                    </div>

                                    <label for="lampiran">Lampiran</label>: <a href="/lampiran/<?= $pengaduan['Lampiran'] ?>">Lampiran</a>
                                    <div class="mb-3">
                                        <input type="file" id="file" class="dropify" name="lampiran" />
                                        <!-- <button type="button" class="dropify-clear">Remove</button> -->
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="text-info" id="fileWarn">Jenis file pada lampiran adalah jpg, jpeg, png, atau pdf max 5MB</h6>
                                    </div>
                                    <div class="mb-3 text-end">
                                        <button type="reset" class="btn btn-danger me-3">Reset</button>
                                        <button type="submit" class="btn btn-primary" name="input_PO">Submit</button>
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

<script>
    sizeValidation = () => {
        const fi = document.getElementById('file');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {

                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 5120) {
                    document.getElementById('fileWarn').innerHTML = "File terlalu besar";
                    $('#fileWarn').removeClass("text-info");
                    $('#fileWarn').addClass("text-danger");
                    document.getElementById('input').disable = true;
                } else {
                    document.getElementById('fileWarn').innerHTML = "Jenis file pada lampiran adalah jpg, jpeg, png, atau pdf max 5MB";
                    $('#fileWarn').removeClass("text-danger");
                    $('#fileWarn').addClass("text-info");
                    document.getElementById('input').disable = false;
                }
            }
        }
    }
</script>

<script>
    function extValidation() {
        var fileInput =
            document.getElementById('file');

        var filePath = fileInput.value;

        // Allowing file type
        var allowedExtensions =
            /(\.jpg|\.jpeg|\.png|\.pdf)$/i;

        if (!allowedExtensions.exec(filePath)) {
            alert('Invalid file type');
            fileInput.value = '';
            return false;
        } else {
            alert('Valid file type');
        }
    }
</script>

<!-- Plugins js -->
<!-- validation -->
<script src="<?= base_url('assets/libs/parsleyjs/parsley.min.js') ?>"></script>
<script src="<?= base_url('assets/js/pages/form-validation.init.js') ?>"></script>
<!-- drag n drop file -->
<script src="<?= base_url('assets/libs/dropify/js/dropify.min.js') ?>"></script>
<script src="<?= base_url('assets/js/custom-dropify.js') ?>"></script>

<!-- App js -->
<script src="<?= base_url('assets/js/app.js') ?>"></script>

</body>

</html>