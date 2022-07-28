<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- 
			=============================================
				Theme Inner Banner
			============================================== 
			-->
<div class="theme-inner-banner section-spacing">
  <div class="overlay">
    <div class="container">
      <h2><?= $berita['Kategori']; ?></h2>
    </div> <!-- /.container -->
  </div> <!-- /.overlay -->
</div> <!-- /.theme-inner-banner -->


<!-- 
			=============================================
				Our Blog
			============================================== 
			-->
<div class="our-blog section-spacing">
  <div class="container">
    <div class="row">
      <div class="col-xl-9 col-lg-8 col-12">
        <div class="post-wrapper blog-details">
          <?php
          function formatTanggal($date)
          {
            // ubah string menjadi format tanggal
            return date('d-m-Y', strtotime($date));
          }
          $date = $berita['created_at'];
          ?>
          <div class="single-blog">
            <a href="/">Beranda</a>&nbsp;>&nbsp;<a href="" style=" pointer-events: none; cursor: default; margin-bottom : 10px;"><?= $berita['Kategori']; ?></a>
            <div class="image-box">
              <img src="/gambar/<?= $berita['Gambar']; ?>" alt="">
              <div class="overlay"><a href="#" class="date"><?= formatTanggal($date); ?></a></div>
            </div> <!-- /.image-box -->
            <div class="post-meta">
              <h5 class="title"><?= $berita['Judul']; ?></h5>
              <p><?= $berita['Isi']; ?></p>

              <?php if ($berita['id_uploads'] != 0) { ?>
                <h4 class="title">Gambar Terkait <?= $berita['Kategori']; ?></h4>
                <div class="popup-gallery">
                  <?php
                  foreach ($GambarLampiran as $rowLampiran) {

                    if ($berita['id_uploads'] == $rowLampiran['id_uploads']) {

                      foreach ($uploads as $rowUploads) {
                        if ($rowUploads['id_uploads'] == $rowLampiran['id_uploads']) {

                          $lampiran = $rowLampiran['File'];
                  ?>

                          <a class="float-start" href="/uploads/<?= $lampiran; ?>">
                            <div class="img-fluid ">
                              <img src="/uploads/<?= $lampiran; ?>" alt="img-1" width="120">
                            </div>
                          </a>
                  <?php
                        }
                      }
                    }
                  }
                  ?>
                </div>
              <?php
              }
              ?>
            </div> <!-- /.post-meta -->
            <div class="share-option clearfix">
              <ul class="tag-meta float-left">
                <li>Penulis : <?= $berita['Penulis']; ?></li>
              </ul>
            </div> <!-- /.share-option -->
          </div> <!-- /.single-blog -->
        </div> <!-- /.post-wrapper -->
        <!-- ==================== Related Post ================= -->
        <div class="inner-box">
          <div class="theme-title-one">
            <h2><?= $berita['Kategori']; ?> Lainnya</h2>
          </div> <!-- /.theme-title-one -->
          <div class="row">
            <div class="related-post-slider">

              <?php
              function formatTanggal2($date)
              {
                // ubah string menjadi format tanggal
                return date('d-m-Y', strtotime($date));
              }

              foreach ($informasi_lain->getResult() as $a) :
                $date = $a->created_at;

                $judul = $a->Judul;
                $textJudul = strlen($judul);
                $num_char = 65;
                if ($textJudul > $num_char) {
                  $cut_judul = substr($judul, 0, $num_char) . '...';
                } else {
                  $cut_judul = $a->Judul;
                }
              ?>

                <div class="item">
                  <div class="single-blog">
                    <div class="image-box" style="max-height: 260px;">
                      <img src="/gambar/<?= $a->Gambar; ?>" alt="">
                      <div class="overlay"><a href="#" class="date"><?= formatTanggal2($date); ?></a></div>
                    </div> <!-- /.image-box -->
                    <div class="post-meta">
                      <h5 class="title"><a href="/pages/detail_info/<?= $a->id_berita ?>/<?= $a->Kategori ?>"><?= $cut_judul; ?></a></h5>
                      <a href="/pages/detail_info/<?= $a->id_berita ?>/<?= $a->Kategori ?>" class="read-more">SELENGKAPNYA</a>
                    </div> <!-- /.post-meta -->
                  </div> <!-- /.single-blog -->
                </div> <!-- /.col- -->
              <?php
              endforeach; ?>

            </div> <!-- /.related-product-slider -->
          </div> <!-- /.row -->
        </div> <!-- /.inner-box -->
      </div>
      <!-- ===================== Blog Sidebar ==================== -->
      <?= $this->include('layout/sidebar') ?>
      <!-- /.col- -->
    </div> <!-- /.row -->
  </div> <!-- /.container -->
</div> <!-- /.blog-details -->

<?= $this->endSection(); ?>