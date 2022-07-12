<?= $this->include('partials/main') ?>

<head>

  <?= $this->include("partials/title-meta"); ?>

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

        <!-- start page title -->
        <div class="row">
          <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Ubah Meeting Request</h4>

              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Meeting Request</a></li>
                  <li class="breadcrumb-item active">Ubah Meeting Request</li>
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

                <h3 class="card-title">Ubah Pengajuan Meeting Request</h3>
                <p class="card-title-desc">Masukkan informasi Anda dengan lengkap.</p>


                <form action="/Meeting_request/update/<?= $meeting['idMeeting']; ?>" class="custom-validation" method="POST" enctype="multipart/form-data">
                  <?php
                  if ($validation->hasError('lampiran')) {
                  ?>
                    <div class="alert alert-danger" role="alert">
                      <?= $validation->getError('lampiran'); ?>
                    </div>
                  <?php
                  }
                  ?>

                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Jenis Layanan</label>
                    <div class="col-sm-9">
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
                    <label class="col-sm-3 col-form-label">Bentuk Layanan</label>
                    <div class="col-sm-9">
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
                    <label class="col-sm-3 col-form-label">Kantor Tujuan</label>
                    <div class="col-sm-9">
                      <select class="form-select" name="kantor" aria-label="Default select example" required>
                        <?php if ($meeting['Kantor'] == 'Kanwil DJKN Jawa Barat') {
                        ?>
                          <option selected value="Kanwil DJKN Jawa Barat">Kanwil DJKN Jawa Barat</option>
                          <option value="KPKNL Bandung">KPKNL Bandung</option>
                        <?php
                        } elseif ($meeting['Kantor'] == 'KPKNL Bandung') {
                        ?>
                          <option selected value="KPKNL Bandung">KPKNL Bandung</option>
                          <option value="Kanwil DJKN Jawa Barat">Kanwil DJKN Jawa Barat</option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <!-- end row -->

                  <div class="row mb-3">
                    <label for="perihal" class="col-sm-3 col-form-label">Perihal</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" placeholder="Ringkasan keperluan/tujuan layanan" id="perihal" name="perihal" value="<?= $meeting['Perihal']; ?>" required minlength="5">
                    </div>
                  </div>
                  <!-- end row -->

                  <input type="hidden" name="file_lama" value="<?= $meeting['File_lampiran']; ?>">

                  <div class="row mb-2">
                    <label for="lampiran" class="col-sm-3 col-form-label">Lampiran (opsional)</label>
                    <div class="col-sm-5">
                      <div class="input-group">
                        <input type="file" name="lampiran" class="form-control" id="lampiran">
                      </div>
                      <p class="mt-2 ml text-secondary">Jenis file lampiran adalah JPG, PNG, PDF atau DOCX max 3MB</p>
                    </div>
                    <div class="col-sm-4">
                      <div class="input-group">
                        <?php if ($meeting['File_lampiran'] != 'default.png') : ?>
                          <a class="image-popup-vertical-fit" href="/lampiran_customerMR/<?= $meeting['File_lampiran']; ?>" onclick="window.open('/lampiran_customerMR/<?= $meeting['File_lampiran']; ?>', 'newtab'); return false;"><input type="button" value="Lihat Lampiran" class="btn btn-primary waves-effect" /></a>
                        <?php else : ?>
                        <?php endif ?>
                      </div>
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="tanggal_kunjungan" class="col-sm-3 col-form-label">Tanggal Kunjungan</label>
                    <div class="col-sm-5">
                      <input id="my_tgl" class="form-control" type="text" name="tanggal_kunjungan" autocomplete="off" placeholder="Tanggal Kunjungan" value="<?= $meeting['Tanggal_kunjungan']; ?>" readonly required>
                    </div>
                  </div>
                  <!-- end row -->

                  <div class="row mb-3">
                    <label for="waktu_kunjungan" class="col-sm-3 col-form-label">Waktu Kunjungan</label>
                  </div>
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

                  <div class="mb-1 text-end">
                    <div>
                      <input type="button" value="Kembali" class="btn btn-warning waves-effect me-2 mt-2" onclick="history.back(-1)" />
                      <button type="reset" class="btn btn-danger waves-effect me-2 mt-2"">Batal</button>
                      <button type=" submit" class="btn btn-primary waves-effect waves-light me-2 mt-2"" >Submit</button>
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

                        <script src=" /assets/libs/parsleyjs/parsley.min.js"></script>

                        <script src="/assets/js/pages/form-validation.init.js"></script>

                        <!-- Plugins js -->
                        <script src="/assets/js/app.js"></script>

                        <script>
                          $(function() {
                            $("#my_tgl").datepicker({
                              minDate: 0,
                              dateFormat: 'dd-mm-yy',
                              beforeShowDay: $.datepicker.noWeekends,
                            });
                          });

                          $("#my_tgl").on("change", function(e) {
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