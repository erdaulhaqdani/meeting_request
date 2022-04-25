<?= $this->include('partials/main') ?>

<head>
  <?= $this->include("partials/title-meta"); ?>

  <!-- Bootstrap Css -->
  <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
  <?= $this->include("partials/head-css"); ?>
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

                <h3 class="card-title">Pengajuan Meeting Request</h3>
                <p class="card-title-desc">Masukkan informasi Anda dengan lengkap.</p>
                <?php
                if (session()->get('pesan')) {
                ?>
                  <div class="alert alert-success" role="alert">
                    <?= session()->get('pesan'); ?>
                  </div>
                <?php
                }
                ?>

                <form action="/Meeting_request/input" class="custom-validation" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="idCustomer" value="<?= session('idCustomer'); ?>">

                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Jenis Layanan</label>
                    <div class="col-sm-9">
                      <select name="kategori" class="form-select" aria-label="Default select example" required>
                        <option selected disabled value="">Pilih jenis layanan</option>
                        <?php foreach ($kategori as $a) : ?>
                          <option value="<?= $a['idKategori'] ?>"><?= $a['namaKategori']; ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <!-- end row -->

                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Bentuk Layanan</label>
                    <div class="col-sm-9">
                      <select class="form-select" name="bentuk_layanan" aria-label="Default select example" required>
                        <option selected disabled value="">Pilih bentuk layanan</option>
                        <option value="Luring">Luring</option>
                        <option value="Daring">Daring</option>
                      </select>
                    </div>
                  </div>
                  <!-- end row -->

                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Kantor Tujuan</label>
                    <div class="col-sm-9">
                      <select class="form-select" name="kantor" aria-label="Default select example" required>
                        <option selected disabled value="">Pilih kantor tujuan</option>
                        <option value="KPKNL Bandung">KPKNL Bandung</option>
                        <option value="DJKN Jabar">DJKN Jawa Barat</option>
                      </select>
                    </div>
                  </div>
                  <!-- end row -->

                  <div class="row mb-3">
                    <label for="perihal" class="col-sm-3 col-form-label">Perihal</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" placeholder="Ringkasan keperluan/tujuan layanan" id="perihal" name="perihal" required>
                    </div>
                  </div>
                  <!-- end row -->

                  <div class="row mb-3">
                    <label for="telepon" class="col-sm-3 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="tel" placeholder="Masukkan nomor telepon Anda" id="telepon" name="telepon" required data-parsley-minlength="9" data-parsley-maxlength="15">
                    </div>
                  </div>
                  <!-- end row -->


                  <div class="row mb-3">
                    <label for="tanggal_kunjungan" class="col-sm-3 col-form-label">Tanggal Kunjungan</label>
                    <div class="col-sm-4">
                      <input class="form-control" type="date" id="txtDate" name="tanggal_kunjungan" required min="<?php echo date("Y-m-d"); ?>">
                    </div>
                  </div>
                  <!-- end row -->

                  <div class="row mb-3">
                    <label for="waktu_kunjungan" class="col-sm-3 col-form-label">Waktu Kunjungan</label>

                    <div class="row">
                      <div class="button-items">
                        <?php //getNWaktuKunjungan

                        $jam = ['08:00', '08:15', '08:30', '08:45', '09:00', '09:15', '09:30', '09:45', '10:00',  '10:15', '10:30', '10:45', '11:00', '11:15', '11:30', '11:45', '12:00', '12:15', '12:30', '12:45', '13:00',  '13:15', '13:30', '13:45', '14:00', '14:15', '14:30', '14:45', '15:00', '15:15', '15:30', '15:45'];
                        $j = 0;

                        for ($i = 0; $i < count($jam); $i++) {
                          if ($j < count($meeting)) {
                            if ($meeting[$j]['Waktu_kunjungan'] == $jam[$i]) {
                        ?>
                              <input type="radio" class="btn-check" name="waktu_kunjungan" id="waktu_kunjungan<?= $i; ?>" autocomplete="off" value="<?= $jam[$i]; ?>" disabled>
                              <label class="btn btn-outline-secondary w-md" for="waktu_kunjungan<?= $i; ?>"><?= $jam[$i]; ?></label>

                            <?php
                              $j++;
                            } else {
                            ?>
                              <input type="radio" class="btn-check" name="waktu_kunjungan" id="waktu_kunjungan<?= $i; ?>" autocomplete="off" value="<?= $jam[$i]; ?>">
                              <label class="btn btn-outline-primary w-md" for="waktu_kunjungan<?= $i; ?>"><?= $jam[$i]; ?></label>
                            <?php
                            }
                          } else {
                            ?>
                            <input type="radio" class="btn-check" name="waktu_kunjungan" id="waktu_kunjungan<?= $i; ?>" autocomplete="off" value="<?= $jam[$i]; ?>">
                            <label class="btn btn-outline-primary w-md" for="waktu_kunjungan<?= $i; ?>"><?= $jam[$i]; ?></label>
                        <?php
                          }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="mb-0">
                    <div>
                      <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                        Submit
                      </button>
                      <button type="reset" class="btn btn-secondary waves-effect">
                        Cancel
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- end col -->
    </div>
    <!-- end row -->

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

<script src="/assets/libs/parsleyjs/parsley.min.js"></script>

<script src="/assets/js/pages/form-validation.init.js"></script>

<!-- Plugins js -->
<script src="/assets/libs/dropzone/min/dropzone.min.js"></script>
<script src="/assets/js/app.js"></script>

</body>

</html>