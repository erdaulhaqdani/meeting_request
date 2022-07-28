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

  <!-- Sweet Alert-->
  <link href="<?= base_url('/assets/libs/sweetalert2/sweetalert2.min.css'); ?>" rel="stylesheet" type="text/css" />

  <?= $this->include("partials/head-css"); ?>


</head>

<?= $this->include("partials/body"); ?>

<!-- Begin page -->
<div id="layout-wrapper">

  <?= $this->include("partials/menu"); ?>

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
              <h4 class="mb-sm-0">Aplikasi Admisi dengan Janji (PASINI)</h4>

              <div class="page-title-right">
                <ul class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Janji Temu</a></li>
                  <li class="breadcrumb-item active">Daftar Janji Temu</li>
                </ul>
              </div>

            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Rekap Status Janji Temu</h4>
                <div class="row">

                  <div class="col-lg-3 col-md-6">
                    <div class="card">
                      <div class="card-body text-center">
                        <h5 class="card-title">Belum diproses</h5>
                        <?php foreach ($belum->getResultObject() as $a) : ?>
                          <?= $a->idMeeting; ?>
                        <?php endforeach ?>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-6">
                    <div class="card">
                      <div class="card-body text-center">
                        <h5 class="card-title">Sedang diproses</h5>
                        <?php foreach ($proses->getResultObject() as $a) : ?>
                          <?= $a->idMeeting; ?>
                        <?php endforeach ?>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-6">
                    <div class="card">
                      <div class="card-body text-center">
                        <h5 class="card-title">Dieskalasi</h5>
                        <?php foreach ($eskalasi->getResultObject() as $a) : ?>
                          <?= $a->idMeeting; ?>
                        <?php endforeach ?>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-6">
                    <div class="card">
                      <div class="card-body text-center">
                        <h5 class="card-title">Selesai diproses</h5>
                        <?php foreach ($selesai->getResultObject() as $a) : ?>
                          <?= $a->idMeeting; ?>
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

                <h4 class="card-title">Tabel Daftar Janji Temu</h4>
                <div class="row">
                  <div class="col-md-6">
                    <p class="card-title-desc">Berikut adalah tabel Daftar Janji Temu Anda. </p>
                  </div>
                  <div class="col-md-6"><a style="float: right ;" href="/Meeting_request/form" class="btn btn-success btn-md"><i class="fas fa-plus-circle"></i> Tambah</a></div>
                </div>
                <?php
                if (session()->get('pesan')) {
                ?>
                  <div class="alert alert-success" role="alert">
                    <?= session()->get('pesan'); ?>
                  </div>
                <?php
                }

                ?>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Jenis Layanan</th>
                      <th>Tanggal Input</th>
                      <th>Tanggal Kunjungan</th>
                      <th>Waktu Kunjungan</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody><?php $no = 1; ?>
                    <?php foreach ($meeting->getResult() as $a) : ?>
                      <?php //getNamaKategori
                      $k = '';
                      $tanggal_input = date('Y-m-d', strtotime($a->created_at));
                      $tanggal = date('Y-m-d', strtotime($a->Tanggal_kunjungan));
                      foreach ($kategori as $b) {
                        if ($a->idKategori == $b['idKategori']) {
                          $k = $b['namaKategori'];
                        }
                      }
                      ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $k; ?></td>
                        <td><?= tanggal_indo($tanggal_input) ?></td>
                        <td><?= tanggal_indo($tanggal); ?></td>
                        <td><?= $a->Waktu_kunjungan; ?> WIB</td>
                        <td><?= $a->Status; ?></td>
                        <td>
                          <a href="/Meeting_request/detail/<?= $a->idMeeting; ?>" class="btn btn-info btn-sm w-xs">Detail</a>
                          <?php if ($a->Status == 'Belum diproses') : ?>
                            <a href="/Meeting_request/edit/<?= $a->idMeeting; ?>" class="btn btn-primary btn-sm w-xs">Ubah</a>
                            <a href="/Meeting_request/delete/<?= $a->idMeeting; ?>" class="btn btn-danger btn-sm w-xs">Hapus</a>
                          <?php elseif ($a->Status == 'Tidak disetujui') : ?>
                            <a href="/Meeting_request/edit/<?= $a->idMeeting; ?>" class="btn btn-primary btn-sm w-xs">Ubah</a>
                          <?php elseif ($a->Status == 'Selesai diproses') : ?>
                            <?php if ($a->Rating < 1) : ?>
                              <a href="/Meeting_request/rating/<?= $a->idMeeting; ?>" class="btn btn-success btn-sm w-xs">Rating</a>
                            <?php endif ?>
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

<!-- Sweet Alerts js -->
<script src="<?= base_url('assets/libs/sweetalert2/sweetalert2.min.js'); ?> "></script>

<!-- Sweet alert init js-->
<script src="<?= base_url('assets/js/pages/sweet-alerts.init.js'); ?> "></script>

<script src="<?= base_url('/assets/js/app.js'); ?>"></script>

</body>

</html>