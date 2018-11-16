 <div class="slider fullscreen" style="z-index: -999;">
  <ul class="slides">
    <li>
      <img src="<?= base_url('assets/img/laundry/1.jpg'); ?>"> <!-- random image -->
      <div class="caption left-align">
        <h3>This is our big Tagline!</h3>
        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
      </div>
    </li>
    <li>
      <img src="<?= base_url('assets/img/laundry/2.jpg'); ?>"> <!-- random image -->
      <div class="caption left-align">
        <h3>Left Aligned Caption</h3>
        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
      </div>
    </li>
    <li>
      <img src="<?= base_url('assets/img/laundry/3.jpg'); ?>"> <!-- random image -->
      <div class="caption left-align">
        <h3>Right Aligned Caption</h3>
        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
      </div>
    </li>
    <li>
      <img src="<?= base_url('assets/img/laundry/4.jpg'); ?>"> <!-- random image -->
      <div class="caption left-align">
        <h3>This is our big Tagline!</h3>
        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
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