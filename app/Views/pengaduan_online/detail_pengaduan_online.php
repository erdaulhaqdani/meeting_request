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
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">

                                    <h3 class="card-title"><?= $title; ?></h3>
                                    <p class="card-title-desc">Berikut adalah identitas dan detail pengajuan Pengaduan Online Anda.</p>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="row mb-1">
                                                <label class="col-sm-6">IDENTITAS CUSTOMER</label>
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
                                        <div class="col-md-6">
                                            <div class="row mb-1">
                                                <label class="col-sm-6">DETAIL PENGADUAN ONLINE</label>
                                                <hr>
                                            </div>
                                            <div class="row">
                                                <?php $tanggal = date('Y-m-d', strtotime($pengaduan['created_at'])); ?>
                                                <label class="col-sm-4">Tanggal Pengajuan</label>
                                                <label class="col-sm-8">: <?= tanggal_indo($tanggal); ?></label>
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
                                            <?php if ($pengaduan['Rating'] > 0) : ?>
                                                <div class="row">
                                                    <label class="col-sm-4">Rating</label>
                                                    <label class="col-sm-8">: <?= $pengaduan['Rating']; ?></label>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-4">Ulasan</label>
                                                    <label class="col-sm-8">: <?= $pengaduan['Ulasan']; ?></label>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                        <div class="col-md-2 align-right">
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
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <label class="col-sm-6">IDENTITAS PETUGAS</label>
                                                    <hr>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-4">Nama Lengkap</label>
                                                    <label class="col-sm-8">: <?= $petugas['Nama'] ?></label>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-4">Level</label>
                                                    <label class="col-sm-8">: <?= $level['Level']; ?></label>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-4">Email</label>
                                                    <label class="col-sm-8">: <?= $petugas['Email'] ?></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label class="col-sm-6">DETAIL TANGGAPAN</label>
                                                    <hr>
                                                </div>
                                                <div class="row">
                                                    <?php $tanggal_selesai = date('Y-m-d', strtotime($tanggapan['tgl_selesai'])); ?>
                                                    <label class="col-sm-4">Tanggal Selesai</label>
                                                    <label class="col-sm-8">: <?= tanggal_indo($tanggal_selesai); ?></label>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-4">Uraian Tanggapan</label>
                                                    <label class="col-sm-8">: <?= $tanggapan['Isi']; ?></label>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-4">Lampiran</label>
                                                    <?php if ($tanggapan['Lampiran'] == 'user.png') : ?>
                                                        <label class="col-sm-8"><a href="/lampiran/<?= $tanggapan['Lampiran']; ?>" class="isDisabled">: Tidak memiliki lampiran</a></label>
                                                    <?php else : ?>
                                                        <label class=" col-sm-8"><a href="/lampiran/<?= $tanggapan['Lampiran']; ?>">: <?= $pengaduan['Lampiran']; ?></a></label>
                                                    <?php endif ?>
                                                </div>
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
                                            <?php $tgl = date("Y-m-d", strtotime($pengaduan['updated_at'])); ?>
                                            <div class="col-6">
                                                sudah mulai diproses sejak <?= tanggal_indo($tanggal); ?>
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

<!-- App js -->
<script src="<?= base_url('assets/js/app.js') ?>"></script>

</body>

</html>