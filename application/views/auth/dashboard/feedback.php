<?php foreach ($feedbacks as $key => $feedback): ?>
<div class="col s12 m10 offset-m1 l6">
  <?php if ($feedback->status == 1): ?>
    <div class="card-panel teal lighten-5 z-depth-1">
  <?php else: ?>
    <div class="card-panel grey lighten-5 z-depth-1">
  <?php endif ?>  
    <div class="row valign-wrapper">
      <div class="col s2">
        <img src="<?= base_url('assets/img/avatar/user.png'); ?>" alt="" class="circle responsive-img" width="96px"> <!-- notice the "circle" class -->
      </div>
      <div class="col s8">
        <h5><?= $feedback->subjek; ?></h5>
        <span class="black-text">
          <?= $feedback->pesan; ?>
        </span>
        <footer><small><?= $feedback->created_at; ?></small></footer>
      </div>
      <div class="col s2">
        <?php if ($feedback->status == 1): ?>
          <form method="POST" action="<?= base_url('feedback/update/'.$feedback->id_feedback); ?>">
            <button type="submit" class="btn-floating btn-large btn-waves btn-effect yellow tooltipped" name="type" value="batal" data-position="left" data-tooltip="Batal tampilkan testimoni"><i class="fas fa-times"></i></button>
          </form>          
        <?php else: ?>
          <form method="POST" action="<?= base_url('feedback/update/'.$feedback->id_feedback); ?>">
            <button type="submit" class="btn-floating btn-large btn-waves btn-effect tooltipped" name="type" value="approve" data-position="left" data-tooltip="Tampilkan testimoni"><i class="fas fa-check"></i></button>
          </form>          
        <?php endif ?>
        <a href="<?= base_url('feedback/delete/'.$feedback->id_feedback); ?>" class="btn-floating btn-large btn-waves btn-effect red tooltipped" data-position="left" data-tooltip="Hapus testimoni" style="margin-top: 10px;"><i class="fas fa-trash"></i></a>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>

<script type="text/javascript">
  $(document).ready(function() {
    $('.tooltipped').tooltip();
  });
</script>