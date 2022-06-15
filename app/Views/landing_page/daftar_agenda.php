<?= $this->include('partials/main') ?>

<head>
    <?= $this->include("partials/title-meta"); ?>

    <!-- Bootstrap Css -->
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <?= $this->include("partials/head-css"); ?>

</head>

<?= $this->include("partials/body"); ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include("partials/menu_admin_landing"); ?>

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

                                <h4 class="card-title"><?= $title; ?></h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="card-title-desc">Berikut adalah tabel Daftar Agenda.</p>
                                    </div>
                                    <div class="col-md-6"><a style="float: right ;" href="/Landing_page/form_agenda" class="btn btn-success btn-md"><i class="fas fa-plus-circle"></i> Tambah</a></div>
                                </div>
                                <?php if (session()->get('pesan')) : ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= session()->get('pesan'); ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Judul</th>
                                            <th>Penulis</th>
                                            <th>Tanggal Kegiatan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1;
                                        function formatTanggal($date)
                                        {
                                            // ubah string menjadi format tanggal
                                            return date('d-m-Y', strtotime($date));
                                        }

                                        ?>
                                        <?php foreach ($agenda as $a) :
                                            $date = $a['created_at'];

                                            $judul = $a['Judul'];
                                            $textJudul = strlen($judul);
                                            $num_char = 40;
                                            if ($textJudul > $num_char) {
                                                $cut_judul = substr($judul, 0, $num_char) . '...';
                                            } else {
                                                $cut_judul = $a['Judul'];
                                            }

                                            $penulis = $a['Penulis'];
                                            $textPenulis = strlen($penulis);
                                            $maks = 15;
                                            if ($textPenulis > $maks) {
                                                $cut_penulis = substr($penulis, 0, $maks) . '...';
                                            } else {
                                                $cut_penulis = $a['Penulis'];
                                            }
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $cut_judul ?></td>
                                                <td><?= $cut_penulis ?></td>
                                                <td><?= formatTanggal($date); ?></td>
                                                <td><?= $a['Status']; ?></td>
                                                <td>
                                                    <a href="/Landing_page/edit_agenda/<?= $a['id_berita']; ?>" class="btn btn-primary btn-sm w-xs">Ubah</a>
                                                    <?php if ($a['Status'] == 'Diarsipkan') : ?>
                                                        <a href="/Landing_page/publik_agenda/<?= $a['id_berita']; ?>" class="btn btn-success btn-sm w-xs">Publish</a>
                                                    <?php elseif ($a['Status'] == 'Publik') : ?>
                                                        <a href="/Landing_page/arsip_agenda/<?= $a['id_berita']; ?>" class="btn btn-warning btn-sm w-xs">Arsip</a>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?= $this->include("partials/footer"); ?>

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