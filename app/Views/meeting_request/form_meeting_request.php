<?= $this->include('partials/main') ?>

<head>
  <?= $this->include("partials/title-meta"); ?>
  <!-- Bootstrap Css -->
  <link href="<?= base_url('assets/css/bootstrap.min.css'); ?> " id="bootstrap-style" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="<?= base_url('assets/css/app.min.css'); ?>" id="app-style" rel="stylesheet" type="text/css" />

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

                  <div class="row mb-2">
                    <label for="lampiran" class="col-sm-3 col-form-label">File Lampiran (opsional)</label>
                    <div class="col-sm-9">
                      <div class="input-group">
                        <input type="file" name="lampiran" class="form-control" id="lampiran">
                      </div>
                      <!-- <p class="mt-2 ml text-secondary">File Lampiran bersifat opsional</p> -->
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="tanggal_kunjungan" class="col-sm-3 col-form-label">Tanggal Kunjungan</label>
                    <div class="col-sm-4">
                      <input id="my_tgl" class="form-control" type="date" id="txtDate" name="tanggal_kunjungan" required min="<?php echo date("Y-m-d"); ?>">
                    </div>
                  </div>
                  <!-- end row -->

                  <div class="row mb-3">
                    <label for="waktu_kunjungan" class="col-sm-3 col-form-label">Waktu Kunjungan</label>

                    <div class="row">
                      <div class="button-items">
                        <?php //getNWaktuKunjungan

                        $jam = ['08:00', '08:05', '08:10', '08:15', '08:20', '08:25', '08:30', '08:35', '08:40', '08:45', '08:50', '08:55', '09:00', '09:05', '09:10', '09:15', '09:20', '09:25', '09:30', '09:35', '09:40', '09:45', '09:50', '09:55', '10:00', '10:05', '10:10',  '10:15', '10:20', '10:25', '10:30', '10:35', '10:40', '10:45', '10:50', '10:55', '11:00', '11:05', '11:10',  '11:15', '11:20', '11:25', '11:30', '11:35', '11:40', '11:45', '11:50', '11:55', '12:00', '12:05', '12:10', '12:15', '12:20', '12:25', '12:30', '12:35', '12:40', '12:45', '12:50', '12:55', '13:00', '13:05', '13:10',  '13:15', '13:20', '13:25', '13:30', '13:35', '13:40', '13:45', '13:50', '13:55', '14:00', '14:05', '14:10', '14:15', '14:20', '14:25', '14:30', '14:35', '14:45', '14:45', '14:50', '14:55', '15:00', '15:05', '15:10', '15:15', '15:20', '15:25', '15:30', '15:35', '15:40', '15:45'];
                        $j = 0;

                        for ($i = 0; $i < count($jam); $i++) {
                        ?>
                          <input type="radio" class="btn-check" name="waktu_kunjungan" id="waktu_kunjungan<?= $i; ?>" autocomplete="off" value="<?= $jam[$i]; ?>" required>
                          <label class="btn btn-outline-primary w-sm" for="waktu_kunjungan<?= $i; ?>"><?= $jam[$i]; ?></label>
                        <?php

                        }
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="mb-1 text-end">
                    <div>
                      <button type="reset" class="btn btn-danger waves-effect me-3">Batal</button>
                      <button type="submit" class="btn btn-primary waves-effect waves-light me-1">Submit</button>
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
<script src="<?= base_url('/assets/js/app.js'); ?>"></script>

<script>
  $("#my_tgl").on("input", function(e) {
    // alert("ganti");
    var a = $("#my_tgl").val();
    console.log(a);
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "/Meeting_request/getData/" + a,
      success: function(data) {
        console.log(data);
        var jam = ['08:00', '08:05', '08:10', '08:15', '08:20', '08:25', '08:30', '08:35', '08:40', '08:45', '08:50', '08:55', '09:00', '09:05', '09:10', '09:15', '09:20', '09:25', '09:30', '09:35', '09:40', '09:45', '09:50', '09:55', '10:00', '10:05', '10:10', '10:15', '10:20', '10:25', '10:30', '10:35', '10:40', '10:45', '10:50', '10:55', '11:00', '11:05', '11:10', '11:15', '11:20', '11:25', '11:30', '11:35', '11:40', '11:45', '11:50', '11:55', '12:00', '12:05', '12:10', '12:15', '12:20', '12:25', '12:30', '12:35', '12:40', '12:45', '12:50', '12:55', '13:00', '13:05', '13:10', '13:15', '13:20', '13:25', '13:30', '13:35', '13:40', '13:45', '13:50', '13:55', '14:00', '14:05', '14:10', '14:15', '14:20', '14:25', '14:30', '14:35', '14:45', '14:45', '14:50', '14:55', '15:00', '15:05', '15:10', '15:15', '15:20', '15:25', '15:30', '15:35', '15:40', '15:45'];
        var j = 0

        for (var i = 0; i < jam.length; i++) {
          var a = $("#waktu_kunjungan" + i).val();
          console.log(a);
          if (j < data.length) {
            if (jam[i] == data[j]['jam']) {
              $("#waktu_kunjungan" + i).attr("disabled", true);
              j++;
            } else {
              if ($("#waktu_kunjungan" + i).is(":disabled")) {
                $("#waktu_kunjungan" + i).removeAttr("disabled");
              }
            }
          } else {
            if ($("#waktu_kunjungan" + i).is(":disabled")) {
              $("#waktu_kunjungan" + i).removeAttr("disabled");
            }
          }
        }
      }
    });
  });
</script>

</body>

</html>