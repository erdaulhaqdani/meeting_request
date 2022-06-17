<?= $this->include('partials/main') ?>

<head>

  <?= $this->include("/partials/title-meta"); ?>

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

                <div class="row">
                  <h3 class="card-title">Detail Pengajuan Meeting Request</h3>
                  <p class="card-title-desc">Berikut adalah identitas dan detail pengajuan Meeting Request dengan id <?= $meeting['idMeeting']; ?> </p>

                  <div class="col-md-6">
                    <div class="row mb-1">
                      <label class="col-sm-6">IDENTITTAS CUSTOMER</label>
                      <hr>
                    </div>
                    <div class="row">
                      <label class="col-sm-4">NIK</label>
                      <label class="col-sm-8">: <?= $customer['NIK']; ?></label>
                    </div>
                    <div class="row">
                      <label class="col-sm-4">Username</label>
                      <label class="col-sm-8"> : <?= $customer['Username']; ?></label>
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
                  <div class="col-md-6">
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
                  <div class="row">
                    <div class="col">
                      <input type="button" value="Kembali" class="btn btn-warning waves-effect me-2" onclick="history.back(-1)" />
                      <?php if ($meeting['Status'] == 'Belum diproses') : ?>
                        <a href="/petugasMR/proses/<?= $meeting['idMeeting']; ?>" class="btn btn-primary waves-effect">Proses</a>
                      <?php elseif ($meeting['Status'] == 'Selesai diproses') : ?>
                      <?php elseif ($meeting['Status'] != 'Belum diproses') : ?>
                        <a href="/petugasMR/tanggapan/<?= $meeting['idMeeting']; ?>" class="btn btn-info waves-effect">Tanggapan</a>

                      <?php endif ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- end col -->
        </div>
        <!-- end row -->

        <?php foreach ($tanggapan as $arrTanggapan) : ?>
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
                    <div class="col-md-5">
                      <div class="row">
                        <label class="col-sm-6">IDENTITAS PETUGAS</label>
                        <hr>
                      </div>
                      <?php //getPetugas
                      $nama = '';
                      $idLevel = '';
                      $mail = '';
                      $levelPetugas = '';
                      foreach ($petugas as $p) {
                        if ($p['idPetugas'] == $arrTanggapan['idPetugas']) {
                          $nama = $p['Nama'];
                          $idLevel = $p['idLevel'];
                          $mail = $p['Email'];
                        }
                      };
                      foreach ($level as $l) {
                        if ($l['idLevel'] == $idLevel) {
                          $levelPetugas = $l['Level'];
                        }
                      };
                      ?>
                      <div class="row">
                        <label class="col-sm-5">Nama Lengkap</label>
                        <label class="col-sm-7">: <?= $nama ?></label>
                      </div>
                      <div class="row">
                        <label class="col-sm-5">Level</label>
                        <label class="col-sm-7">: <?= $levelPetugas; ?></label>
                      </div>
                      <div class="row">
                        <label class="col-sm-5">Email</label>
                        <label class="col-sm-7">: <?= $mail ?></label>
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="row">
                        <label class="col-sm-6">DETAIL TANGGAPAN</label>
                        <hr>
                      </div>
                      <div class="row">
                        <label class="col-sm-5">Tanggal</label>
                        <label class="col-sm-7">: <?= $arrTanggapan['tgl_selesai']; ?></label>
                      </div>
                      <div class="row">
                        <label class="col-sm-5">Uraian Tanggapan</label>
                        <label class="col-sm-7">: <?= $arrTanggapan['Isi']; ?></label>
                      </div>
                      <div class="row">
                        <label class="col-sm-5">Lampiran</label>
                        <?php if ($arrTanggapan['Lampiran'] == 'default.png') : ?>
                          <label class="col-sm-7">: Tidak memiliki lampiran</a></label>
                        <?php else : ?>
                          <label class=" col-sm-7"><a href="/lampiran_petugasMR/<?= $arrTanggapan['Lampiran']; ?>">: Lihat Lampiran</a></label>
                        <?php endif ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

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