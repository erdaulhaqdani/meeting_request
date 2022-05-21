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

    <style>
        .isDisabled {
            color: currentColor;
            cursor: not-allowed;
            opacity: 0.7;
            text-decoration: none;
            pointer-events: none;
        }

        .isDisabled:hover {
            color: currentColor;
            opacity: 0.5;
        }
    </style>

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
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h3 class="card-title"><?= $title; ?></h3>
                                    <p class="card-title-desc">Berikut adalah identitas dan detail pengajuan Pengaduan Online Anda.</p>
                                    <div class="row">

                                        <div class="col-4">
                                            <div class="row mb-1">
                                                <label class="col-sm-6">IDENTITAS CUSTOMER</label>
                                                <hr>
                                                <?php //getCustomer
                                                $Nama = '';
                                                $NIK = '';
                                                $Email = '';
                                                foreach ($customer as $a) {
                                                    if ($pengaduan['idCustomer'] == $a['idCustomer']) {
                                                        $Nama = $a['Nama'];
                                                        $NIK = $a['NIK'];
                                                        $Email = $a['Email'];
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-4">NIK</label>
                                                <label class="col-sm-8">: <?= $NIK; ?></label>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-4">Nama Lengkap</label>
                                                <label class="col-sm-8"> : <?= $Nama; ?></label>

                                            </div>
                                            <div class="row">
                                                <label class="col-sm-4">Email</label>
                                                <label class="col-sm-8">: <?= $Email; ?></label>

                                            </div>
                                            <div class="row">
                                                <label class="col-sm-4">Nomor Telepon</label>
                                                <label class="col-sm-8">: <?= $Email; ?></label>

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-sm-6">DETAIL PENGADUAN ONLINE</label>
                                                <hr>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-4">Tanggal Pengajuan</label>
                                                <label class="col-sm-8">: <?= $pengaduan['created_at']; ?></label>
                                            </div>
                                            <div class="row">
                                                <?php //getNamaKategori
                                                $k = '';
                                                foreach ($kategori as $a) {
                                                    if ($pengaduan['idKategori'] == $a['idKategori']) {
                                                        $k = $a['namaKategori'];
                                                    }
                                                }
                                                ?>
                                                <label class="col-sm-4">Jenis Layanan</label>
                                                <label class="col-sm-8">: <?= $k; ?></label>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-4">Judul</label>
                                                <label class="col-sm-8">: <?= $pengaduan['Judul']; ?></label>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-4">Isi</label>
                                                <label class="col-sm-8">: <?= $pengaduan['Isi']; ?></label>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-4">Lampiran</label>
                                                <?php if ($pengaduan['Lampiran'] == 'user.png') : ?>
                                                    <label class="col-sm-8"><a href="/lampiran/<?= $pengaduan['Lampiran']; ?>" class="isDisabled">: Tidak memiliki lampiran</a></label>
                                                <?php else : ?>
                                                    <label class=" col-sm-8"><a href="/lampiran/<?= $pengaduan['Lampiran']; ?>">: <?= $pengaduan['Lampiran']; ?></a></label>
                                                <?php endif ?>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-4">Status</label>
                                                <label class="col-sm-8">: <?= $pengaduan['Status']; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-2 align-right">
                                            <button name="cetak" onclick="window.open('<?php echo site_url('/Pengaduan_online/print/' . $pengaduan['idPengaduan']) ?>')" class="btn btn-danger mt-5"><i class="fas fa-print align-middle me-2"></i> Cetak</button>
                                        </div>
                                        <a href="/Pengaduan_online"><button type="button" class="btn btn-warning waves-effect">Kembali</button> </a>
                                    </div>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                    <?php if ($pengaduan['Status'] == 'Selesai diproses') : ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="invoice-title">
                                            <div class="mb-4">
                                                <h5>Tanggapan</h1>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <?php //getPetugas
                                            $Nama = '';
                                            $NIP = '';
                                            $Email = '';
                                            $Isi = '';
                                            $Lampiran = '';
                                            $idPetugas = '';
                                            $Level = '';
                                            foreach ($tanggapan as $a) {
                                                if ($pengaduan['idPengaduan'] == $a['idPengaduan']) {
                                                    $Isi = $a['Isi'];
                                                    $Lampiran = $a['Lampiran'];
                                                    $idPetugas = $a['idPetugas'];
                                                }
                                            }
                                            foreach ($petugas as $b) {
                                                if ($idPetugas == $b['idPetugas']) {
                                                    $Nama = $b['Nama'];
                                                    $NIP = $b['NIP'];
                                                    $Email = $b['Email'];
                                                    $Level = $b['idLevel'];
                                                }
                                            }
                                            ?>
                                            <div class="row">
                                                <label class="col-sm-2">IDENTITAS PETUGAS</label>
                                                <hr>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2">Nama Lengkap</label>
                                                <label class="col-sm-9">: <?= $Nama ?></label>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2">Level</label>
                                                <label class="col-sm-8">: <?= $Level; ?></label>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2">Email</label>
                                                <label class="col-sm-8">: <?= $Email ?></label>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2">Uraian Tanggapan</label>
                                                <label class="col-sm-8">: <?= $Isi; ?></label>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2">Lampiran</label>
                                                <?php if ($Lampiran == 'user.png') : ?>
                                                    <label class="col-sm-8"><a href="/lampiran/<?= $Lampiran; ?>" class="isDisabled">: Tidak memiliki lampiran</a></label>
                                                <?php else : ?>
                                                    <label class=" col-sm-8"><a href="/lampiran/<?= $Lampiran; ?>">: <?= $pengaduan['Lampiran']; ?></a></label>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php elseif ($pengaduan['Status'] == 'Sedang diproses') : ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="invoice-title">
                                            <div class="mb-4">
                                                <h5>Tanggapan</h1>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <?php $tgl = date("d F Y H:i", strtotime($pengaduan['updated_at'])); ?>
                                            <div class="col-6">
                                                sudah mulai diproses sejak <?= $tgl; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>


                </div> <!-- container-fluid -->
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
<!-- PDFMake -->
<script src="<?= base_url('assets/libs/pdfmake/build/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/pdfmake/build/vfs_fonts.js') ?>"></script>

<!-- App js -->
<script src="<?= base_url('assets/js/app.js') ?>"></script>

<script>
    $("#print").submit(function(e) {
        var PdfPrinter = require('../src/printer');
        var printer = new PdfPrinter(fonts);
        var fs = require('fs');

        var docDefinition = {
            content: [
                'First paragraph',
                'Another paragraph, this time a little bit longer to make sure, this line will be divided into at least two lines'
            ]
        };

        var pdfDoc = printer.createPdfKitDocument(docDefinition);
        pdfDoc.pipe(fs.createWriteStream('pdfs/basics.pdf'));
        pdfDoc.end();
    })
</script>

</body>

</html>