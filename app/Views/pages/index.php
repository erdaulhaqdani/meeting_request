<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- 
=============================================
Theme Main Banner
============================================== 
-->
<div id="theme-main-banner" class="banner-one">

	<?php
	foreach ($jumbotron->getResult() as $j) :
		$tanggal = $j->created_at;

	?>
		<div data-src="/gambar/<?= $j->Gambar; ?>">
			<div class="camera_caption">
				<div class="container">
					<h3 class="wow fadeInUp animated"><?= $j->Kategori; ?></h3>
					<h1 class="wow fadeInUp animated" data-wow-delay="0.1s"><?= $j->Judul; ?></h1>
					<a href="/pages/detail_berita/<?= $j->id_berita ?>" class="theme-button-one wow fadeInUp animated" data-wow-delay="0.2s">Selengkapnya</a>
				</div> <!-- /.container -->
			</div> <!-- /.camera_caption -->
		</div>

	<?php
	endforeach;
	?>

</div> <!-- /#theme-main-banner -->


<!-- 
=============================================
CallOut Banner 
============================================== 
-->
<div class="callout-banner section-spacing">
	<div class="container clearfix">
		<h3 class="title">Area Pelayanan Terpadu Bersama</h3>
		<p>Area Pelayanan Terpadu Bersama (APTB) adalah... tale of a fateful trip that started from this tropic port aboard this tiny ship today still wanted by the government they survive as soldiers of fortune to ever wondered the east side </p>
		<a href="/register_cust" class="theme-button-one">Registrasi</a>
	</div>
</div> <!-- /.callout-banner -->

<!-- 
=============================================
Berita Terbaru
============================================== 
-->
<div class="service-style-one section-spacing">
	<div class="container">
		<div class="theme-title-one">
			<h2>Berita Terbaru</h2>
			<p>Berikut berita-berita terbaru tentang KPKNL Bandung </p>
		</div> <!-- /.theme-title-one -->
		<div class="wrapper">
			<div class="row">
				<?php
				function tanggal_indonesia($tanggal)
				{

					$bulan = array(
						1 =>   	'Januari',
						'Februari',
						'Maret',
						'April',
						'Mei',
						'Juni',
						'Juli',
						'Agustus',
						'September',
						'Oktober',
						'November',
						'Desember'
					);

					$var = explode('-', $tanggal);

					return $var[2] . ' ' . $bulan[(int)$var[1]] . ' ' . $var[0];
					// var 0 = tanggal
					// var 1 = bulan
					// var 2 = tahun
				}

				foreach ($berita_terbaru->getResult() as $a) :
					$tanggal = $a->created_at;

				?>
					<div class="col-xl-4 col-md-6 col-12">
						<div class="single-service">
							<div class="img-box"><img src="/gambar/<?= $a->Gambar; ?>" alt=""></div>
							<div class="text">
								<h5><a href="/pages/detail_berita/<?= $a->id_berita ?>"><?= $a->Judul; ?></a></h5>
								<p> <?= tanggal_indonesia($tanggal); ?></p>
								<a href="/pages/detail_berita/<?= $a->id_berita ?>" class="read-more">SELENGKAPNYA <i class="fa fa-angle-right" aria-hidden="true"></i></a>
							</div> <!-- /.text -->
						</div> <!-- /.single-service -->
					</div> <!-- /.col- -->

				<?php
				endforeach ?>

			</div> <!-- /.row -->
		</div> <!-- /.wrapper -->
		<center><a href="/pages/berita_grid" class="theme-button-one mt-5">LIHAT SEMUA</a></center>
	</div> <!-- /.container -->
</div> <!-- /.service-style-one -->

<!-- 
=============================================
Artikel Terbaru
============================================== 
-->
<div class="service-style-one section-spacing">
	<div class="container">
		<div class="theme-title-one">
			<h2>Artikel Terbaru</h2>
			<p>Berikut artikel-artikel terbaru tentang KPKNL Bandung </p>
		</div> <!-- /.theme-title-one -->
		<div class="wrapper">
			<div class="row">
				<?php

				foreach ($artikel_terbaru->getResult() as $b) :
					$tanggal = $b->created_at;

				?>
					<div class="col-xl-4 col-md-6 col-12">
						<div class="single-service">
							<div class="img-box"><img src="/gambar/<?= $b->Gambar; ?>" alt=""></div>
							<div class="text">
								<h5><a href="/pages/detail_berita/<?= $b->id_berita ?>"><?= $b->Judul; ?></a></h5>
								<p><?= tanggal_indonesia($tanggal); ?></p>
								<a href="/pages/detail_berita/<?= $b->id_berita ?>" class="read-more">SELENGKAPNYA <i class="fa fa-angle-right" aria-hidden="true"></i></a>
							</div> <!-- /.text -->
						</div> <!-- /.single-service -->
					</div> <!-- /.col- -->

				<?php
				endforeach ?>

			</div> <!-- /.row -->
		</div> <!-- /.wrapper -->
		<center><a href="/pages/berita_grid" class="theme-button-one mt-5">LIHAT SEMUA</a></center>
	</div> <!-- /.container -->
</div> <!-- /.service-style-one -->




<!-- 
=============================================
About Company
============================================== 
-->
<div class="about-compnay section-spacing">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-12"><img src="images/gedung GKNK.jpeg" alt=""></div>
			<div class="col-lg-6 col-12">
				<div class="text">
					<div class="theme-title-one">
						<h2>Profil KPKNL Bandung</h2>
						<p>Kantor Pelayanan Kekayaan Negara dan Lelang (KPKNL) Bandung merupakan unit vertikal Direktorat Jenderal Kekayaan Negara (DJKN) di bawah Kantor Wilayah (Kanwil) DJKN Jawa Barat.</p>
						<br>
						<a href="/pages/profil" class="theme-button-one">Selengkapnya</a>
					</div> <!-- /.theme-title-one -->
					<ul class="mission-goal clearfix">
						<li>
							<i class="icon flaticon-star"></i>
							<h4>Visi</h4>
						</li>
						<li>
							<i class="icon flaticon-target"></i>
							<h4>Tugas</h4>
						</li>
						<li>
							<i class="icon flaticon-medal"></i>
							<h4>Prestasi</h4>
						</li>
					</ul> <!-- /.mission-goal -->
				</div> <!-- /.text -->
			</div> <!-- /.col- -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</div> <!-- /.about-compnay -->


<!-- 
			=============================================
				Our Case
			============================================== 
			-->
<div class="our-case section-spacing">
	<div class="container">
		<div class="theme-title-one">
			<h2>Kilas Peristiwa</h2>
			<p>Berikut beberapa Kilas Peristiwa terbaru di KPKNL Bandung</p>
		</div> <!-- /.theme-title-one -->
		<div class="wrapper">
			<div class="row">
				<?php

				foreach ($peristiwa_terbaru->getResult() as $c) :
					$tanggal = $c->created_at;

				?>
					<div class="col-lg-4 col-sm-6 col-12">
						<div class="single-case-block">
							<img src="/gambar/<?= $c->Gambar; ?>" alt="" style="height: 300px;">
							<div class="hover-content">
								<div class="text clearfix">
									<div class="float-left">
										<h5><a href="/pages/detail_peristiwa/<?= $c->id_berita ?>"><?= $c->Judul; ?></a></h5>
										<p><?= $c->Isi; ?></p>
									</div>
									<a href="/pages/detail_peristiwa/<?= $c->id_berita ?>" class="details float-right"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
								</div> <!-- /.text -->
							</div> <!-- /.hover-content -->
						</div> <!-- /.single-case-block -->
					</div> <!-- /.col- -->
				<?php
				endforeach ?>
			</div> <!-- /.row -->
		</div> <!-- /.wrapper -->
		<div class="view-all"><a href="project.html" class="theme-button-one">LIHAT SEMUA</a></div>
	</div> <!-- /.container -->
</div> <!-- /.our-case -->

<?= $this->endSection(); ?>