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

        <?= $this->include('partials/menu_petugas') ?>

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
                                        <div class="col-md-6">
                                            <div class="row mb-1">
                                                <label class="col-sm-6">IDENTITAS</label>
                                                <hr>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-4">NIK</label>
                                                <label class="col-sm-8">: <?= $customer['NIK']; ?></label>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-4">Nama Lengkap</label>
                                                <label class="col-sm-8"> : <?= $customer['Nama']; ?></label>

                                            </div>
                                            <div class="row">
                                                <label class="col-sm-4">Email</label>
                                                <label class="col-sm-8">: <?= $customer['Email']; ?></label>

                                            </div>
                                            <div class="row">
                                                <label class="col-sm-4">Nomor Telepon</label>
                                                <label class="col-sm-8">: <?= $customer['noHP']; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-sm-6">DETAIL PENGADUAN ONLINE</label>
                                                <hr>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-4">Tanggal Pengajuan</label>
                                                <label class="col-sm-8">: <?= formatTanggal($pengaduan['created_at']); ?></label>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-4">Jenis Layanan</label>
                                                <label class="col-sm-8">: <?= $kategori['namaKategori']; ?></label>
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
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <a href="/admin"><button type="button" class="btn btn-warning waves-effect">Kembali</button></a>
                                        </div>
                                        <div class="col-sm-10">
                                            <a onclick="window.open('<?php echo site_url('/Pengaduan_online/print/' . $pengaduan['idPengaduan']) ?>')" class="btn btn-danger"><i class="fas fa-print align-middle me-2"></i> Cetak</a>
                                            <?php if ($pengaduan['Status'] == 'Belum diproses') : ?>
                                                <a href="/admin/proses/<?= $pengaduan['idPengaduan']; ?>" class="btn btn-primary waves-effect"> Mulai Proses</a>
                                            <?php elseif ($pengaduan['Status'] == 'Selesai diproses') : ?>
                                            <?php elseif ($pengaduan['Status'] != 'Belum diproses') : ?>
                                                <a href="/admin/tanggapan/<?= $pengaduan['idPengaduan']; ?>" class="btn btn-info waves-effect">Tanggapan</a>
                                            <?php endif ?>
                                        </div>
                                        <div class="col-sm-8">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <?php foreach ($tanggapan as $arrTanggapan) : ?>
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
                                            <div class="col-4">
                                                <div class="row">
                                                    <label class="col-sm-6">IDENTITAS PETUGAS</label>
                                                    <hr>
                                                </div>
                                                <?php //getPetugas
                                                $nama = '';
                                                $idLevel = '';
                                                $mail = '';
                                                $levelPetugas = '';
                                                foreach ($petugas as $p) {
                                                    if ($p['idPetugas'] == $arrTanggapan['idPetugas']) {
                                                        $nama = $p['Nama'];
                                                        $idLevel = $p['idLevel'];
                                                        $mail = $p['Email'];
                                                    }
                                                };
                                                foreach ($level as $l) {
                                                    if ($l['idLevel'] == $idLevel) {
                                                        $levelPetugas = $l['Level'];
                                                    }
                                                };
                                                ?>
                                                <div class="row">
                                                    <label class="col-sm-4">Nama Lengkap</label>
                                                    <label class="col-sm-8">: <?= $nama ?></label>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-4">Level</label>
                                                    <label class="col-sm-8">: <?= $levelPetugas; ?></label>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-4">Email</label>
                                                    <label class="col-sm-8">: <?= $mail ?></label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <label class="col-sm-6">DETAIL TANGGAPAN</label>
                                                    <hr>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-4">Tanggal</label>
                                                    <label class="col-sm-8">: <?= formatTanggal($arrTanggapan['tgl_selesai']); ?></label>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-4">Uraian Tanggapan</label>
                                                    <label class="col-sm-8">: <?= $arrTanggapan['Isi']; ?></label>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-4">Lampiran</label>
                                                    <?php if ($arrTanggapan['Lampiran'] == 'user.png') : ?>
                                                        <label class="col-sm-8"><a href="/lampiran/<?= $arrTanggapan['Lampiran']; ?>" class="isDisabled">: Tidak memiliki lampiran</a></label>
                                                    <?php else : ?>
                                                        <label class=" col-sm-8"><a href="/lampiran/<?= $arrTanggapan['Lampiran']; ?>">: <?= $pengaduan['Lampiran']; ?></a></label>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>


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

<!-- App js -->
<script src="<?= base_url('assets/js/app.js') ?>"></script>

</body>

</html>