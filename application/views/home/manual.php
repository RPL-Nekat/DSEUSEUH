<div class="container" id="manual" style="padding-top: 30px; padding-bottom: 30px;">
	<h5 class="center">Bagaimana menggunakan layanan kami?</h5>	
	<div class="timeline">
		<div class="timeline-event" style="margin-top: -40px;">
			<div class="timeline-content" style="height: 150px;"></div>
			<div class="timeline-badge yellow white-text"><i class="fas fa-question fa-2x" data-fa-transform="shrink-4 down-3"></i></div>
		</div>

		<?php foreach ($manuals as $key => $manual): ?>
		<div class="timeline-event">
			<div class="card horizontal timeline-content">
				<div class="card-image waves-effect waves-block waves-light">
					<img src="<?= base_url('assets/img/teknis/pilih_servis.jpg') ?>" alt="" class="activator">
				</div>
				<div class="card-stacked">
					<div class="card-content">
						<span class="card-title activator grey-text text-darken-4"><?= $manual->header; ?> <i class="material-icons right">more_vert</i></span>
						<p><?= $manual->subheader; ?> <a href="">disini</a></p>
					</div>
				</div>				
				<div class="card-reveal">
					<div class="card-title grey-text text-darken-4"><?= $manual->header; ?><i class="material-icons right">close</i></div>
					<p><?= $manual->deskripsi; ?></p>
				</div>
			</div>
			<div class="timeline-badge blue white-text"><i class="material-icons">list</i></div>
		</div>
		<?php endforeach ?>		
		
		<div class="timeline-event">
			<div class="timeline-content" style="height: 150px;"></div>
			<div class="timeline-badge green white-text"><i class="material-icons">check</i></div>
		</div>		
	</div>	
	<div class="center" style="margin-top: -60px;">
		<p class="flow-text">Pakaian bersih, wangi dan rapih seketika</p>
		<?php if ($this->session->nama != null): ?>
			<a href="" class="btn waves-effect waves-light pink darken-1 white-text text-darken-1" style="border-radius: 30px;">Cuci Sekarang!!</a>
		<?php else: ?>
			<a href="<?= base_url('auth') ?>" class="btn waves-effect pink darken-1 white-text text-darken-1" style="border-radius: 30px;">Join Us</a>	
		<?php endif ?>
		
	</div>
</div>