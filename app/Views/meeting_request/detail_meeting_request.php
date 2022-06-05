<?= $this->include('partials/main') ?>

<head>

  <?= $this->include("partials/title-meta"); ?>

  <?= $this->include('/partials/head-css') ?>
  <!-- Bootstrap Css -->
  <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

  <!-- App favicon -->
  <link rel="shortcut icon" href="/assets/images/favicon.ico">


</head>

<?= $this->include('partials/body') ?>

<!-- Begin page -->
<div id="layout-wrapper">

  <?= $this->include('partials/menu') ?>

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

                <h3 class="card-title">Detail Pengajuan Meeting Request</h3>
                <p class="card-title-desc">Berikut adalah identitas dan detail pengajuan Meeting Request Anda.</p>
                <div class="row">

                  <div class="col-6">
                    <div class="row mb-1">
                      <label class="col-sm-6">IDENTITTAS CUSTOMER</label>
                      <hr>
                    </div>
                    <div class="row">
                      <label class="col-sm-4">NIK</label>
                      <label class="col-sm-8">: <?= $customer['NIK']; ?></label>
                    </div>
                    <div class="row">
                      <label class="col-sm-4">Nama Lengkap</label>
                      <label class="col-sm-8"> : <?= $customer['Nama']; ?></label>

                    </div>
                    <div class="row">
                      <label class="col-sm-4">Email</label>
                      <label class="col-sm-8">: <?= $customer['Email']; ?></label>

                    </div>
                    <div class="row">
                      <label class="col-sm-4">Nomor Telepon</label>
                      <label class="col-sm-8">: <?= $customer['noHP']; ?></label>

                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row mb-1">
                      <label class="col-sm-6">DETAIL MEETING REQUEST</label>
                      <hr>
                    </div>
                    <div class="row">
                      <label class="col-sm-4">Tanggal Pengajuan</label>
                      <label class="col-sm-8">: <?= $meeting['created_at']; ?></label>
                    </div>
                    <div class="row">
                      <?php //getNamaKategori
                      $k = '';
                      foreach ($kategori as $a) {
                        if ($meeting['idKategori'] == $a['idKategori']) {
                          $k = $a['namaKategori'];
                        }
                      }
                      ?>
                      <label class="col-sm-4">Jenis Layanan</label>
                      <label class="col-sm-8">: <?= $k; ?></label>
                    </div>
                    <div class="row">
                      <label class="col-sm-4">Bentuk Layanan</label>
                      <label class="col-sm-8">: <?= $meeting['Bentuk_layanan']; ?></label>
                    </div>
                    <div class="row">
                      <label class="col-sm-4">Kantor Tujuan</label>
                      <label class="col-sm-8">: <?= $meeting['Kantor']; ?></label>
                    </div>
                    <div class="row">
                      <label class="col-sm-4">Perihal</label>
                      <label class="col-sm-8">: <?= $meeting['Perihal']; ?></label>
                    </div>
                    <div class="row">
                      <label class="col-sm-4">Tanggal Kunjungan</label>
                      <label class="col-sm-8">: <?= $meeting['Tanggal_kunjungan']; ?></label>
                    </div>
                    <div class="row">
                      <label class="col-sm-4">Waktu Kunjungan</label>
                      <label class="col-sm-8">: <?= $meeting['Waktu_kunjungan']; ?></label>
                    </div>
                    <div class="row">
                      <label class="col-sm-4">Status</label>
                      <label class="col-sm-8">: <?= $meeting['Status']; ?></label>
                    </div>

                  </div>
                  <a href="/Meeting_request"><button type="button" class="btn btn-warning waves-effect">Kembali</button> </a>
                </div>

              </div>
            </div>
          </div> <!-- end col -->
        </div>
        <!-- end row -->
        <?php if ($meeting['Status'] == 'Selesai diproses') : ?>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="invoice-title">
                    <div class="mb-4">
                      <h5>Tanggapan</h1>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <?php //getPetugas
                    $Nama = '';
                    $NIP = '';
                    $Email = '';
                    $Isi = '';
                    $Lampiran = '';
                    $Kantor = '';
                    $idPetugas = '';
                    foreach ($tanggapan as $a) {
                      if ($meeting['idMeeting'] == $a['idMeeting']) {
                        $Isi = $a['Isi'];
                        $Lampiran = $a['Lampiran'];
                        $idPetugas = $a['idPetugas'];
                      }
                    }
                    foreach ($petugas as $b) {
                      if ($idPetugas == $b['idPetugas']) {
                        $Nama = $b['Nama'];
                        $NIP = $b['NIP'];
                        $Email = $b['Email'];
                        $Kantor = $b['Kantor'];
                      }
                    }
                    ?>
                    <div class="row">
                      <label class="col-sm-4">Identitas Petugas</label>
                    </div>
                    <div class="row">
                      <label class="col-sm-3">Nama Lengkap</label>
                      <label class="col-sm-9">: <?= $Nama ?></label>
                    </div>
                    <div class="row">
                      <label class="col-sm-3">Level</label>
                      <label class="col-sm-8">: </label>
                    </div>
                    <div class="row">
                      <label class="col-sm-3">Email</label>
                      <label class="col-sm-8">: <?= $Email ?></label>
                    </div>
                    <div class="row">
                      <label class="col-sm-3">Kantor</label>
                      <label class="col-sm-8">: <?= $Kantor ?></label>
                    </div>
                    <div class="row">
                      <label class="col-sm-3">Uraian Tanggapan</label>
                      <label class="col-sm-8">: <?= $Isi; ?></label>
                      <a href="/Lampiran/<?= $Lampiran; ?>">Lampiran</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <?php elseif ($meeting['Status'] == 'Sedang diproses') : ?>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="invoice-title">
                    <div class="mb-3">
                      <h5>Tanggapan</h1>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <?php
                    $tgl = date("d F Y H:i", strtotime($meeting['updated_at'])); ?>
                    <label class="col-sm-4">Sudah mulai diproses sejak <?= $tgl; ?></label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endif ?>


      </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <?= $this->include('partials/footer') ?>

  </div>
  <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?= $this->include('partials/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<!-- Plugins js -->
<script src="/assets/libs/dropzone/min/dropzone.min.js"></script>
<script src="/assets/js/app.js"></script>

</body>

</html>