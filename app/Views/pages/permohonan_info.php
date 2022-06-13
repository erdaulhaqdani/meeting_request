<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="theme-inner-banner section-spacing">
  <div class="overlay">
    <div class="container">
      <h2>Permohonan Informasi PPID</h2>
    </div> <!-- /.container -->
  </div> <!-- /.overlay -->
</div> <!-- /.theme-inner-banner -->

<div class="our-blog section-spacing">
  <div class="container">
    <div class="row">
      <div class="col-xl col-lg">
        <div class="post-wrapper blog-details">
          <div class="single-blog">
            <div class="image-box">
              <img src="/images/blog/Alur_PPID.jpg" alt="">
            </div> <!-- /.image-box -->
            <div class="post-meta mb-3 mt-3">
              <?php foreach ($info as $a) : ?>
                <?= $a['Isi']; ?>
              <?php endforeach ?>
              <h1 class="title"> Formulir Permohonan Informasi Publik Pada Perangkat PPID DJKN</h1>
              <p>PPID Tk. I <a href="Landing_page/downloadPI/1">(Download)</a> <br>
                PPID Tk. II <a href="Landing_page/downloadPI/2">(Download)</a> <br>
                PPID Tk. III <a href="Landing_page/downloadPI/3">(Download)</a> <br>
              </p>
              <h1 class="title">Formulir Keberatan Informasi Publik Pada Perangkat PPID DJKN</h1>
              <p>PPID Tk. I <a href="Landing_page/downloadKI/1">(Download)</a> <br>
                PPID Tk. II <a href="Landing_page/downloadKI/2">(Download)</a> <br>
                PPID Tk. III <a href="Landing_page/downloadKI/3">(Download)</a> <br>
              </p>
            </div> <!-- /.post-meta -->
            <div class="share-option clearfix">
              <ul class="social-icon float-right">
                <li>Share :</li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
              </ul>
            </div> <!-- /.share-option -->
          </div> <!-- /.single-blog -->
        </div> <!-- /.post-wrapper -->
      </div>
    </div> <!-- /.row -->
  </div> <!-- /.container -->
</div> <!-- /.blog-details -->

<?= $this->endSection(); ?>