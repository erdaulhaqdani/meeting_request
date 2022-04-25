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

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">

                <h3 class="card-title">Tambah Petugas</h3>
                <p class="card-title-desc">Masukkan informasi Petugas dengan lengkap.</p>
                <?php
                if (session()->get('pesan')) {
                ?>
                  <div class="alert alert-success" role="alert">
                    <?= session()->get('pesan'); ?>
                  </div>
                <?php
                }
                ?>

                <form action="/Landing_page/input_petugas" class="custom-validation" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="idCustomer" value="<?= session('idPetugas'); ?>">

                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Level Petugas</label>
                    <div class="col-sm-9">
                      <select name="level" class="form-select" aria-label="Default select example" required>
                        <option selected disabled value="">Pilih level petugas</option>
                        <?php foreach ($level as $a) : ?>
                          <option value="<?= $a['idLevel'] ?>"><?= $a['Level']; ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <!-- end row -->

                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Kantor</label>
                    <div class="col-sm-9">
                      <select class="form-select" name="kantor" aria-label="Default select example" required>
                        <option selected disabled value="">Pilih kantor petugas</option>
                        <option value="KPKNL Bandung">KPKNL Bandung</option>
                        <option value="DJKN Jabar">DJKN Jawa Barat</option>
                      </select>
                    </div>
                  </div>
                  <!-- end row -->

                  <div class="row mb-3">
                    <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" placeholder="Masukkan nama lengkap" id="nama" name="nama" required>
                    </div>
                  </div>
                  <!-- end row -->

                  <div class="row mb-3">
                    <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" placeholder="Masukkan NIP petugas" id="nip" name="nip" required data-parsley-minlength="9" data-parsley-maxlength="15">
                    </div>
                  </div>
                  <!-- end row -->

                  <!-- <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="email" placeholder="Masukkan email petugas" id="email" name="email" required>
                    </div>
                  </div> -->
                  <!-- end row -->

                  <!-- <div class="row mb-3">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="password" placeholder="Masukkan password petugas" id="petugas" name="petugas" required>
                    </div>
                  </div> -->
                  <!-- end row -->

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