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

    <!-- DataTables -->
    <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive Table css -->
    <link href="/assets/libs/admin-resources/rwd-table/rwd-table.min.css" rel="stylesheet" type="text/css" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico'); ?>">

    <!-- jquery.vectormap css -->
    <link rel="stylesheet" href="<?= base_url('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') ?>">
</head>

<?= $this->include("partials/body") ?>

<div class="container-fluid">
    <!-- Begin page -->
    <div id="layout-wrapper">

        <?= $this->include("partials/menu"); ?>

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
                            <h4 class="mb-sm-0">Beranda</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">APTB</a></li>
                                    <li class="breadcrumb-item active">Beranda</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Statistik Pengaduan</h4>
                                <canvas id="pengaduan"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Statistik Janji Temu</h4>
                                <canvas id="meeting"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-truncate font-size-14 mb-2">Jumlah Pengaduan</p>
                                        <h4 class="mb-2"><?php foreach ($jumlahPengaduan->getResultObject() as $a) : ?>
                                                <?= $a->idPengaduan ?>
                                            <?php endforeach ?></h4>
                                        <p class="text-muted mb-0 font-size-13">Semua status</p>
                                    </div>
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-light text-primary rounded-3">
                                            <i class="ri-inbox-archive-line font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end cardbody -->
                        </div><!-- end card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-truncate font-size-14 mb-2">Jumlah Janji Temu</p>
                                        <h4 class="mb-2"><?php foreach ($jumlahMeeting->getResultObject() as $a) : ?>
                                                <?= $a->idMeeting; ?>
                                            <?php endforeach ?></h4>
                                        <p class="text-muted mb-0 font-size-13">Semua status</p>
                                    </div>
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-light text-success rounded-3">
                                            <i class=" ri-inbox-archive-line font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end cardbody -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Pengaduan yang dibuat minggu ini</h4>
                                <canvas id="bar_pengaduan"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Janji Temu yang dibuat minggu ini</h4>
                                <canvas id="bar_meeting"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Last Meeting -->
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">4 Janji Temu Terakhir</h4>

                                <a href="/Meeting_request" class="btn btn-primary btn-md me-3 mb-2">Lihat Semua</a>
                                <a href="/Meeting_request/form" class="btn btn-success btn-md mb-2"><i class="fas fa-plus-circle"></i> Tambah</a>

                                <div class="table-responsive mb-0">
                                    <table id="tech-companies-1" class="table">
                                        <thead>
                                            <tr>
                                                <th>Jenis Layanan</th>
                                                <th>Tanggal Input</th>
                                                <th>Tanggal Kunjungan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php foreach ($lastMeetingRequest->getResult() as $a) : ?>
                                                <?php //getNamaKategori
                                                $k = '';
                                                $tanggal_input = date('Y-m-d', strtotime($a->created_at));
                                                $tanggal_kunjungan = date('Y-m-d', strtotime($a->Tanggal_kunjungan));

                                                foreach ($kategori as $b) {
                                                    if ($a->idKategori == $b['idKategori']) {
                                                        $k = $b['namaKategori'];
                                                    }
                                                }
                                                ?>
                                                <tr>
                                                    <td><?= $k; ?></td>
                                                    <td><?= tanggal_indo($tanggal_input) ?></td>
                                                    <td><?= tanggal_indo($tanggal_kunjungan); ?></td>
                                                    <td><?= $a->Status; ?></td>
                                                    <td>
                                                        <a href="/Meeting_request/detail/<?= $a->idMeeting; ?>" class="btn btn-info btn-sm w-xs">Detail</a>
                                                        <?php if ($a->Status == 'Belum diproses') : ?>
                                                            <a href="/Meeting_request/edit/<?= $a->idMeeting; ?>" class="btn btn-primary btn-sm w-xs">Ubah</a>
                                                            <a href="/Meeting_request/delete/<?= $a->idMeeting; ?>" class="btn btn-danger btn-sm w-xs">Hapus</a>
                                                        <?php elseif ($a->Status == 'Tidak disetujui') : ?>
                                                            <a href="/Meeting_request/edit/<?= $a->idMeeting; ?>" class="btn btn-primary btn-sm w-xs">Ubah</a>
                                                        <?php elseif ($a->Status == 'Selesai diproses') : ?>
                                                            <a href="/Meeting_request/rating/<?= $a->idMeeting; ?>" class="btn btn-success btn-sm w-xs">Rating</a>
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

                <!-- Last Pengaduan -->
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">4 Pengaduan Online Terakhir</h4>

                                <a href="/Pengaduan_online" class="btn btn-primary btn-md me-3 mb-2">Lihat Semua</a>
                                <a href="/Pengaduan_online/form" class="btn btn-success btn-md mb-2"><i class="fas fa-plus-circle"></i> Tambah</a>

                                <div class="table-responsive mb-0">
                                    <table id="tech-companies-1" class="table">
                                        <thead>
                                            <tr>
                                                <th>Judul</th>
                                                <th>Jenis Layanan</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                                <th style="min-width: 25%;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($lastPengaduan->getResult() as $a) : ?>
                                                <?php //getNamaKategori
                                                $k = '';
                                                $tanggal = date('Y-m-d', strtotime($a->created_at));
                                                foreach ($kategori as $b) {
                                                    if ($a->idKategori == $b['idKategori']) {
                                                        $k = $b['namaKategori'];
                                                    }
                                                }
                                                ?>
                                                <tr>
                                                    <td><?= $a->Judul; ?></td>
                                                    <td><?= $k; ?></td>
                                                    <td><?= tanggal_indo($tanggal) ?></td>
                                                    <td><?= $a->Status; ?></td>
                                                    <td>
                                                        <a href="/Pengaduan_online/detail/<?= $a->idPengaduan; ?>" class="btn btn-info btn-sm w-xs">Detail</a>
                                                        <?php if ($a->Status == 'Belum diproses') : ?>
                                                            <a href="/Pengaduan_online/edit/<?= $a->idPengaduan; ?>" class="btn btn-primary btn-sm w-xs">Ubah</a>
                                                            <a href="/Pengaduan_online/delete/<?= $a->idPengaduan; ?>" class="btn btn-danger btn-sm w-xs">Hapus</a>
                                                        <?php elseif ($a->Status == 'Selesai diproses') : ?>
                                                            <a href="/Pengaduan_online/rating/<?= $a->idPengaduan; ?>" class="btn btn-success btn-sm w-xs">Rating</a>
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

<!-- Required datatable js -->
<script src="<?= base_url('/assets/libs/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<!-- Buttons examples -->
<script src="<?= base_url('/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?= base_url('/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('/assets/libs/jszip/jszip.min.js'); ?>"></script>
<script src="<?= base_url('/assets/libs/datatables.net-buttons/js/buttons.html5.min.js'); ?>"></script>
<script src="<?= base_url('/assets/libs/datatables.net-buttons/js/buttons.print.min.js'); ?>"></script>
<script src="<?= base_url('/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js'); ?>"></script>

<script src="<?= base_url('/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js'); ?>"></script>
<script src="<?= base_url('/assets/libs/datatables.net-select/js/dataTables.select.min.js'); ?>"></script>

<!-- Responsive examples -->
<script src="<?= base_url('/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?= base_url('/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js'); ?>"></script>

<!-- Responsive Table js -->
<script src="<?= base_url('/assets/libs/admin-resources/rwd-table/rwd-table.min.js'); ?>"></script>

<!-- Init js -->
<script src="<?= base_url('/assets/js/pages/table-responsive.init.js'); ?>"></script>

<!-- Datatable init js -->
<script src="<?= base_url('/assets/js/pages/datatables.init.js'); ?>"></script>

<!-- jquery.vectormap map -->
<script src="<?= base_url('/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
<script src="<?= base_url('/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js'); ?>"></script>


<!-- App js -->
<script src="<?= base_url('/assets/js/app.js') ?>"></script>
<script src="<?= base_url('/assets/js/chart.min.js') ?>"></script>

<!-- Chart donut statistik pengaduan -->
<script>
    var pengaduan = document.getElementById('pengaduan');
    var data_pengaduan = [];
    var label_pengaduan = [];

    <?php foreach ($groupPengaduan->getResult() as $key => $value) : ?>
        data_pengaduan.push(<?= $value->Jumlah ?>);
        label_pengaduan.push('<?= $value->Status ?>');
    <?php endforeach ?>

    var data_group_pengaduan = {
        datasets: [{
            data: data_pengaduan,
            backgroundColor: [
                '#ffbb44',
                '#0f9cf3',
                '#6fd088',
                '#0097a7',
                '#f32f53',
            ],
        }],
        labels: label_pengaduan,
    }

    var chart_pengaduan = new Chart(pengaduan, {
        type: 'doughnut',
        data: data_group_pengaduan,
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

<!-- Chart donut statistik meeting -->
<script>
    var meeting = document.getElementById('meeting');
    var data_meeting = [];
    var label_meeting = [];

    <?php foreach ($groupMeeting->getResult() as $key => $value) : ?>
        data_meeting.push(<?= $value->Jumlah ?>);
        label_meeting.push('<?= $value->Status ?>');
    <?php endforeach ?>

    var data_group_meeting = {
        datasets: [{
            data: data_meeting,
            backgroundColor: [
                '#ffbb44',
                '#0f9cf3',
                '#6fd088',
                '#0097a7',
                '#f32f53',
            ],
        }],
        labels: label_meeting,
    }

    var chart_meeting = new Chart(meeting, {
        type: 'doughnut',
        data: data_group_meeting,
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

<!-- Bar Chart pengaduan minggu ini -->
<script>
    // cari cara generate tanggal minggu ini via javascript/php kirim tgl ke sql
    var currentDate = new Date();
    var day = new Date(currentDate.setDate(currentDate.getDate() - currentDate.getDay() + 0)).toUTCString();

    var bar_pengaduan = document.getElementById('bar_pengaduan');
    var data_pengaduan = [];
    var label_pengaduan = [];

    <?php foreach ($pengaduanPerminggu->getResult() as $key) : ?>
        data_pengaduan.push(<?= $key->jumlah ?>);
        <?php $tanggal = date('Y-m-d', strtotime($key->tanggal));
        $tanggal_indo = tanggal_indo($tanggal);
        // $tanggal = formatTanggal($key->tanggal);
        ?>
        label_pengaduan.push('<?= $tanggal_indo ?>');
    <?php endforeach ?>

    const data = {
        labels: label_pengaduan,
        datasets: [{
            label: 'Pengaduan Online',
            backgroundColor: '#0f9cf3',
            borderColor: '#0f9cf3',
            data: data_pengaduan
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 10
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        },
    };

    const barPengaduan = new Chart(bar_pengaduan, config);
</script>

<!-- Bar Chart meeting minggu ini -->
<script>
    // cari cara generate tanggal minggu ini via javascript/php
    var currentDate = new Date();
    var day = new Date(currentDate.setDate(currentDate.getDate() - currentDate.getDay() + 0)).toUTCString();

    var bar_meeting = document.getElementById('bar_meeting');

    var data_meeting = [];
    var label_meeting = [];

    <?php foreach ($meetingPerminggu->getResult() as $key) : ?>
        data_meeting.push(<?= $key->jumlah ?>);
        <?php $tanggal = date('Y-m-d', strtotime($key->tanggal));
        $tanggal_indo = tanggal_indo($tanggal);
        // $tanggal = formatTanggal($key->tanggal);
        ?>
        label_meeting.push('<?= $tanggal_indo ?>');
    <?php endforeach ?>

    const data_bar = {
        labels: label_meeting,
        datasets: [{
            label: 'Janji Temu',
            backgroundColor: '#6fd088',
            borderColor: '#6fd088',
            data: data_meeting,
        }]
    };

    const config_bar = {
        type: 'bar',
        data: data_bar,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 10
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        },
    };

    var barMeeting = new Chart(bar_meeting, config_bar);
</script>

</body>

</html>