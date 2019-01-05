 <div class="slider fullscreen" style="z-index: -999;">
  <ul class="slides">
    <li>
      <img src="<?= base_url('assets/img/laundry/1.jpg'); ?>"> <!-- random image -->
      <div class="caption left-align">
        <h3>Sibuk?<br>Cucian numpuk?<br>Gak ada Waktu?</h3>
        <h5 class="light grey-text text-lighten-3">D'seuseuh aja.</h5>
      </div>
    </li>
    <li>
      <img src="<?= base_url('assets/img/laundry/2.jpg'); ?>"> <!-- random image -->
      <div class="caption left-align">
        <h3>Nyeseuh jadi mudah!</h3>
        <h5 class="light grey-text text-lighten-3">Cepat, wangi, dan terpercaya.</h5>
      </div>
    </li>
    <li>
      <img src="<?= base_url('assets/img/laundry/3.jpg'); ?>"> <!-- random image -->
      <div class="caption left-align">
        <h3>Gak ganggu waktu<br>kamu kok</h3>
        <h5 class="light grey-text text-lighten-3">Panggil saja kami.</h5>
      </div>
    </li>
    <li>
      <img src="<?= base_url('assets/img/laundry/4.jpg'); ?>"> <!-- random image -->
      <div class="caption left-align">
        <h3>Nunggu apalagi?</h3>
        <h5 class="light grey-text text-lighten-3">Ayo! Cucianmu gak bisa bersih sendiri.</h5>
      </div>
    </li>
  </ul>
</div>

<div class="container">  
  <?php $this->load->view($viewnya); ?>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('.slider').slider();

    $('textarea#message').characterCounter();
    
    <?php if(isset($_GET['auth?errorerror'])){ $error = $_GET['auth?error'];if($error == "1"){?>
      var $tC = $('<span>Error! Username / Password Anda Salah.</span>');
    <?php }?>
      M.toast($tC, 4000, 'rounded')
    <?php }?>      
  });
</script>