  <?php $this->load->view('home/header'); ?>

  <?php $this->load->view('home/testimoni'); ?>

  <?php $this->load->view('home/manual'); ?>

  <div id="index-banner" class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">If you work just for money, you’ll never make it, but if you love what you’re doing and you always put the customer first, success will be yours.
          <br><br><strong>-Ray Krock</strong></h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="<?= base_url() ?>assets/img/laundry/g3.jpg" alt="Unsplashed background img 1"></div>
  </div>


  <?php $this->load->view('home/layanan'); ?>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 black-text text-darken-3">Siap melayani anda saat jam kerja.</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="<?= base_url('assets/img/teknis/contact_us.jpeg') ?>" alt="Unsplashed background img 2"></div>
  </div>

  <div class="container">
    <div class="section" id="contact">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4>Contact Us</h4>
          <div class="row">
            <div class="col s12 m3">
              <div class="icon-block">
                <h2 class="center blue-text"><i class="fas fa-clock fa-2x"></i></h2>
                <h5 class="center">Jam Kerja</h5>
                <p class="light">Setiap hari <strong>07.00 - 21.00</strong></p>
              </div>
            </div>
            <div class="col s12 m3">
              <div class="icon-block">
                <h2 class="center green-text"><i class="fas fa-phone fa-2x"></i></h2>
                <h5 class="center">Telephone</h5>

                <p class="light"><strong><?= $kontak; ?></strong></p>
              </div>
            </div>

            <div class="col s12 m3">
              <div class="icon-block">
                <h2 class="center red-text"><i class="fas fa-map-marker-alt fa-2x"></i></h2>
                <h5 class="center">Alamat</h5>

                <p class="light"><?= $alamat; ?></p>
              </div>
            </div>

            <div class="col s12 m3">
              <div class="icon-block">
                <h2 class="center brown-text"><i class="fas fa-envelope fa-2x"></i></h2>
                <h5 class="center">Kirim pesan</h5>

                <p class="light"><strong>dseuseuh@email.com</strong></p>
                <a href="#about" class="btn waves-effect waves-light brown scroll_to">Kirimi kami pesan</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot" id="about">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Tim yang bagus bukanlah tim yang memiliki kemampuan yang sejenis, namun tim yang saling melengkapi. <br><br><strong>-Jaya Setiabudi</strong></h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="<?= base_url('assets/img/teknis/about_us.jpeg') ?>" alt="Unsplashed background img 3"></div>
  </div>

<?php $this->load->view('layouts/footer') ?>

<script type="text/javascript">
  $(document).ready(function() {
    $('.carousel.carousel-slider').carousel({
      fullWidth: true,
      indicators: true
    });

    autoplay();

    function autoplay() {
      $('.carousel').carousel('next');
      setTimeout(autoplay, 4500);
    }

    $('.materialboxed').materialbox();    

    $('.scroll_to').on('click', function(event) {
      var jump = $(this).attr('href');
      var new_pos = $(jump).offset();
      $('html, body').stop().animate({
        scrollTop: new_pos.top
      }, 1000);
      e.preventDefault();
    }); 
  });
</script>