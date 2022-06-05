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

        <?= $this->include("partials/menu"); ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="swal" data-swal="<?= session()->get('pesan'); ?>"></div>
            <div class="page-content">

                <div class="row">
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Statistik Pengaduan</h4>
                                <canvas id="pengaduan"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Statistik Meeting</h4>
                                <canvas id="meeting"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Pengajuan yang dibuat minggu ini</h4>
                                <canvas id="grafik_jumlah"></canvas>
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
<!-- apexcharts -->
<script src="/assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- jquery.vectormap map -->
<script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

<script src="assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="<?= base_url('assets/js/app.js') ?>"></script>
<script src="<?= base_url('assets/js/chart.min.js') ?>"></script>

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
                '#0f9cf3',
                '#6fd088',
                '#f32f53'
            ],
        }],
        labels: label_pengaduan,
    }

    var chart_pengaduan = new Chart(pengaduan, {
        type: 'doughnut',
        data: data_group_pengaduan
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
                '#0f9cf3',
                '#6fd088',
                '#f32f53'
            ],
        }],
        labels: label_meeting,
    }

    var chart_meeting = new Chart(meeting, {
        type: 'doughnut',
        data: data_group_meeting
    });
</script>

<!-- Line Chart jumlah tiket minggu ini -->
<script>
    // cari cara generate tanggal minggu ini via javascript/php
    var currentDate = new Date();
    var day = new Date(currentDate.setDate(currentDate.getDate() - currentDate.getDay() + 0)).toUTCString();

    var grafik = document.getElementById('grafik_jumlah');
    var data_pengaduan = [];
    var label_pengaduan = [];
    var data_meeting = [];
    var label_meeting = [];

    <?php
    function formatTanggal($date)
    {
        // ubah string menjadi format tanggal
        return date('d F Y', strtotime($date));
    }
    ?>

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
        }, {
            label: 'Meeting Request',
            backgroundColor: '#6fd088',
            borderColor: '#6fd088',
            data: [0, 0, 1],
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

    var line_chart = new Chart(grafik_jumlah, config);
</script>

</body>

</html>