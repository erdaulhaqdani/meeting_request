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

  <?= $this->include('partials/menu_admin_landing') ?>

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
              <h4 class="mb-sm-0">Tambah Informasi</h4>

              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Kelola Informasi</a></li>
                  <li class="breadcrumb-item active">Tambah Informasi</li>
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

                <h3 class="card-title">Form Tambah Informasi</h3>
                <p class="card-title-desc">Masukkan data-data informasi dengan lengkap.</p>

                <form action="/Landing_page/input" class="custom-validation" method="POST" enctype="multipart/form-data">
                  <?php
                  if ($validation->hasError('gambar')) {
                  ?>
                    <div class="alert alert-danger" role="alert">
                      <?= $validation->getError('gambar'); ?>
                    </div>
                  <?php
                  } elseif ($validation->hasError('gambar_lampiran[]')) {
                  ?>
                    <div class="alert alert-danger" role="alert">
                      <?= $validation->getError('gambar_lampiran[]'); ?>
                    </div>
                  <?php
                  }
                  ?>
                  <input type="hidden" name="idPetugas" value="<?= session('idPetugas'); ?>">

                  <div class="row mb-2">
                    <label class="col-sm-3 col-form-label">Kategori Informasi</label>
                    <div class="col-sm-9">
                      <select class="form-select" name="kategori_informasi" aria-label="Default select example" required>
                        <option selected disabled value="">Pilih kategori informasi</option>
                        <option value="Berita">Berita</option>
                        <option value="Pengumuman">Pengumuman</option>
                        <option value="Artikel">Artikel</option>
                        <option value="Kilas Peristiwa">Kilas Peristiwa</option>
                      </select>
                    </div>
                  </div>

                  <div class="row mb-2">
                    <label for="judul" class="col-sm-3 col-form-label">Judul Informasi</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" placeholder="Masukkan judul informasi" id="judul" name="judul" required minlength="5">
                    </div>
                  </div>

                  <div class="row mb-2">
                    <label for="penulis" class="col-sm-3 col-form-label">Penulis</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" placeholder="Masukkan nama penulis" id="penulis" name="penulis" required minlength="5">
                    </div>
                  </div>

                  <div class="row mb-2">
                    <label for="gambar" class="col-sm-3 col-form-label">Gambar Cover</label>
                    <div class="col-sm-9">
                      <div class="input-group">
                        <input type="file" name="gambar" class="form-control <?= ($validation->hasError('gambar')) ?>" id="gambar" required>
                      </div>
                      <p class="mt-2 ml text-secondary">Gambar menggunakan format jpg atau png max 3MB</p>
                    </div>
                  </div>

                  <div class="row mb-2">
                    <label for="gambar_lampiran" class="col-sm-3 col-form-label">Gambar Lampiran (opsional)</label>
                    <div class="col-sm-9">
                      <div class="input-group">
                        <input type="file" name="gambar_lampiran[]" class="form-control <?= ($validation->hasError('gambar_lampiran[]')) ?>" id="gambar_lampiran" multiple='true'>
                      </div>
                      <p class="mt-2 ml text-secondary">Gambar menggunakan format jpg atau png max 3MB</p>
                    </div>
                  </div>

                  <div class="row mb-2">
                    <textarea id="elm1" name="isi_berita"></textarea>
                  </div>

                  <div class="mb-0 text-end">
                    <div>
                      <input type="button" value="Kembali" class="btn btn-warning waves-effect me-2" onclick="history.back(-1)" />
                      <button type="reset" class="btn btn-danger waves-effect me-2">Reset</button>
                      <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
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

<!--tinymce js-->
<script src="/assets/libs/tinymce/tinymce.min.js"></script>

<!-- init js -->
<script src="/assets/js/pages/form-editor.init.js"></script>
<script src="/assets/js/app.js"></script>

</body>

</html>