<div class="row" style="padding-left: 20px; padding-right: 20px;">
	<ul class="collapsible">
		<li class="active">
			<div class="collapsible-header"><h4><i class="material-icons">local_laundry_service</i>Laundry</h4></div>
			<div class="collapsible-body">
				<div class="row">
						<div class="col s12 m6 l3 card bg-biru waves-effect waves-light mh100" style="border-right: 5px solid #fff;">
						<div class="card-content white-text">
							<div class="col s7 m7">
								<i class="fas fa-shopping-cart fa-2x"></i>
								<p>Cucian</p>
							</div>
							<div class="col s5 m5 right-align">
								<p class="flow-text">
									<strong><?= $jml_laundry; ?></strong>
								</p>
							</div>
						</div>
					</div>
					<a href="<?= base_url('member'); ?>" class="col s12 m6 l3 card bg-merah waves-effect waves-light mh100" style="border-right: 5px solid #fff;">
						<div class="card-content white-text">
							<div class="col s7 m7">
								<i class="fas fa-shopping-cart fa-2x"></i>
								<p>User</p>
							</div>
							<div class="col s5 m5 right-align">
								<p class="flow-text">
									<strong><?= $jml_user; ?></strong>
								</p>
								<p>User</p>
							</div>
						</div>
					</a>
					<a class="col s12 m6 l3 card bg-kuning waves-effect waves-light mh100" style="border-right: 5px solid #fff;" href="<?= base_url('feedback'); ?>">
						<div class="card-content white-text">
							<div class="col s7 m7">
								<i class="fas fa-envelope fa-2x"></i>
								<p>Pesan</p>
							</div>
							<div class="col s5 m5 right-align">
								<p class="flow-text"><strong><?= $jml_pesan; ?></strong></p>
								<p>Pesan</p>
							</div>
						</div>
					</a>
					<div class="col s12 m6 l3 card bg-hijau waves-effect waves-light mh100" style="border-right: 5px solid #fff;">
						<div class="card-content white-text">
							<div class="col s7 m7">
								<i class="fas fa-money-bill-wave fa-2x"></i>
								<p>Pemasukan</p>
							</div>
							<div class="col s5 m5 right-align">test</div>
						</div>
					</div>	      	
				</div>		
			</div>
		</li>
		<li>
			<div class="collapsible-header"><h4><i class="material-icons">settings</i>Konfigurasi</h4></div>
			<div class="collapsible-body">
				<div class="row">
					<a href="" class="col s12 m6 l6 card bg-biru waves-effect waves-light mh100" style="border-right: 5px solid #fff;">
						<div class="card-content white-text">
							<div class="col s7 m7">
								<i class="material-icons">contacts</i>
								<p>Kontak</p>
							</div>
							<div class="col s5 m5 right-align">test</div>
						</div>
					</a>
					<a href="<?= base_url('manual'); ?>" class="col s12 m6 l6 card bg-merah waves-effect waves-light mh100" style="border-right: 5px solid #fff;">
						<div class="card-content white-text">
							<div class="col s7 m7">
								<i class="material-icons">library_books</i>
								<p>Panduan</p>
							</div>
							<div class="col s5 m5 right-align">
								<p class="flow-text"><strong><?= $jml_pesan; ?></strong></p>
								<p>Panduan</p>
							</div>
						</div>
					</a>
					<a href="<?= base_url('feedback'); ?>" class="col s12 m6 l6 card bg-kuning waves-effect waves-light mh100" style="border-right: 5px solid #fff;">
						<div class="card-content white-text">
							<div class="col s7 m7">
								<i class="material-icons">format_quote</i>
								<p>Kutipan</p>
							</div>
							<div class="col s5 m5 right-align">
								<p class="flow-text">test</p>
								<p>Pesan</p>
							</div>
						</div>
					</a>			
					<a href="<?= base_url('web_info'); ?>" class="col s12 m6 l6 card bg-hijau waves-effect waves-light mh100" style="border-right: 5px solid #fff;">
						<div class="card-content white-text">
							<div class="col s6 m6">
								<i class="material-icons">local_laundry_service</i>
								<p>Info</p>
							</div>
							<div class="col s6 m6 right-align">
								<p>Informasi Web Perusahaan</p>
							</div>
						</div>
					</a>					
				</div>
			</div>
		</li>    
	</ul>
</div>