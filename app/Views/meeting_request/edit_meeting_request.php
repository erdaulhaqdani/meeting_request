<?= $this->include('partials/main') ?>

<head>

  <?= $this->include("partials/head-css"); ?>

  <!-- Bootstrap Css -->
  <link href="<?= base_url('/assets/css/bootstrap.min.css'); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="<?= base_url('/assets/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="<?= base_url('/assets/css/app.min.css'); ?>" id="app-style" rel="stylesheet" type="text/css" />

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

                <h3 class="card-title">Ubah Pengajuan Meeting Request</h3>
                <p class="card-title-desc">Masukkan informasi Anda dengan lengkap.</p>

                <form action="/Meeting_request/update/<?= $meeting['idMeeting']; ?>" class="custom-validation" method="POST" enctype="multipart/form-data">

                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Jenis Layanan</label>
                    <div class="col-sm-10">
                      <select name="kategori" class="form-select" aria-label="Default select example">
                        <?php if ($meeting['idKategori'] == 1) {
                        ?>
                          <option selected value="1">Pelayanan Lelang</option>
                          <option value="2">Pengelolaan Kekayaan Negara</option>
                          <option value="3">Pelayanan Penilaian</option>
                          <option value="4">Piutang Negara</option>
                          <option value="5">Umum</option>
                        <?php
                        } elseif ($meeting['idKategori'] == 2) {
                        ?>
                          <option selected value="2">Pengelolaan Kekayaan Negara</option>
                          <option value="1">Pelayanan Lelang</option>
                          <option value="3">Pelayanan Penilaian</option>
                          <option value="4">Piutang Negara</option>
                          <option value="5">Umum</option>
                        <?php
                        } elseif ($meeting['idKategori'] == 3) {
                        ?>
                          <option selected value="3">Pelayanan Penilaian</option>
                          <option value="1">Pelayanan Lelang</option>
                          <option value="2">Pengelolaan Kekayaan Negara</option>
                          <option value="4">Piutang Negara</option>
                          <option value="5">Umum</option>
                        <?php
                        } elseif ($meeting['idKategori'] == 4) {
                        ?>
                          <option selected value="4">Piutang Negara</option>
                          <option value="1">Pelayanan Lelang</option>
                          <option value="2">Pengelolaan Kekayaan Negara</option>
                          <option value="3">Pelayanan Penilaian</option>
                          <option value="5">Umum</option>
                        <?php
                        } elseif ($meeting['idKategori'] == 5) {
                        ?>
                          <option selected value="5">Umum</option>
                          <option value="1">Pelayanan Lelang</option>
                          <option value="2">Pengelolaan Kekayaan Negara</option>
                          <option value="3">Pelayanan Penilaian</option>
                          <option value="4">Piutang Negara</option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <!-- end row -->

                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Bentuk Layanan</label>
                    <div class="col-sm-10">
                      <select class="form-select" name="bentuk_layanan" aria-label="Default select example" required>
                        <?php if ($meeting['Bentuk_layanan'] == 'Luring') {
                        ?>
                          <option selected value="Luring">Luring</option>
                          <option value="Daring">Daring</option>
                        <?php
                        } elseif ($meeting['Bentuk_layanan'] == 'Daring') {
                        ?>
                          <option selected value="Daring">Daring</option>
                          <option value="Luring">Luring</option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <!-- end row -->

                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Kantor Tujuan</label>
                    <div class="col-sm-10">
                      <select class="form-select" name="kantor" aria-label="Default select example" required>
                        <?php if ($meeting['Kantor'] == 'DJKN Jabar') {
                        ?>
                          <option selected value="DJKN Jabar">DJKN Jawa Barat</option>
                          <option value="KPKNL Bandung">KPKNL Bandung</option>
                        <?php
                        } elseif ($meeting['Kantor'] == 'KPKNL Bandung') {
                        ?>
                          <option selected value="KPKNL Bandung">KPKNL Bandung</option>
                          <option value="DJKN Jabar">DJKN Jawa Barat</option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <!-- end row -->

                  <div class="row mb-3">
                    <label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" placeholder="Ringkasan keperluan/tujuan layanan" id="perihal" name="perihal" value="<?= $meeting['Perihal']; ?>" required>
                    </div>
                  </div>
                  <!-- end row -->

                  <!-- <div class="row mb-3">
                    <label for="telepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="tel" placeholder="Masukkan nomor telepon Anda" id="telepon" name="telepon" value="<?= $meeting['Telepon']; ?>" required data-parsley-minlength="9" data-parsley-maxlength="15">
                    </div>
                  </div> -->
                  <!-- end row -->

                  <div class="row mb-3">
                    <label for="tanggal_kunjungan" class="col-sm-2 col-form-label">Tanggal Kunjungan</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="date" id="tanggal_kunjungan" name="tanggal_kunjungan" value="<?= $meeting['Tanggal_kunjungan']; ?>" min="<?php echo date("Y-m-d"); ?>" required>
                    </div>
                  </div>
                  <!-- end row -->

                  <div class="row mb-3">
                    <label for="waktu_kunjungan" class="col-sm-2 col-form-label">Waktu Kunjungan</label>
                  </div>
                  <?php //getNWaktuKunjungan

                  $jam = ['08:00', '08:15', '08:30', '08:45', '09:00', '09:15', '09:30', '09:45', '10:00',  '10:15', '10:30', '10:45', '11:00', '11:15', '11:30', '11:45', '12:00', '12:15', '12:30', '12:45', '13:00',  '13:15', '13:30', '13:45', '14:00', '14:15', '14:30', '14:45', '15:00', '15:15', '15:30', '15:45'];
                  $j = 0;

                  for ($i = 0; $i < count($jam); $i++) {
                  ?>
                    <input type="radio" class="btn-check" name="waktu_kunjungan" id="waktu_kunjungan<?= $i; ?>" autocomplete="off" value="<?= $jam[$i]; ?>">
                    <label class="btn btn-outline-primary w-md" for="waktu_kunjungan<?= $i; ?>"><?= $jam[$i]; ?></label>
                  <?php

                  }
                  ?>

                  <div class="mb-1 text-end">
                    <div>
                      <a href="/Meeting_request"><button type="button" class="btn btn-warning waves-effect" style="margin-left: 5px;">Kembali</button> </a>
                      <button type="reset" class="btn btn-danger waves-effect mx-3">Cancel</button>
                      <button type="submit" class="btn btn-primary waves-effect waves-light me-1">Submit</button>
                    </div>
                  </div>
                </form>
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
<script src="/assets/js/app.js"></script>

<script>
  $("#my_tgl").on("edit", function(e) {
    // alert("ganti");
    var a = $("#my_tgl").val();
    console.log(a);
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "/Meeting_request/getData/" + a,
      success: function(data) {
        console.log(data);
        var jam = ['08:00', '08:15', '08:30', '08:45', '09:00', '09:15', '09:30', '09:45', '10:00', '10:15', '10:30', '10:45', '11:00', '11:15', '11:30', '11:45', '12:00', '12:15', '12:30', '12:45', '13:00', '13:15', '13:30', '13:45', '14:00', '14:15', '14:30', '14:45', '15:00', '15:15', '15:30', '15:45'];
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