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
      <h2>Berita</h2>
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

            if ($a['Status'] == 'Publik') {
              $text = $a['Isi'];
              $num_char = 50;
              $cut_text = substr($text, 0, $num_char) . '...';

          ?>
              <div class="col-md-6 col-12">
                <div class="single-blog">
                  <div class="image-box">
                    <img src="/gambar/<?= $a['Gambar']; ?>" alt="">
                    <div class="overlay"><a href="#" class="date"><?= formatTanggal($date) ?></a></a></div>
                  </div> <!-- /.image-box -->
                  <div class="post-meta">
                    <h5 class="title"><a href="/pages/detail_berita/<?= $a['id_berita'] ?>"><?= $a['Judul'] ?></a></a></h5>
                    <p><?= $cut_text ?></p>
                    <a href="/pages/detail_berita/<?= $a['id_berita'] ?>" class="read-more">SELENGKAPNYA</a>
                  </div> <!-- /.post-meta -->
                </div> <!-- /.single-blog -->
              </div> <!-- /.col- -->
          <?php
            }
          endforeach
          ?>
        </div> <!-- /.post-wrapper -->
        <div class="theme-pagination">

        </div>
      </div>
      <!-- ===================== Blog Sidebar ==================== -->
      <?= $this->include('layout/grid_sidebar') ?>
      <!-- /end-sidebar -->
    </div> <!-- /.row -->
  </div> <!-- /.container -->
</div> <!-- /.blog-inner-page -->


<?= $this->endSection(); ?>