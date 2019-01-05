<?php 
	$url = $this->uri->segment(1); 
	$url2 = $this->uri->segment(2); 
	$url3 = $this->uri->segment(3);
	$urll = uri_string();
 ?>

<div class="navbar-fixed">
	<nav class="nav-dash">
		<div class="nav-wrapper">
			<a href="#!" class="brand-logo">DSeuseuh</a>		
			<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="fas fa-bars fa-2x white-text" data-fa-transform="down-3"></i></a>		
			<div class="breadcrumb-nav hide-on-med-and-down show-on-large">
				<a href="<?= base_url(); ?>" class="breadcrumb"><i class="material-icons">home</i></a>
				<?php if ($url): ?>
					<a href="<?= base_url($url); ?>" class="breadcrumb"><?= ucwords($url); ?></a>
					<?php if ($url2): ?>
					<a href="#!" class="breadcrumb"><?= ucwords($url2); ?></a>
						<?php if ($url3): ?>
							<a href="#!" class="breadcrumb"><?= ucwords($url3); ?></a>
						<?php endif ?>
					<?php endif ?>				
				<?php endif ?>
			</div>			
		</div>
	</nav>
</div>

<ul id="dropdown1" class="dropdown-content">
	<li><a href="<?= base_url('auth/profil'); ?>"><i class="material-icons">account_circle</i>Profil</a></li>
	<li><a href="<?= base_url('dashboard/profil_web'); ?>"><i class="material-icons">settings</i>Konfigurasi</a></li>
	<li><a href="<?= base_url('auth/logout'); ?>"><i class="material-icons">power_settings_new</i>Keluar</a></li>
</ul>

<ul id="slide-out" class="sidenav sidenav-fixed collapsible">
	<li>
		<div class="user-view">
		<div class="background">
			<img src="<?= base_url('assets/img/bg/background1.jpg'); ?>">
		</div>
		<a href="#user"><img class="circle" src="<?= base_url('assets/img/avatar/'.$this->session->avatar); ?>"></a>
		<a href="#name" class="dropdown-trigger" data-target="dropdown1"><span class="white-text name"><?= $this->session->nama_usr; ?> <i class="material-icons right">arrow_drop_down</i></span></a>
		<a href="#email"><span class="white-text email"><?= $this->session->email; ?></span></a>
		</div>
	</li>
	<li><a href="#!"><strong><?= ucwords($this->session->level); ?></strong></a></li>
	<li><a href="#!"><i class="fas fa-phone fa-lg blue-text" style="margin-right: 10px;"></i> <?= $this->session->no_telp; ?></a></li>
	<li><div class="divider"></div></li>
	<li class="<?php if($url2 == 'paket' || $url2 == 'laundry_masuk' || $url2 == 'laundry_keluar' || $url2 == 'member'){echo "active";} ?>">
		<div class="collapsible-header"><a class="subheader" style="padding: 0 15px 0 15px;"><i class="fas fa-edit fa-lg" style="margin-right: 10px;"></i>Kelola</a></div>
		<div class="collapsible-body">
			<ul>
				<li><a class="waves-effect <?= activate_link('paket'); ?>" href="<?= base_url('dashboard/paket'); ?>">Paket Laundry</a></li>
				<li><a class="waves-effect <?= activate_link('laundry_masuk'); ?>" href="<?= base_url('dashboard/laundry_masuk'); ?>">Laundry Masuk</a></li>
				<li><a class="waves-effect <?= activate_link('laundry_keluar'); ?>" href="<?= base_url('dashboard/laundry_keluar'); ?>">Laundry Keluar</a></li>
				<li><a class="waves-effect <?= activate_link('member') ?>" href="<?= base_url('dashboard/member'); ?>">Member</a></li>
			</ul>						
		</div>
	</li>	

	<li><div class="divider"></div></li>
	<li class="<?php if($url2 == 'laporan'){echo "active";} ?>">
		<div class="collapsible-header"><a class="subheader" style="padding: 0 15px 0 15px;"><i class="fas fa-chart-pie fa-lg" style="margin-right: 10px;"></i>Laporan</a></div>
		<div class="collapsible-body">
			<ul>
				<li><a href="<?= base_url('dashboard/laporan'); ?>" class="waves-effect <?= activate_link('laporan'); ?>">Cetak Laporan</a></li>
			</ul>
		</div>
	</li>	

	<li><div class="divider"></div></li>	
	<li class="<?php if($url2 == 'testimoni' || $url2 == 'manual' || $url2 == 'profil_web'){echo "active";} ?>">
		<div class="collapsible-header"><a class="subheader" style="padding: 0 15px 0 15px;"><i class="fas fa-cog fa-lg" style="margin-right: 10px;"></i>Konfigurasi</a></div>
		<div class="collapsible-body">
			<ul>
				<li><a class="waves-effect <?= activate_link('testimoni'); ?>" href="<?= base_url('dashboard/testimoni'); ?>">Testimoni</a></li>
				<li><a class="waves-effect <?= activate_link('user_manual'); ?>" href="<?= base_url('dashboard/user_manual'); ?>">Panduan</a></li>
				<!-- <li><a class="waves-effect" href="#!">Kutipan</a></li>
				<li><a class="waves-effect" href="#!">Layanan</a></li> -->
				<li><a class="waves-effect <?= activate_link('profil_web'); ?>" href="<?= base_url('dashboard/profil_web'); ?>">Informasi Web</a></li>
			</ul>													
		</div>
	</li>	
</ul>
	  

<div class="dash-content">
	<div class="row">		
		<?php if ($url != 'dashboard'): ?>
		<nav class="hide-on-med-and-up col s12">
			<div class="nav-wrapper">
				<a href="<?= base_url('dashboard'); ?>" class="breadcrumb"><i class="material-icons">dashboard</i> Dashboard</a>
				<?php if ($url2): ?>
					<a href="#!" class="breadcrumb"><?= ucwords($url2); ?></a>
				<?php endif ?>
			</div>
		</nav>
		<?php endif ?>
		<div class="col s12">
			<?php $this->load->view($sidenav); ?>	
		</div>		
	</div>
</div>
	

<script type="text/javascript">
	$(document).ready(function() {
		$('.dropdown-trigger').dropdown({hover: true, coverTrigger: false});		
		// $('.fullscreen').on('click', function() {
		// 	$('body').fullscreen();
		// });
	});
</script>