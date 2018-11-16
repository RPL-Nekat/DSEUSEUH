<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title><?= $title ?></title>

	<!-- CSS  -->
	<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->  
	<link href="<?= base_url('assets/css/materialize.css') ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="<?= base_url('assets/css/style.css') ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="<?= base_url('assets/css/manual.css') ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="<?= base_url('assets/css/form.css') ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="<?= base_url('assets/fonts/material-icons/material-icons.css') ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="<?= base_url('assets/vendors/prism/prism.css') ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="<?= base_url('assets/vendors/DataTables-1.10.18/css/jquery.dataTables.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link rel="shortcut icon" href="<?= base_url('assets/img/laundry/washing-machine.png') ?>">	

	<script type="text/javascript" src="<?= base_url('assets/vendors/fontawesome5.5/js/all.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/vendors/prism/prism.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/init.js') ?>"></script>  
	<!-- <script type="text/javascript" src="<?= base_url('assets/js/jquery.fullscreen.min.js') ?>"></script>   -->
</head>
<body id="page_top">
  <!-- Start Page Loading -->
	<div id="loader-wrapper">
		<div id="loader"></div>
		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>
	</div>
  <!-- End Page Loading -->

	<div class="fixed-action-btn">
		<a class="btn-floating btn-large red">
			<i class="large fas fa-bars fa-2x" data-fa-transform="shrink-4 down-3"></i>
		</a>
		<ul>
		<?php if ($viewnya == 'home'): ?>
			<li><a href="#page_top" class="btn-floating red scroll_to"><i class="fas fa-chevron-up"></i></a></li>
		<?php else: ?>
			<li><a href="<?= base_url(); ?>" class="btn-floating red scroll_to"><i class="fas fa-home"></i></a></li>			
		<?php endif ?>              
			<li><a onclick="history.go(-1)" class="btn-floating yellow darken-1 scroll_to"><i class="fas fa-chevron-left"></i></a></li>
		</ul>
	</div>

	<?php 
		if ($viewnya == 'auth/login' || $viewnya == 'auth/register') {
			$this->load->view('layouts/auth_layout');
		} else {
			$this->load->view($viewnya);
		}
	 ?>


	<!--  Scripts-->  
	<script type="text/javascript" src="<?= base_url('assets/js/materialize.js') ?>"></script>	
	<script type="text/javascript" charset="utf8" src="<?= base_url('assets/vendors/DataTables-1.10.18/js/jquery.dataTables.js'); ?>"></script>
	<script type="text/javascript">

		$(window).on('load', function() {
		  setTimeout(function() {
		    $('body').addClass('loaded');
		  }, 200);
		});

		$(document).ready(function() {
			$('.fixed-action-btn').floatingActionButton();
			$('.collapsible').collapsible();
			$('.modal').modal();
		});

	</script>	
</body>
</html>