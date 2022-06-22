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
      <h2>Artikel</h2>
    </div> <!-- /.container -->
  </div> <!-- /.overlay -->
</div> <!-- /.theme-inner-banner -->

<!-- 
			=============================================
				Our Blog
			============================================== 
			-->
<div class="blog-grid section-spacing">
  <div class="container">
    <a href="/">Beranda</a>&nbsp;>&nbsp;<a href="" style=" pointer-events: none; cursor: default; margin-bottom : 15px;">Daftar Artikel</a>
    <div class="row">
      <div class="col-xl-9 col-lg-8 col-12 our-blog">
        <div class="post-wrapper row">
          <?php

          function formatTanggal($date)
          {
            // ubah string menjadi format tanggal
            return date('d-m-Y', strtotime($date));
          }

          foreach ($berita as $a) :
            $date = $a['created_at'];

            $isi = $a['Isi'];
            $textIsi = strlen($isi);
            $num_text = 48;
            if ($textIsi > $num_text) {
              $cut_text = substr($isi, 0, $num_text) . '...';
            } else {
              $cut_text = $a['Isi'];
            }

            $judul = $a['Judul'];
            $textJudul = strlen($judul);
            $num_char = 70;
            if ($textJudul > $num_char) {
              $cut_judul = substr($judul, 0, $num_char) . '...';
            } else {
              $cut_judul = $a['Judul'];
            }

          ?>
            <div class="col-md-6 col-12">
              <div class="single-blog">
                <div class="image-box" style="max-height:260px;">
                  <img src="/gambar/<?= $a['Gambar']; ?>" alt="">
                  <div class=" overlay"><a href="#" class="date"><?= formatTanggal($date) ?></a></a>
                  </div>
                </div> <!-- /.image-box -->
                <div class="post-meta">
                  <h5 class="title"><a href="/pages/detail_artikel/<?= $a['id_berita'] ?>"><?= $cut_judul ?></a></a></h5>
                  <p><?= $cut_text; ?></p>
                  <a href="/pages/detail_artikel/<?= $a['id_berita'] ?>" class="read-more">SELENGKAPNYA</a>
                </div> <!-- /.post-meta -->
              </div> <!-- /.single-blog -->
            </div> <!-- /.col- -->
          <?php
          endforeach
          ?>
        </div> <!-- /.post-wrapper -->
        <div class="theme-pagination">
          <?php
          echo $pager->only(['berita'])->links();
          ?>
        </div>
      </div>
      <!-- ===================== Blog Sidebar ==================== -->
      <?= $this->include('layout/sidebar') ?>
      <!-- /end-sidebar -->
    </div> <!-- /.row -->
  </div> <!-- /.container -->
</div> <!-- /.blog-inner-page -->


<?= $this->endSection(); ?>