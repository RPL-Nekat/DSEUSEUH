<?php $url = $this->uri->segment(1); ?>

<div class="navbar-fixed">
	<nav class="nav-dash">
		<div class="nav-wrapper">
			<a href="#!" class="brand-logo">D'Seuseuh</a>		
			<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="fas fa-bars fa-2x white-text" data-fa-transform="down-3"></i></a>		
			<div class="breadcrumb-nav hide-on-med-and-down show-on-large">
				<a href="<?= base_url(); ?>" class="breadcrumb"><i class="material-icons">home</i></a>
				<a href="<?= base_url('dashboard'); ?>" class="breadcrumb">Dashboard</a>
				<?php if ($url == uri_string() && $url != 'dashboard'): ?>
					<a href="#!" class="breadcrumb"><?= ucwords(uri_string()); ?></a>
				<?php endif ?>
			</div>			
		</div>
	</nav>
</div>

<ul id="dropdown1" class="dropdown-content">
	<!-- <li><a href=""><i class="material-icons">account_circle</i>Profil</a></li> -->
	<li><a href="<?= base_url('web_info'); ?>"><i class="material-icons">settings</i>Konfigurasi</a></li>
	<li><a href="<?= base_url('auth/logout'); ?>"><i class="material-icons">power_settings_new</i>Keluar</a></li>
</ul>

<ul id="slide-out" class="sidenav sidenav-fixed collapsible">
	<li>
		<div class="user-view">
		<div class="background">
			<img src="<?= base_url('assets/img/bg/background1.jpg'); ?>">
		</div>
		<a href="#user"><img class="circle" src="<?= base_url('assets/img/avatar/user.png'); ?>"></a>
		<a href="#name" class="dropdown-trigger" data-target="dropdown1"><span class="white-text name"><?= $this->session->nama; ?> <i class="material-icons right">arrow_drop_down</i></span></a>
		<a href="#email"><span class="white-text email"><?= $this->session->email; ?></span></a>
		</div>
	</li>
	<li><a href="#!"><strong><?= $this->session->level; ?></strong></a></li>
	<li><a href="#!"><i class="fas fa-phone fa-lg blue-text" style="margin-right: 10px;"></i> <?= $this->session->telp; ?></a></li>
	<li><div class="divider"></div></li>
	<li class="<?php if($url=="paket" || $url == "laundry" || $url == "laundryKeluar" || $url == "member"){echo "active";}?>">
		<div class="collapsible-header"><a class="subheader" style="padding: 0 15px 0 15px;"><i class="fas fa-edit fa-lg" style="margin-right: 10px;"></i>Kelola</a></div>
		<div class="collapsible-body">
			<ul>
				<li><a class="waves-effect <?= activate_link('paket'); ?>" href="<?= base_url('paket'); ?>">Paket Laundry</a></li>
				<li><a class="waves-effect <?= activate_link('laundry'); ?>" href="<?= base_url('laundry'); ?>">Laundry Masuk</a></li>
				<li><a class="waves-effect <?= activate_link('laundryKeluar'); ?>" href="<?= base_url('laundryKeluar'); ?>">Laundry Keluar</a></li>
				<li><a class="waves-effect <?= activate_link('member') ?>" href="<?= base_url('member'); ?>">Member</a></li>
			</ul>						
		</div>
	</li>	
	<li><div class="divider"></div></li>	
	<li class="<?php if($url=="feedback" || $url == "manual" || $url =="web_info"){echo "active";}?>">
		<div class="collapsible-header"><a class="subheader" style="padding: 0 15px 0 15px;"><i class="fas fa-cog fa-lg" style="margin-right: 10px;"></i>Konfigurasi</a></div>
		<div class="collapsible-body">
			<ul>
				<li><a class="waves-effect <?= activate_link('feedback'); ?>" href="<?= base_url('feedback'); ?>">Testimoni</a></li>
				<li><a class="waves-effect <?= activate_link('manual'); ?>" href="<?= base_url('manual'); ?>">Panduan</a></li>
				<!-- <li><a class="waves-effect" href="#!">Kutipan</a></li>
				<li><a class="waves-effect" href="#!">Layanan</a></li> -->
				<li><a class="waves-effect <?= activate_link('web_info'); ?>" href="<?= base_url('web_info'); ?>">Informasi Web</a></li>
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
				<?php if ($url == uri_string() && $url != 'dashboard'): ?>
					<a href="#!" class="breadcrumb"><?= ucwords(uri_string()); ?></a>
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