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
<div class="blog-grid section-spacing">
  <div class="container">
    <a href="/">Beranda</a>&nbsp;>&nbsp;<a href="" style=" pointer-events: none; cursor: default; margin-bottom : 15px;">Daftar Agenda</a>
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

            $text = $a['Isi'];
            $num_char = 50;
            $cut_text = substr($text, 0, $num_char) . '...';


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
                <div class="image-box" style="width: 370px; height:260px;">
                  <img src="/gambar/<?= $a['Gambar']; ?>" alt="">
                  <div class=" overlay"><a href="#" class="date"><?= formatTanggal($date) ?></a></a>
                  </div>
                </div> <!-- /.image-box -->
                <div class="post-meta">
                  <h5 class="title"><a href="/pages/detail_agenda/<?= $a['id_berita'] ?>"><?= $cut_judul ?></a></a></h5>
                  <p><?= $cut_text; ?></p>
                  <a href="/pages/detail_agenda/<?= $a['id_berita'] ?>" class="read-more">SELENGKAPNYA</a>
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
      <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8 col-12 blog-sidebar">
        <div class="sidebar-container sidebar-search">
          <form action="/Landing_page/artikel_grid" method="post">
            <input type="text" placeholder="Cari..." name="pencarian">
            <button><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
        </div> <!-- /.sidebar-search -->
        <div class="sidebar-container sidebar-categories">
          <h5 class="title">Kategori</h5>
          <ul>
            <li><a href="/pages/berita_grid">Berita</a></li>
            <li><a href="/pages/pengumuman_grid">Pengumuman</a></li>
            <li><a href="/pages/artikel_grid">Artikel</a></li>
            <li><a href="/pages/peristiwa_grid">Kilas Peristiwa</a></li>
            <li><a href="/pages/agenda_grid">Agenda</a></li>
          </ul>
        </div> <!-- /.sidebar-categories -->

        <!-- <div class="sidebar-container sidebar-recent-post">
		<h5 class="title">Tulisan Terbaru</h5>
		<?php
    $tgl_now     = date_create('now');
    foreach ($berita as $b) :
      $tgl = date_create($b['created_at']);
      $diff  = date_diff($tgl, $tgl_now);
      $hari = $diff->d;
      if ($hari >= 0 && $b['Status'] == 'Publik') {
    ?>
				<ul>
					<li class="clearfix">
						<img src="/cover_Agenda/<?= $b['Gambar']; ?>" alt="" class="float-left">
						<div class="post float-left">
							<a href=""><?= $b['Judul'] ?> </a>
							<?php if ($hari == 0) {
              ?>
								<div class="date">Diunggah <?= $hari + 1 ?> hari yang lalu</div>
							<?php } elseif ($hari == 1) {
              ?>
								<div class="date">Diunggah <?= $hari + 1 ?> hari yang lalu</div>
							<?php
              }
              ?>

						</div>
					</li>
				</ul>
		<?php
      }

    endforeach ?>
	</div> /.sidebar-recent-post -->
        <!-- <div class="sidebar-container sidebar-archives">
          <h5 class="title">Arsip</h5>
          <ul>
            <li><a href="#">January 2022</a></li>
            <li><a href="#">February 2022</a></li>
            <li><a href="#">March 2022</a></li>
          </ul>
        </div> /.sidebar-archives -->
        <!-- <div class="sidebar-tags">
          <h5 class="title">tags</h5>
          <ul class="clearfix">
            <li><a href="#">Business</a></li>
            <li><a href="#">Consulting</a></li>
            <li><a href="#">Sales</a></li>
            <li><a href="#">Startup</a></li>
            <li class="active"><a href="#">Marketing</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Financial</a></li>
            <li><a href="#">Research</a></li>
          </ul>
        </div> /.sidebar-tags -->
      </div> <!-- /.col- -->
      <!-- /end-sidebar -->
    </div> <!-- /.row -->
  </div> <!-- /.container -->
</div> <!-- /.blog-inner-page -->


<?= $this->endSection(); ?>