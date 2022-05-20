<?= $this->include('partials/main') ?>

<head>

    <?= $this->include('partials/title-meta') ?>

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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Statistik</h4>
                                <div class="row">

                                    <div class="col-4">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Belum diproses</h5>
                                                <?php foreach ($belum->getResultObject() as $a) : ?>
                                                    <?= $a->idPengaduan; ?>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Sedang diproses</h5>
                                                <?php foreach ($proses->getResultObject() as $a) : ?>
                                                    <?= $a->idPengaduan; ?>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Selesai diproses</h5>
                                                <?php foreach ($selesai->getResultObject() as $a) : ?>
                                                    <?= $a->idPengaduan; ?>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title"><?= $title; ?></h4>
                                <?php if (session()->getFlashdata('pesan')) : ?>
                                    <div class="alert alert-success" role="alert"><?= session()->getFlashdata('pesan'); ?></div>
                                <?php endif; ?>

                                <table id="datatable" class="table table-bordered dt-responsive nowrap  " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($pengaduan->getResult() as $a) : ?>
                                            <?php //getNamaKategori
                                            $k = '';
                                            foreach ($kategori as $b) {
                                                if ($a->idKategori == $b['idKategori']) {
                                                    $k = $b['namaKategori'];
                                                }
                                            }
                                            ?>
                                            <tr>
                                                <?php $tgl = date("d F Y", strtotime($a->updated_at)); ?>
                                                <td><?= $a->Judul; ?></td>
                                                <td><?= $k; ?></td>
                                                <td><?= $tgl; ?></td>
                                                <td><?= $a->Status; ?></td>
                                                <td>
                                                    <a href="/admin/detail/<?= $a->idPengaduan; ?>" class="btn btn-primary btn-sm w-xs">Detail</a>
                                                    <?php if ($a->Status == 'Sedang diproses') : ?>
                                                        <a href="/admin/tanggapan/<?= $a->idPengaduan; ?>" class="btn btn-info btn-sm w-xs">Tanggapan</a>
                                                    <?php elseif ($a->Status == 'Belum diproses') : ?>
                                                        <a href="/admin/proses/<?= $a->idPengaduan; ?>" class="btn btn-primary btn-sm w-xs">Proses</a>
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
<script src="/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="/assets/libs/pdfmake/build/vfs_fonts.js"></script>
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