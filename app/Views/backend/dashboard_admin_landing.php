<?= $this->include("partials/main") ?>

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

    <!-- jquery.vectormap css -->
    <link rel="stylesheet" href="<?= base_url('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') ?>">

    <!-- Responsive Table css -->
    <link href="/assets/libs/admin-resources/rwd-table/rwd-table.min.css" rel="stylesheet" type="text/css" />
</head>

<?= $this->include("partials/body") ?>

<div class="container-fluid">
    <!-- Begin page -->
    <div id="layout-wrapper">

        <?= $this->include("partials/menu_admin_landing"); ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="swal" data-swal="<?= session()->get('pesan'); ?>"></div>
            <div class="page-content">
                <?php if (session()->getFlashdata('pesan_pass')) : ?>
                    <div class="alert alert-success" role="alert"><?= session()->getFlashdata('pesan_pass'); ?></div>
                <?php elseif (session()->getFlashdata('pesan_error')) : ?>
                    <div class="alert alert-danger" role="alert"><?= session()->getFlashdata('pesan_error'); ?></div>
                <?php endif; ?>

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Dashboard</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin Landing Page</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Statistik Informasi</h4>
                                <canvas id="informasi"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Statistik Agenda</h4>
                                <canvas id="agenda"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-truncate font-size-14 mb-2">Jumlah Customer</p>
                                        <h4 class="mb-2"><?php foreach ($customer->getResultObject() as $a) : ?>
                                                <?= $a->idCustomer; ?>
                                            <?php endforeach ?></h4>
                                        <p class="text-muted mb-0 font-size-13">Customer berstatus aktif</p>
                                    </div>
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-light text-primary rounded-3">
                                            <i class="ri-user-3-line font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end cardbody -->
                        </div><!-- end card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-truncate font-size-14 mb-2">Jumlah Petugas APT</p>
                                        <h4 class="mb-2"><?php foreach ($petugas->getResultObject() as $a) : ?>
                                                <?= $a->idPetugas; ?>
                                            <?php endforeach ?></h4>
                                        <p class="text-muted mb-0 font-size-13">Semua level</p>
                                    </div>
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-light text-dark rounded-3">
                                            <i class="ri-user-3-line font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end cardbody -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-truncate font-size-14 mb-2">Customer Baru</p>
                                        <h4 class="mb-2"><?php foreach ($cust_baru->getResultObject() as $a) : ?>
                                                <?= $a->idCustomer; ?>
                                            <?php endforeach ?></h4>
                                        <p class="text-muted mb-0 font-size-13">Dalam 7 hari terakhir</p>
                                    </div>
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-light text-success rounded-3">
                                            <i class="ri-user-3-line font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end cardbody -->
                        </div><!-- end card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-truncate font-size-14 mb-2">Jumlah Pegawai</p>
                                        <h4 class="mb-2"><?php foreach ($pegawai->getResultObject() as $a) : ?>
                                                <?= $a->idPegawai; ?>
                                            <?php endforeach ?></h4>
                                        <p class="text-muted mb-0 font-size-13">Semua level</p>
                                    </div>
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-light text-warning rounded-3">
                                            <i class="ri-user-3-line font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end cardbody -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div>

                <!-- Last Meeting -->
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">5 Informasi Terakhir</h4>

                                <a href="/Landing_page" class="btn btn-primary btn-md me-3 mb-3">Lihat Semua</a>
                                <a href="/Landing_page/form" class="btn btn-success btn-md mb-3"><i class="fas fa-plus-circle"></i> Tambah</a>
                                <?php
                                if (session()->get('pesan')) {
                                ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= session()->get('pesan'); ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0">
                                        <table id="tech-companies-1" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Kategori</th>
                                                    <th>Judul</th>
                                                    <th>Tanggal Input</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php

                                                ?>
                                                <?php foreach ($lastBerita->getResult() as $a) :
                                                    $tanggal = date('Y-m-d', strtotime($a->created_at));

                                                    $judul = $a->Judul;
                                                    $textJudul = strlen($judul);
                                                    $num_char = 50;
                                                    if ($textJudul > $num_char) {
                                                        $cut_judul = substr($judul, 0, $num_char) . '...';
                                                    } else {
                                                        $cut_judul = $a->Judul;
                                                    }
                                                ?>
                                                    <tr>
                                                        <td><?= $a->Kategori; ?></td>
                                                        <td><?= $cut_judul ?></td>
                                                        <td><?= tanggal_indo($tanggal) ?></td>
                                                        <td><?= $a->Status; ?></td>
                                                        <td>
                                                            <a href="/Landing_page/edit/<?= $a->id_berita; ?>" class="btn btn-primary btn-sm w-xs me-1">Ubah</a>
                                                            <?php if ($a->Status == 'Diarsipkan') : ?>
                                                                <a href="/Landing_page/publik_dashboard/<?= $a->id_berita; ?>" class="btn btn-success btn-sm w-xs">Publish</a>
                                                            <?php elseif ($a->Status == 'Publik') : ?>
                                                                <a href="/Landing_page/arsip_dashboard/<?= $a->id_berita; ?>" class="btn btn-warning btn-sm w-xs">Arsip</a>
                                                            <?php endif ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Page-content -->

            <?= $this->include("partials/footer") ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

</div>
<!-- end container-fluid -->

<?= $this->include("partials/right-sidebar") ?>

<!-- JAVASCRIPT -->
<?= $this->include("partials/vendor-scripts") ?>

<!-- Responsive Table js -->
<script src="assets/libs/admin-resources/rwd-table/rwd-table.min.js"></script>

<!-- Init js -->
<script src="assets/js/pages/table-responsive.init.js"></script>

<!-- jquery.vectormap map -->
<script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

<!-- App js -->
<script src="<?= base_url('assets/js/app.js') ?>"></script>
<script src="<?= base_url('assets/js/chart.min.js') ?>"></script>

<!-- Chart donut statistik agenda -->
<script>
    var agenda = document.getElementById('agenda');
    var data_agenda = [];
    var label_agenda = [];

    <?php foreach ($groupAgenda->getResult() as $key => $value) : ?>
        data_agenda.push(<?= $value->Jumlah ?>);
        label_agenda.push('<?= $value->Status ?>');
    <?php endforeach ?>

    var data_group_agenda = {
        datasets: [{
            data: data_agenda,
            backgroundColor: [
                '#6fd088',
                '#ffbb44',
            ],
        }],
        labels: label_agenda,
    }

    var chart_agenda = new Chart(agenda, {
        type: 'doughnut',
        data: data_group_agenda,
        options: {
            plugins: {
                legend: {
                    align: 'start',
                    labels: {
                        boxWidth: 15
                    }
                }
            }
        }
    });
</script>

<!-- Chart donut statistik informasi -->
<script>
    var informasi = document.getElementById('informasi');
    var data_informasi = [];
    var label_informasi = [];

    <?php foreach ($groupInfo->getResult() as $key => $value) : ?>
        data_informasi.push(<?= $value->Jumlah ?>);
        label_informasi.push('<?= $value->Kategori ?>');
    <?php endforeach ?>

    var data_group_informasi = {
        datasets: [{
            data: data_informasi,
            backgroundColor: [
                '#0f9cf3',
                '#6fd088',
                '#f32f53',
                '#ffbb44'
            ],
        }],
        labels: label_informasi,
    }

    var chart_informasi = new Chart(informasi, {
        type: 'doughnut',
        data: data_group_informasi,
        options: {
            plugins: {
                legend: {
                    align: 'start',
                    labels: {
                        boxWidth: 15
                    }
                }
            }
        }
    });
</script>

</body>

</html>