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
<?= $this->include("partials/body"); ?>

<div class="container-fluid">
    <!-- Begin page -->
    <div id="layout-wrapper">

        <?= $this->include("partials/menu_petugas"); ?>

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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">APTB</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <!-- Filter row -->
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="d-flex flex-row align-items-center mb-3">
                            <label for="period">Rentang waktu</label>
                            <select class="form-select mx-2" style="max-width: 120px;" name="period" id="period">
                                <option <?= $filterPeriod == 1 ? "selected" : ""; ?> value='1'>1 Bulan</option>
                                <option <?= $filterPeriod == 2 ? "selected" : ""; ?> value='2'>2 Bulan</option>
                                <option <?= $filterPeriod == 3 ? "selected" : ""; ?> value='3'>3 Bulan</option>
                                <option <?= $filterPeriod == 4 ? "selected" : ""; ?> value='4'>4 Bulan</option>
                                <option <?= $filterPeriod == 5 ? "selected" : ""; ?> value='5'>5 Bulan</option>
                                <option <?= $filterPeriod == 6 ? "selected" : ""; ?> value='6'>6 Bulan</option>
                                <option <?= $filterPeriod == 7 ? "selected" : ""; ?> value='7'>7 Bulan</option>
                                <option <?= $filterPeriod == 8 ? "selected" : ""; ?> value='8'>8 Bulan</option>
                                <option <?= $filterPeriod == 9 ? "selected" : ""; ?> value='9'>9 Bulan</option>
                                <option <?= $filterPeriod == 10 ? "selected" : ""; ?> value='10'>10 Bulan</option>
                                <option <?= $filterPeriod == 11 ? "selected" : ""; ?> value='11'>11 Bulan</option>
                                <option <?= $filterPeriod == 12 ? "selected" : ""; ?> value='12'>12 Bulan</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6">
                        <div class="d-flex flex-row align-items-center mb-3">
                            <label for="kategori">Kategori</label>
                            <select class="form-select mx-2" style="max-width: 240px;" name="kategori" id="kategori">
                                <option value="0">Semua Kategori</option>
                                <?php foreach ($kategori as $a) : ?>
                                    <option <?= $filterKategori == $a['idKategori'] ? "selected" : ""; ?> value="<?= $a['idKategori'] ?>"><?= $a['namaKategori']; ?></option>
                                <?php endforeach ?>
                            </select>
                            <button type="submit" class="btn btn-outline-dark" id="filter">Filter</button>
                        </div>
                    </div>
                </div>
                <!-- end filter -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Statistik Pengaduan</h4>
                                <canvas id="pengaduan"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
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
                                        <p class="text-truncate font-size-14 mb-2">Tanda Terima</p>
                                        <h4 class="mb-2"><?php foreach ($jumlah_tandaTerima->getResultObject() as $a) : ?>
                                                <?= $a->id_tt; ?>
                                            <?php endforeach ?></h4>
                                        <p class="text-muted mb-0 font-size-13">Jumlah tanda terima masuk</p>
                                    </div>
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-light text-primary rounded-3">
                                            <i class=" ri-mail-check-line font-size-24"></i>
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
                                        <p class="text-muted mb-0 font-size-13">Dalam rentang waktu di atas</p>
                                    </div>
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-light text-success rounded-3">
                                            <i class="ri-user-3-line font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end cardbody -->
                        </div><!-- end card -->
                    </div>
                </div>
                <div class="row" id="rowStat"></div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Pengaduan yang masuk minggu ini</h4>
                                <canvas id="bar_pengaduan"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Janji Temu yang masuk minggu ini</h4>
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
<script src="/assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- jquery.vectormap map -->
<script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

<script src="assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="<?= base_url('assets/js/app.js') ?>"></script>
<script src="<?= base_url('assets/js/chart.min.js') ?>"></script>

<script>
    $('#filter').click(function() {
        const period = $('#period').val();
        const kategori = $('#kategori').val();
        const url = "/dashboard_petugas/" + period + "/" + kategori;
        location.href = url;
        // alert(url);
    });
</script>

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
                '#f32f53',
                '#0f9cf3',
                '#6fd088',
                '#0097a7'
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
                '#f32f53',
                '#0f9cf3',
                '#6fd088',
                '#0097a7'
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