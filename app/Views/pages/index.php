<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- 
=============================================
Theme Main Banner
============================================== 
-->
<div id="theme-main-banner" class="banner-one">
	<div data-src="images/home/slide-5.jpg">
		<div class="camera_caption">
			<div class="container">
				<p class="wow fadeInUp animated">The government they survive artical of fortune</p>
				<h1 class="wow fadeInUp animated" data-wow-delay="0.2s">HIGH-QUALITY MARKET <br> EXPERIENCES</h1>
				<a href="about.html" class="theme-button-one wow fadeInUp animated" data-wow-delay="0.39s">ABOUT US</a>
			</div> <!-- /.container -->
		</div> <!-- /.camera_caption -->
	</div>
	<div data-src="images/home/slide-3.jpg">
		<div class="camera_caption">
			<div class="container">
				<p class="wow fadeInUp animated">The government they survive artical of fortune</p>
				<h1 class="wow fadeInUp animated" data-wow-delay="0.2s">HIGH-QUALITY MARKET <br> EXPERIENCES</h1>
				<a href="about.html" class="theme-button-one wow fadeInUp animated" data-wow-delay="0.39s">ABOUT US</a>
			</div> <!-- /.container -->
		</div> <!-- /.camera_caption -->
	</div>
	<div data-src="images/home/slide-1.jpg">
		<div class="camera_caption">
			<div class="container">
				<p class="wow fadeInUp animated">The government they survive artical of fortune</p>
				<h1 class="wow fadeInUp animated" data-wow-delay="0.2s">HIGH-QUALITY MARKET <br> EXPERIENCES</h1>
				<a href="about.html" class="theme-button-one wow fadeInUp animated" data-wow-delay="0.39s">ABOUT US</a>
			</div> <!-- /.container -->
		</div> <!-- /.camera_caption -->
	</div>
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
=====================================================
Latest News
=====================================================
-->
<div class="our-blog latest-news section-spacing">
	<div class="container">
		<div class="theme-title-one">
			<h2>Berita Terbaru</h2>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, pariatur</p>
		</div> <!-- /.theme-title-one -->
		<div class="wrapper">
			<div class="clearfix">
				<div class="latest-news-slider">
					<?php
					function formatTanggal($date)
					{
						// ubah string menjadi format tanggal
						return date('d-m-Y', strtotime($date));
					}

					foreach ($berita->getResult() as $a) :
						$date = $a->created_at;

						if ($a->Status == 'Publik') :
					?>
							<div class="item">
								<div class="single-blog">
									<div class="image-box" style="max-height: 260px;">
										<img src="/gambar/<?= $a->Gambar; ?>" alt="">
										<div class="overlay"><a href="#" class="date"><?= formatTanggal($date); ?></a></div>
									</div> <!-- /.image-box -->
									<div class="post-meta">
										<h5 class="title"><a href="/pages/detail_berita/<?= $a->id_berita ?>"><?= $a->Judul; ?></a></h5>
										<a href="/pages/detail_berita/<?= $a->id_berita ?>" class="read-more">SELENGKAPNYA</a>
									</div> <!-- /.post-meta -->
								</div> <!-- /.single-blog -->
							</div> <!-- /.col- -->
					<?php
						endif;
					endforeach ?>
				</div> <!-- /.latest-news-slider -->
			</div> <!-- /.row -->
		</div> <!-- /.wrapper -->
		<center><a href="/pages/berita_grid" class="theme-button-one mt-5">LIHAT SEMUA</a></center>
	</div> <!-- /.container -->
</div> <!-- /.our-blog -->

<div class="our-blog latest-news section-spacing">
	<div class="container">
		<div class="theme-title-one">
			<h2>Artikel Terbaru</h2>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, pariatur</p>
		</div> <!-- /.theme-title-one -->
		<div class="wrapper">
			<div class="clearfix">
				<div class="latest-news-slider">
					<?php

					foreach ($artikel->getResult() as $a) :
						$date = $a->created_at;

						if ($a->Status == 'Publik') :
					?>

							<div class="item">
								<div class="single-blog">
									<div class="image-box" style="max-height: 260px;">
										<img src="/gambar/<?= $a->Gambar; ?>" alt="">
										<div class="overlay"><a href="#" class="date"><?= formatTanggal($date); ?></a></div>
									</div> <!-- /.image-box -->
									<div class="post-meta">
										<h5 class="title"><a href="/pages/detail_artikel/<?= $a->id_berita ?>"><?= $a->Judul; ?></a></h5>
										<a href="/pages/detail_artikel/<?= $a->id_berita ?>" class="read-more">SELENGKAPNYA</a>
									</div> <!-- /.post-meta -->
								</div> <!-- /.single-blog -->
							</div> <!-- /.col- -->
					<?php
						endif;
					endforeach ?>
				</div> <!-- /.latest-news-slider -->
			</div> <!-- /.row -->
		</div> <!-- /.wrapper -->
		<div class="view-all">
			<center><a href="/pages/artikel_grid" class="theme-button-one mt-5">LIHAT SEMUA</a></center>
		</div>
	</div> <!-- /.container -->
</div> <!-- /.our-blog -->

<!-- 
=============================================
Service Style One
============================================== 
-->
<div class="service-style-one section-spacing">
	<div class="container">
		<div class="theme-title-one">
			<h2>Layanan Kami</h2>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, pariatur</p>
		</div> <!-- /.theme-title-one -->
		<div class="wrapper">
			<div class="row">
				<div class="col-xl-4 col-md-6 col-12">
					<div class="single-service">
						<div class="img-box"><img src="images/home/3.jpg" alt=""></div>
						<div class="text">
							<h5><a href="service-details.html">Barang Milik Negara</a></h5>
							<p>Lorem ipsum dolor sit.</p>
							<a href="service-details.html" class="read-more">SELENGKAPNYA <i class="fa fa-angle-right" aria-hidden="true"></i></a>
						</div> <!-- /.text -->
					</div> <!-- /.single-service -->
				</div> <!-- /.col- -->
				<div class="col-xl-4 col-md-6 col-12">
					<div class="single-service">
						<div class="img-box"><img src="images/home/4.jpg" alt=""></div>
						<div class="text">
							<h5><a href="service-details.html">Piutang Negara</a></h5>
							<p>Lorem ipsum dolor sit.</p>
							<a href="service-details.html" class="read-more">SELENGKAPNYA <i class="fa fa-angle-right" aria-hidden="true"></i></a>
						</div> <!-- /.text -->
					</div> <!-- /.single-service -->
				</div> <!-- /.col- -->
				<div class="col-xl-4 col-md-6 col-12">
					<div class="single-service">
						<div class="img-box"><img src="images/home/5.jpg" alt=""></div>
						<div class="text">
							<h5><a href="service-details.html">Lelang</a></h5>
							<p>Lorem ipsum dolor sit.</p>
							<a href="service-details.html" class="read-more">SELENGKAPNYA <i class="fa fa-angle-right" aria-hidden="true"></i></a>
						</div> <!-- /.text -->
					</div> <!-- /.single-service -->
				</div> <!-- /.col- -->
				<div class="col-xl-4 col-md-6 col-12">
					<div class="single-service">
						<div class="img-box"><img src="images/home/6.jpg" alt=""></div>
						<div class="text">
							<h5><a href="service-details.html">Penilaian</a></h5>
							<p>Lorem ipsum dolor sit.</p>
							<a href="service-details.html" class="read-more">SELENGKAPNYA <i class="fa fa-angle-right" aria-hidden="true"></i></a>
						</div> <!-- /.text -->
					</div> <!-- /.single-service -->
				</div> <!-- /.col- -->
				<div class="col-xl-4 col-md-6 col-12">
					<div class="single-service">
						<div class="img-box"><img src="images/home/7.jpg" alt=""></div>
						<div class="text">
							<h5><a href="service-details.html">Kesekretariatan</a></h5>
							<p>Lorem ipsum dolor sit.</p>
							<a href="service-details.html" class="read-more">SELENGKAPNYA <i class="fa fa-angle-right" aria-hidden="true"></i></a>
						</div> <!-- /.text -->
					</div> <!-- /.single-service -->
				</div> <!-- /.col- -->
				<div class="col-xl-4 col-md-6 col-12">
					<div class="single-service">
						<div class="img-box"><img src="images/home/8.jpg" alt=""></div>
						<div class="text">
							<h5><a href="service-details.html">Kekayaan Negara</a></h5>
							<p>Lorem ipsum dolor sit.</p>
							<a href="service-details.html" class="read-more">SELENGKAPNYA <i class="fa fa-angle-right" aria-hidden="true"></i></a>
						</div> <!-- /.text -->
					</div> <!-- /.single-service -->
				</div> <!-- /.col- -->
			</div> <!-- /.row -->
		</div> <!-- /.wrapper -->
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
						<h2>Profil DJKN Bandung</h2>
						<p>Kanwil DJKN Jawa Barat adalah instansi vertikal Direktorat Jenderal Kekayaan Negara yang berada di bawah dan bertanggungjawab langsung kepada Direktur Jenderal Kekayaan Negara.</p>
						<br>
						<a href="/pages/profil" class="theme-button-one">Selengkapnya</a>
					</div> <!-- /.theme-title-one -->
					<ul class="mission-goal clearfix">
						<li>
							<i class="icon flaticon-star"></i>
							<h4>Vision</h4>
						</li>
						<li>
							<i class="icon flaticon-medal"></i>
							<h4>Missions</h4>
						</li>
						<li>
							<i class="icon flaticon-target"></i>
							<h4>Goals</h4>
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
			<p>A tale of a fateful trip that started from this tropic port aboard this tiny ship today stillers</p>
		</div> <!-- /.theme-title-one -->
		<div class="wrapper">
			<div class="row">
				<?php

				foreach ($peristiwa->getResult() as $a) :
					$date = $a->created_at;

					if ($a->Status == 'Publik') :
						$text = $a->Isi;
						$num_char = 20;
						$cut_text = substr($text, 0, $num_char) . '...';
				?>
						<div class="col-lg-4 col-sm-6 col-12">
							<div class="single-case-block">
								<img src="/gambar/<?= $a->Gambar; ?>" alt="" style="height: 300px;">
								<div class="hover-content">
									<div class="text clearfix">
										<div class="float-left">
											<h5><a href="/pages/detail_peristiwa/<?= $a->id_berita ?>"><?= $a->Judul; ?></a></h5>
											<p><?= $a->Isi; ?></p>
										</div>
										<a href="/pages/detail_peristiwa/<?= $a->id_berita ?>" class="details float-right"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
									</div> <!-- /.text -->
								</div> <!-- /.hover-content -->
							</div> <!-- /.single-case-block -->
						</div> <!-- /.col- -->
				<?php
					endif;
				endforeach ?>
			</div> <!-- /.row -->
		</div> <!-- /.wrapper -->
		<div class="view-all"><a href="project.html" class="theme-button-one">LIHAT SEMUA</a></div>
	</div> <!-- /.container -->
</div> <!-- /.our-case -->

<?= $this->endSection(); ?>