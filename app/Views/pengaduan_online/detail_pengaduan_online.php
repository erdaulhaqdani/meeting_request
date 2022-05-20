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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="invoice-title">
                                    <h3><?= $title ?></h3>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-4">
                                        <address>
                                            <strong>Identitas pengaju</strong><br>
                                            <?php //getNamaKategori
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
                                            <?= $Nama; ?><br>
                                            <?= $NIK; ?><br>
                                            <?= $Email; ?><br>
                                        </address>
                                    </div>
                                    <div class="col-4">
                                        <?php //getNamaKategori
                                        $k = '';
                                        foreach ($kategori as $a) {
                                            if ($pengaduan['idKategori'] == $a['idKategori']) {
                                                $k = $a['namaKategori'];
                                            }
                                        }
                                        ?>
                                        <address>
                                            <strong>Kode Tiket P-<?= $pengaduan['idPengaduan']; ?></strong><br>
                                            <?= $k; ?><br>
                                            <?= $pengaduan['Judul']; ?><br>
                                            <?= $pengaduan['Isi']; ?><br>
                                            Lampiran : <a href="/lampiran/<?= $pengaduan['Lampiran']; ?>">Lampiran</a><br>
                                            <?= $pengaduan['Status']; ?>
                                        </address>
                                    </div>
                                    <div class="col-4">
                                        <button name="cetak" onclick="window.open('<?php echo site_url('/Pengaduan_online/print/' . $pengaduan['idPengaduan']) ?>')" class="btn btn-danger"><i class="fas fa-print align-middle me-2"></i> Cetak</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 mt-3">

                                    </div>
                                    <div class="col-4 mt-3">
                                        <address>
                                            <strong>Tanggal dibuat</strong><br>
                                            <?php $tgl = date("d F Y H:i", strtotime($pengaduan['created_at'])); ?>
                                            <?= $tgl; ?><br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                        <?php //getNamaKategori
                                        $Nama = '';
                                        $NIP = '';
                                        $Email = '';
                                        $Isi = '';
                                        $Lampiran = '';
                                        $idPetugas = '';
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
                                            }
                                        }
                                        ?>
                                        <div class="col-6">
                                            <address>
                                                <strong>Petugas</strong><br>
                                                <?= $Nama; ?><br>
                                                <?= $NIP; ?><br>
                                                <?= $Email; ?><br>
                                            </address>
                                        </div>

                                        <div class="col-6">
                                            <strong>Uraian Tanggapan</strong><br>
                                            <?= $Isi; ?><br>
                                            <a href="/Lampiran/<?= $Lampiran; ?>">Lampiran</a>
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