<div class="slider">
  <ul class="slides">
    <?php if (count($feedbacks) < 1): ?>
      <li>
        <img src="<?= base_url(); ?>assets/img/bg/background2.jpg" style="z-index: -200"> <!-- random image -->
        <div class="caption center-align">
          <h2 class="white-text">Maaf belum ada testimoni saat ini</h2>
        </div>          
      </li>        
    <?php else: ?>
    <?php foreach ($feedbacks as $key => $feedback): ?>    
    <li>
      <img src="<?= base_url(); ?>assets/img/bg/background<?= $key+1; ?>.jpg"> <!-- random image -->
      <div class="caption center-align">
        <div class=" card">
          <div class="card-content row valign-wrapper">
            <div class="col s12 m4 right-align">
              <img src="<?= base_url() ?>assets/img/avatar/t<?= $key+1; ?>.jpg" class="circle" style="width: 94px; height: 94px;">
            </div>
            <div class="col s12 m8 left-align">
              <p class="grey-text text-darken-1"><strong style="font-size: 3em;">"</strong><?= $feedback->pesan; ?><strong style="font-size: 3em;"><sub>"</sub></strong></p>
            </div>              
          </div>
        </div>            
      </div>
    </li>
    <?php endforeach ?>          
    <?php endif ?>
  </ul>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('.slider').slider({height: 250});
  });
</script>