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
      <h2>Agenda</h2>
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

            <a href="/">Home</a>&nbsp;>&nbsp;<a href="/pages/Agenda_grid">Daftar Agenda</a>&nbsp;>&nbsp;<a href="" style=" pointer-events: none; cursor: default; margin-bottom : 10px;">Agenda</a>
            <div class="image-box">
              <img src="/gambar/<?= $berita['Gambar']; ?>" alt="">
              <div class="overlay"><a href="#" class="date"><?= formatTanggal($date); ?></a></div>
            </div> <!-- /.image-box -->
            <div class="post-meta">
              <h5 class="title"><?= $berita['Judul']; ?></h5>
              <p><?= $berita['Isi']; ?></p>
            </div> <!-- /.post-meta -->
            <div class="share-option clearfix">
              <ul class="social-icon float-right">
                <li>Share : </li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
              </ul>
              <ul class="tag-meta float-left">
                <li>Author : <?= $berita['Penulis']; ?></li>
              </ul>
            </div> <!-- /.share-option -->
          </div> <!-- /.single-blog -->
        </div> <!-- /.post-wrapper -->
        <!-- ==================== Related Post ================= -->
        <div class="inner-box">
          <div class="theme-title-one">
            <h2>Artikel Lainnya</h2>
          </div> <!-- /.theme-title-one -->
          <div class="row">
            <div class="related-post-slider">

              <?php
              function formatTanggal2($date)
              {
                // ubah string menjadi format tanggal
                return date('d-m-Y', strtotime($date));
              }

              foreach ($artikel->getResult() as $a) :
                $date = $a->created_at;

                if ($a->Status == 'Publik') :
              ?>

                  <div class="item">
                    <div class="single-blog">
                      <div class="image-box" style="max-height: 260px;">
                        <img src="/gambar/<?= $a->Gambar; ?>" alt="">
                        <div class="overlay"><a href="#" class="date"><?= formatTanggal2($date); ?></a></div>
                      </div> <!-- /.image-box -->
                      <div class="post-meta">
                        <h5 class="title"><a href="#"><?= $a->Judul; ?></a></h5>
                        <a href="/pages/detail_artikel/<?= $a->id_berita ?>" class="read-more">SELENGKAPNYA</a>
                      </div> <!-- /.post-meta -->
                    </div> <!-- /.single-blog -->
                  </div> <!-- /.col- -->
              <?php
                endif;
              endforeach ?>

            </div> <!-- /.related-product-slider -->
          </div> <!-- /.row -->
        </div> <!-- /.inner-box -->
      </div>
      <!-- ===================== Blog Sidebar ==================== -->
      <?= $this->include('layout/detail_sidebar') ?>
    </div> <!-- /.row -->
  </div> <!-- /.container -->
</div> <!-- /.blog-details -->

<?= $this->endSection(); ?>