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

  <?= $this->include('partials/menu_petugas') ?>

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
              <h4 class="mb-sm-0">Tambah Tanda Terima</h4>

              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Tanda Terima</a></li>
                  <li class="breadcrumb-item active">Tambah Tanda Terima</li>
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

                <h3 class="card-title">Form Tanda Terima</h3>
                <p class="card-title-desc">Masukkan informasi Tanda Terima Surat dengan lengkap.</p>
                <?php if (session()->getFlashdata('pesan')) : ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->get('pesan'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php endif; ?>

                <form action="/Petugas_MR/input_tandaTerima" class="custom-validation" method="POST" enctype="multipart/form-data">

                  <div class="row mb-3">
                    <label for="pengirim" class="col-sm-3 col-form-label">Pengirim</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" placeholder="Masukkan nama pengirim surat" id="pengirim" name="pengirim" required>
                    </div>
                  </div>
                  <!-- end row -->

                  <div class="row mb-3">
                    <label for="no_surat" class="col-sm-3 col-form-label">Nomor Surat</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" placeholder="Masukkan Nomor Surat" id="no_surat" name="no_surat" required>
                    </div>
                  </div>
                  <!-- end row -->

                  <div class="row mb-3">
                    <label for="perihal" class="col-sm-3 col-form-label">Perihal</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" placeholder="Masukkan perihal surat" id="perihal" name="perihal" required>
                    </div>
                  </div>
                  <!-- end row -->

                  <div class="row mb-3">
                    <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Surat</label>
                    <div class="col-sm-4">
                      <input class="form-control" type="date" id="tanggal" name="tanggal" required>
                    </div>
                  </div>
                  <!-- end row -->


                  <div class="mb-0 text-end">
                    <div>
                      <input type="button" value="Kembali" class="btn btn-warning waves-effect mt-2 me-2" onclick="history.back(-1)" />
                      <button type="reset" class="btn btn-danger waves-effect mt-2 me-2">
                        Reset
                      </button>
                      <button type="submit" class="btn btn-primary waves-effect waves-light mt-2 me-2"">
                        Submit
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

<script src=" /assets/libs/parsleyjs/parsley.min.js"></script>

                        <script src="/assets/js/pages/form-validation.init.js"></script>

                        <!-- Plugins js -->
                        <script src="/assets/libs/dropzone/min/dropzone.min.js"></script>
                        <script src="/assets/js/app.js"></script>

                        </body>

                        </html>