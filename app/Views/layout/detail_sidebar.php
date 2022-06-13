<div class="col-xl-3 col-lg-4 col-md-6 col-sm-8 col-12 blog-sidebar">
	<div class="sidebar-container sidebar-search">
		<form action="#">
			<input type="text" placeholder="Cari...">
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
		$tgl = date_create($berita['created_at']);
		$diff  = date_diff($tgl, $tgl_now);
		$hari = $diff->d;
		if ($hari >= 0) : ?>
			<ul>
				<li class="clearfix">
					<img src="/gambar/<?= $berita['Gambar']; ?>" alt="" class="float-left">
					<div class="post float-left">
						<a href="blog-details.html"><?= $berita['Judul'] ?> </a>
						<?php if ($hari == 0) {
						?>
							<div class="date"><?= $hari + 1 ?> hari yang lalu</div>
						<?php } elseif ($hari == 1) {
						?>
							<div class="date">Diunggah <?= $hari + 1 ?> hari yang lalu</div>
						<?php
						}
						?>

					</div>
				</li>
			</ul>
		<?php endif ?>
	</div>  -->
	<!-- /.sidebar-recent-post -->
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