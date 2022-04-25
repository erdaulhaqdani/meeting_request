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
      <h2>Prosedur</h2>
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
          <div class="col-md-6 col-12">
            <div class="single-blog">
              <div class="image-box">
                <img src="/images/blog/3.jpg" alt="">
                <div class="overlay"><a href="#" class="date">Feb 06, 2018</a></div>
              </div> <!-- /.image-box -->
              <div class="post-meta">
                <h5 class="title"><a href="/pages/detail_prosedur">Trouble with the law since</a></h5>
                <p>To seek out new life and new civilizations to boldly go where no man has gone before you would see the biggest gift.</p>
                <a href="/pages/detail_prosedur" class="read-more">SELENGKAPNYA</a>
              </div> <!-- /.post-meta -->
            </div> <!-- /.single-blog -->
          </div> <!-- /.col- -->
          <div class="col-md-6 col-12">
            <div class="single-blog">
              <div class="image-box">
                <img src="/images/blog/4.jpg" alt="">
                <div class="overlay"><a href="#" class="date">Mar 30, 2018</a></div>
              </div> <!-- /.image-box -->
              <div class="post-meta">
                <h5 class="title"><a href="/pages/detail_prosedur">Kind of torture to have to watch</a></h5>
                <p>To seek out new life and new civilizations to boldly go where no man has gone before you would see the biggest gift.</p>
                <a href="/pages/detail_prosedur" class="read-more">SELENGKAPNYA</a>
              </div> <!-- /.post-meta -->
            </div> <!-- /.single-blog -->
          </div> <!-- /.col- -->
          <div class="col-md-6 col-12">
            <div class="single-blog">
              <div class="image-box">
                <img src="/images/blog/5.jpg" alt="">
                <div class="overlay"><a href="#" class="date">Apr 14, 2018</a></div>
              </div> <!-- /.image-box -->
              <div class="post-meta">
                <h5 class="title"><a href="/pages/detail_prosedur">Make the best of things its an uphill.</a></h5>
                <p>To seek out new life and new civilizations to boldly go where no man has gone before you would see the biggest gift.</p>
                <a href="/pages/detail_prosedur" class="read-more">SELENGKAPNYA</a>
              </div> <!-- /.post-meta -->
            </div> <!-- /.single-blog -->
          </div> <!-- /.col- -->
          <div class="col-md-6 col-12">
            <div class="single-blog">
              <div class="image-box">
                <img src="/images/blog/3.jpg" alt="">
                <div class="overlay"><a href="#" class="date">Feb 06, 2018</a></div>
              </div> <!-- /.image-box -->
              <div class="post-meta">
                <h5 class="title"><a href="/pages/detail_prosedur">Trouble with the law since</a></h5>
                <p>To seek out new life and new civilizations to boldly go where no man has gone before you would see the biggest gift.</p>
                <a href="/pages/detail_prosedur" class="read-more">SELENGKAPNYA</a>
              </div> <!-- /.post-meta -->
            </div> <!-- /.single-blog -->
          </div> <!-- /.col- -->
          <div class="col-md-6 col-12">
            <div class="single-blog">
              <div class="image-box">
                <img src="/images/blog/4.jpg" alt="">
                <div class="overlay"><a href="#" class="date">Mar 30, 2018</a></div>
              </div> <!-- /.image-box -->
              <div class="post-meta">
                <h5 class="title"><a href="/pages/detail_prosedur">Kind of torture to have to watch</a></h5>
                <p>To seek out new life and new civilizations to boldly go where no man has gone before you would see the biggest gift.</p>
                <a href="/pages/detail_prosedur" class="read-more">SELENGKAPNYA</a>
              </div> <!-- /.post-meta -->
            </div> <!-- /.single-blog -->
          </div> <!-- /.col- -->
          <div class="col-md-6 col-12">
            <div class="single-blog">
              <div class="image-box">
                <img src="/images/blog/5.jpg" alt="">
                <div class="overlay"><a href="#" class="date">Apr 14, 2018</a></div>
              </div> <!-- /.image-box -->
              <div class="post-meta">
                <h5 class="title"><a href="/pages/detail_prosedur">Make the best of things its an uphill.</a></h5>
                <p>To seek out new life and new civilizations to boldly go where no man has gone before you would see the biggest gift.</p>
                <a href="/pages/detail_prosedur" class="read-more">SELENGKAPNYA</a>
              </div> <!-- /.post-meta -->
            </div> <!-- /.single-blog -->
          </div> <!-- /.col- -->
        </div> <!-- /.post-wrapper -->
        <div class="theme-pagination">
          <ul>
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
      <!-- ===================== Blog Sidebar ==================== -->
      <?= $this->include('layout/grid_sidebar') ?>
      <!-- /.col- -->
    </div> <!-- /.row -->
  </div> <!-- /.container -->
</div> <!-- /.blog-inner-page -->


<?= $this->endSection(); ?>