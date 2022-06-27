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
              <h4 class="mb-sm-0">Ubah Agenda</h4>

              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Kelola Agenda</a></li>
                  <li class="breadcrumb-item active">Ubah Agenda</li>
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

                <h3 class="card-title">Form Ubah Agenda</h3>
                <p class="card-title-desc">Masukkan data-data agenda dengan lengkap.</p>
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

                <form action="/Landing_page/update_agenda/<?= $agenda['id_berita']; ?>" class="custom-validation" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="idPetugas" value="<?= session('idPetugas'); ?>">
                  <input type="hidden" name="gambar_lama" value="<?= $agenda['Gambar']; ?>">
                  <input type="hidden" name="lampiran_lama" value="<?= $agenda['id_uploads']; ?>">
                  <input type="hidden" name="status" value="<?= $agenda['Status']; ?>">

                  <div class="row mb-2">
                    <label for="judul" class="col-sm-3 col-form-label">Judul Agenda</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" placeholder="Masukkan judul agenda" value="<?= $agenda['Judul']; ?>" name="judul" required>
                    </div>
                  </div>

                  <div class="row mb-2">
                    <label for="judul" class="col-sm-3 col-form-label">Tanggal Kegiatan</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="date" id="txtDate" name="tgl" value="<?= $agenda['tgl_kegiatan']; ?>" required>
                    </div>
                  </div>

                  <div class="row mb-2">
                    <label for="penulis" class="col-sm-3 col-form-label">Penulis</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" placeholder="Masukkan nama penulis" value="<?= $agenda['Penulis']; ?>" name="penulis" required>
                    </div>
                  </div>

                  <div class="row mb-2">
                    <label for="gambar" class="col-sm-3 col-form-label">Gambar Cover</label>
                    <div class="col-sm-5">
                      <div class="input-group">
                        <input type="file" name="gambar" class="form-control" id="gambar">
                      </div>
                      <p class="mt-2 ml text-secondary">Gambar menggunakan format jpg atau png max 3MB</p>
                    </div>
                    <div class="col-sm-4">
                      <div class="input-group">
                        <a class="image-popup-vertical-fit" href="/gambar_agenda/<?= $agenda['Gambar']; ?>"><input type="button" value="Lihat Gambar" class="btn btn-primary waves-effect ms-1" /></a>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-2">
                    <label for="gambar_lampiran" class="col-sm-3 col-form-label">Gambar Lampiran (opsional)</label>
                    <div class="col-sm-5">
                      <div class="input-group">
                        <input type="file" name="gambar_lampiran[]" class="form-control" id="gambar_lampiran" multiple='true'>
                      </div>
                      <p class="mt-2 ml text-secondary">Gambar menggunakan format jpg atau png max 3MB</p>
                    </div>
                    <div class="col-sm-4">
                      <div class="popup-gallery">
                        <?php if ($agenda['id_uploads'] != 0) :
                          foreach ($GambarLampiran as $rowLampiran) {

                            if ($agenda['id_uploads'] == $rowLampiran['id_uploads']) {

                              foreach ($uploads as $rowUploads) {
                                if ($rowUploads['id_uploads'] == $rowLampiran['id_uploads']) {

                                  $lampiran = $rowLampiran['File'];

                        ?>
                                  <a class="float-start" href="/uploads/<?= $lampiran; ?>">
                                    <input type="button" value="Lihat Gambar" class="btn btn-primary waves-effect me-1 ms-1 mb-2" />
                                  </a>

                          <?php
                                }
                              }
                            }
                          }
                          ?>
                          <!-- <a href="/Landing_page/hapus_gambar/<?= $agenda['id_uploads']  ?>" class="btn btn-danger waves-effect me-1 ms-1 mb-2">Hapus</a> -->
                        <?php else : ?>
                        <?php endif ?>
                      </div>

                    </div>

                  </div>

                  <div class="row mb-2">
                    <textarea id="elm1" name="isi_agenda"><?= $agenda['Isi']; ?></textarea>
                  </div>

                  <?php
                  if ($validation->hasError('gambar')) {
                  ?>
                    <div class="alert alert-danger" role="alert">
                      <?= $validation->getError('gambar'); ?><br>
                    </div>
                  <?php
                  }
                  ?>
                  <div class="mb-0 text-end">
                    <div>
                      <input type="button" value="Kembali" class="btn btn-warning waves-effect" onclick="history.back(-1)" />
                      <button type="reset" class="btn btn-secondary waves-effect me-2 ms-2">Batal</button>
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

<!-- Magnific Popup-->
<script src="/assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- lightbox init js-->
<script src="/assets/js/pages/lightbox.init.js"></script>

<!-- init js -->
<script src="/assets/js/pages/form-editor.init.js"></script>
<script src="/assets/js/app.js"></script>

</body>

</html>