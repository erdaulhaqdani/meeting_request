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
                  <div class="col-lg-6">
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
                    <br>
                  </div>
                  <div class="col-lg-6">
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
                      // $k = '';
                      // foreach ($kategori as $a) {
                      //   if ($meeting['idKategori'] == $a['idKategori']) {
                      //     $k = $a['namaKategori'];
                      //   }
                      // }
                      ?>
                      <label class="col-sm-4">Jenis Layanan</label>
                      <label class="col-sm-8">: <?= $kategori['namaKategori']; ?></label>
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
                  <div class="row">
                    <div class="col-sm-5">
                      <input type="button" value="Kembali" class="btn btn-warning waves-effect" onclick="history.back(-1)" />
                    </div>
                  </div>

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
                    <div class="row">
                      <label class="col-sm-2">IDENTITAS PETUGAS</label>
                      <hr>
                    </div>
                    <div class="row">
                      <label class="col-sm-2">Nama Lengkap</label>
                      <label class="col-sm-9">: <?= $petugas['Nama'] ?></label>
                    </div>
                    <div class="row">
                      <label class="col-sm-2">Level</label>
                      <label class="col-sm-8">: <?= $level['Level']; ?></label>
                    </div>
                    <div class="row">
                      <label class="col-sm-2">Email</label>
                      <label class="col-sm-8">: <?= $petugas['Email'] ?></label>
                    </div>
                    <div class="row">
                      <label class="col-sm-2">Uraian Tanggapan</label>
                      <label class="col-sm-8">: <?= $tanggapan['Isi']; ?></label>
                    </div>
                    <div class="row">
                      <label class="col-sm-2">Lampiran</label>
                      <?php if ($tanggapan['Lampiran'] == 'default.png') : ?>
                        <label class="col-sm-8"><a href="/lampiran_petugasMR/<?= $tanggapan['Lampiran']; ?>" class="isDisabled">: Tidak memiliki lampiran</a></label>
                      <?php else : ?>
                        <label class=" col-sm-8"><a href="/lampiran_petugasMR/<?= $tanggapan['Lampiran']; ?>">: <?= $tanggapan['Lampiran']; ?></a></label>
                      <?php endif ?>
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