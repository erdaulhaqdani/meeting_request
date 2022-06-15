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
                                        <h4 class="mb-2"><?php foreach ($petugas->getResultObject() as $a) : ?>
                                                <?= $a->idPetugas; ?>
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

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Pengajuan yang dibuat minggu ini</h4>
                                <canvas id="bar_pengaduan"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Meeting yang dibuat minggu ini</h4>
                                <canvas id="bar_meeting"></canvas>
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

<!-- Plugins js -->
<!-- <script src="/assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="assets/js/pages/dashboard.init.js"></script> -->

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
                '#ffbb44',
                '#6fd088',
            ],
        }],
        labels: label_agenda,
    }

    var chart_agenda = new Chart(agenda, {
        type: 'doughnut',
        data: data_group_agenda
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
        data: data_group_informasi
    });
</script>

<?php
function formatTanggal($date)
{
    // ubah string menjadi format tanggal
    return date('d F Y', strtotime($date));
}
?>

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
        <?php $tanggal = formatTanggal($key->tanggal); ?>
        label_pengaduan.push('<?= $tanggal ?>');
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
        <?php $tanggal = formatTanggal($key->tanggal); ?>
        label_meeting.push('<?= $tanggal ?>');
    <?php endforeach ?>

    const data_bar = {
        labels: label_meeting,
        datasets: [{
            label: 'Meeting Request',
            backgroundColor: '#6fd088',
            borderColor: '#6fd088',
            data: [7, 0.5, 3],
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