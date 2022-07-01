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

                <h3 class="card-title">Ubah Prosedur Permohonan Informasi</h3>
                <p class="card-title-desc">Masukkan data-data informasi dengan lengkap.</p>
                <?php
                if (session()->get('pesan')) {
                ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->get('pesan'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php
                }
                ?>

                <form action="/Landing_page/updatePermohonan/<?= $info['idPermohonan']; ?>" class="custom-validation" method="POST" enctype="multipart/form-data">

                  <div class="row mb-2">
                    <textarea id="elm1" name="isi_permohonan"><?= $info['Isi']; ?></textarea>
                  </div>

                  <div class="mb-0 text-end">
                    <div>
                      <input type="button" value="Kembali" class="btn btn-warning waves-effect me-2 mt-2" onclick="history.back(-1)" />
                      <button type="reset" class="btn btn-secondary waves-effect me-2 mt-2">
                        Reset
                      </button>
                      <button type="submit" class="btn btn-primary waves-effect waves-light me-2 mt-2">
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

<script src="/assets/libs/parsleyjs/parsley.min.js"></script>

<script src="/assets/js/pages/form-validation.init.js"></script>

<!--tinymce js-->
<script src="/assets/libs/tinymce/tinymce.min.js"></script>

<!-- init js -->
<script src="/assets/js/pages/form-editor.init.js"></script>
<script src="/assets/js/app.js"></script>

</body>

</html>