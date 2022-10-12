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

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Daftar Customer</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin Landing Page</a></li>
                                    <li class="breadcrumb-item active">Daftar Customer</li>
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

                                <h4 class="card-title">Tabel <?= $title; ?></h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="card-title-desc">Berikut adalah tabel Daftar Akun Customer</p>
                                    </div>
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
                                            <th>Username</th>
                                            <th>Nama Lengkap</th>
                                            <th>Status Akun</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($customer as $a) :

                                            $nama = $a['Nama'];
                                            $textNama = strlen($nama);
                                            $num_char = 40;
                                            if ($textNama > $num_char) {
                                                $cut_nama = substr($nama, 0, $num_char) . '...';
                                            } else {
                                                $cut_nama = $a['Nama'];
                                            }
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $a['Username']; ?></td>
                                                <td><?= $cut_nama ?></td>
                                                <td><?= $a['StatusAkun']; ?></td>
                                                <td>
                                                    <a href="/detail_customer/<?= $a['idCustomer']; ?>" class="btn btn-info btn-sm w-xs">Detail</a>
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