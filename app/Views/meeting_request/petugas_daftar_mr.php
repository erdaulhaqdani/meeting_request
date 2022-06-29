<?= $this->include('partials/main') ?>

<head>
    <?= $this->include("partials/title-meta"); ?>

    <!-- Bootstrap Css -->
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <?= $this->include('partials/head-css') ?>

</head>

<?= $this->include('partials/body') ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('partials/menu_petugas') ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Daftar Janji Temu</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">APTB</a></li>
                                    <li class="breadcrumb-item active">Daftar Janji Temu</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Statistik Proses Janji Temu</h4>
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Belum diproses</h5>
                                                <?php foreach ($belum->getResultObject() as $a) : ?>
                                                    <?= $a->idMeeting; ?>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Sedang diproses</h5>
                                                <?php foreach ($proses->getResultObject() as $a) : ?>
                                                    <?= $a->idMeeting; ?>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Selesai diproses</h5>
                                                <?php foreach ($selesai->getResultObject() as $a) : ?>
                                                    <?= $a->idMeeting; ?>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    if (session('idLevel') != 7) {
                                    ?>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <h5 class="card-title">Eskalasi masuk</h5>
                                                    <?php foreach ($eskalasi->getResultObject() as $a) : ?>
                                                        <?= $a->idMeeting; ?>
                                                    <?php endforeach ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Tabel Daftar Janji Temu</h4>
                                <?php if (session()->getFlashdata('pesan')) : ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= session()->get('pesan'); ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>

                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Customer</th>
                                            <th>Jenis Layanan</th>
                                            <th>Bentuk Layanan</th>
                                            <th>Kantor Tujuan</th>
                                            <th>Tanggal Input</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1;
                                        function formatTgl($date)
                                        {
                                            // ubah string menjadi format tanggal
                                            return date('d-m-Y', strtotime($date));
                                        }
                                        foreach ($meeting->getResult() as $a) : ?>
                                            <?php //getNamaKategori
                                            $k = '';
                                            foreach ($kategori as $b) {
                                                if ($a->idKategori == $b['idKategori']) {
                                                    $k = $b['namaKategori'];
                                                }
                                            }
                                            $username = '';
                                            foreach ($customer as $c) {
                                                if ($a->idCustomer == $c['idCustomer']) {
                                                    $username = $c['Username'];
                                                }
                                            }
                                            $tanggal =  date('Y-m-d', strtotime($a->created_at));

                                            ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $username; ?></td>
                                                <td><?= $k; ?></td>
                                                <td><?= $a->Bentuk_layanan; ?></td>
                                                <td><?= $a->Kantor; ?></td>
                                                <td><?= tanggal_indo($tanggal) ?></td>
                                                <td><?= $a->Status; ?></td>
                                                <td>
                                                    <a href="/petugasMR/detail/<?= $a->idMeeting; ?>" class="btn btn-info btn-sm w-xs">Detail</a>
                                                    <?php if ($a->Status == 'Sedang diproses') : ?>
                                                        <a href="/petugasMR/tanggapan/<?= $a->idMeeting; ?>" class="btn btn-success btn-sm w-xs">Tanggapan</a>
                                                    <?php elseif ($a->Status == 'Belum diproses') : ?>
                                                        <a href="petugasMR/proses/<?= $a->idMeeting; ?>" class="btn btn-success btn-sm w-xs">Proses</a>
                                                    <?php elseif ($a->Status == 'Eskalasi') : ?>
                                                        <a href="petugasMR/proses/<?= $a->idMeeting; ?>" class="btn btn-success btn-sm w-xs">Tanggapan</a>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

                <?= $this->include('partials/footer') ?>
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end page-content -->
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?= $this->include("partials/right-sidebar"); ?>
<?= $this->include("partials/vendor-scripts"); ?>

<!-- Required datatable js -->
<script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="/assets/libs/jszip/jszip.min.js"></script>
<script src="/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<script src="/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

<!-- Responsive examples -->
<script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="/assets/js/pages/datatables.init.js"></script>

<script src="/assets/js/app.js"></script>

</body>

</html>