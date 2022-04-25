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