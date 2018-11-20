<div style="height: 100vh;">
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l6" style="padding-top: 50px;">								
				<nav>
					<div class="nav-wrapper z-deepth-2">
						<div class="col s12">
							<a href="<?= base_url(); ?>" class="breadcrumb"><i class="material-icons">home</i></a>
							<a href="javascript:void;" class="breadcrumb">Profilku</a>
						</div>						
					</div>
				</nav>
				<div class="card">
					<div class="card-content" id="basic_info">

					</div>
					<div class="card-action right-align" id="aksi">

					</div>
				</div>
			</div>
			<div class="col s12 m6 l6" id="adv_info" style="padding-top: 50px;">
		</div>
	</div>
</div>

<div id="modalEdit" class="modal">
  <div class="modal-content center-align">    
	<h4>Ubah Fotomu?</h4>
    <form action="<?= base_url('auth/do_upload'); ?>" id="submitAva" method="POST" enctype="multipart/form-data">
    	<div class="file-field input-field">
	        <input type="file" name="filefoto" class="dropify" data-height="300" data-default-file="<?= base_url('assets/img/avatar/'.$this->session->avatar); ?>">
	    </div>
	    <div class="row">
	      <button class="modal-close waves-effect waves-light btn pink col s12 m6">Batal</button>
	      <button class="waves-effect waves-light btn col s12 m6" id="btn-changeav" type="submit">Ubah</button>
	    </div>
    </form>
  </div>    
</div>

<script type="text/javascript">	
	$(document).ready(function() {		
		tampilProfil();		

		function tampilProfil() {
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('auth/tampilProfil'); ?>',
				async: false,
				dataType: 'json',
				success: function(data) {
					var basic_info = '<div class="row">' +
								'<div class="input-field col s12">' +
									'<input type="text" name="nama_usr" class="validate" value="' + data.nama_usr + '">' +
									'<label for="nama_usr">Nama</label>' +
								'</div>' +
							'</div>' +
							'<div class="row">' +
								'<div class="input-field col s12">' +
									'<input type="text" name="username" class="validate" value="' + data.username + '">' +
									'<label for="username">Username</label>' +
								'</div>' +
							'</div>' +
							'<div class="row">' +
								'<div class="input-field col s12">' +
									'<input type="email" name="email" class="validate" value="' + data.email + '">' +
									'<label for="email">Email</label>'
								'</div>' +
							'</div>'+
						'</div>';									
				$('#basic_info').html(basic_info);

				var aksi = '<input type="hidden" name="id_user" value="' + data.id_user + '">' +
						'<a href="javascript:void();" id="btn-update" class="btn waves-effect waves-light" data-id_user="' + data.id_user + '" data-nama_usr="' +data.nama_usr + '" data-username="' + data.username + '" data-email="' + data.email + '" data-no_telp="' + data.no_telp + '" data-alamat="' + data.alamat + '">Edit Profilku</a>';
				$('#aksi').html(aksi);

				var adv_info = '<div class="row" style="margin-top: 50px;">' +
					'<div class="col s12 center-align">' +
						'<img src="<?= base_url('assets/img/avatar/'); ?>'+ data.avatar + '" alt="' + data.nama_usr + '" class="circle ava" style="width: 200px;height:200px;margin: 0 auto;" data-id_user="' + data.id_user + '" data-avatar="' + data.avatar + '">' +
					'</div>' +
				'</div>' +
				'<div class="card">' +
					'<div class="card-content">' +
						'<div class="row">' +
							'<div class="input-field col s12">' +
								'<input type="text" name="no_telp" class="validate" value="' + data.no_telp + '">' +
								'<label for="no_telp">No. Telepon</label>' +
							'</div>' +
						'</div>' +
						'<div class="row">' +
							'<div class="input-field col s12">' +
								'<textarea name="alamat" id="alamat" cols="30" rows="10" class="materialize-textarea">' + data.alamat + '</textarea>' +
								'<label for="alamat">Alamat</label>' +
							'</div>' +
						'</div>' +
					'</div>' +
				'</div>';
				$('#adv_info').html(adv_info);
				$('[name="old_avatar"]').val(data.avatar);
				M.updateTextFields();
				}
			});
		}

		$('#btn-update').on('click', function() {
	      var id_user = $('[name="id_user"]').val();
	      var nama_usr = $('[name="nama_usr"]').val();
	      var username = $('[name="username"]').val();
	      var email = $('[name="email"]').val();
	      var no_telp = $('[name="no_telp"]').val();
	      var alamat = $('[name="alamat"]').val();
	      $.ajax({
	        type: 'POST',
	        url: '<?= base_url('auth/updateProfil'); ?>',
	        dataType: 'json',
	        data: {'id_user': id_user, 'nama_usr': nama_usr, 'username': username, 'email': email, 'no_telp': no_telp, 'alamat': alamat},
	        success: function(data) {
	          tampilProfil();
	          M.toast({html: 'Berhasil mengubah profil'});
	        }
	      });
	      return false;
	    });

	    // $('#submitAva').on(function(e) {
	    // 	e.preventDefault();
	    // 	$.ajax({
	    // 		type: 'post',
	    // 		url: '<?= base_url('auth/do_upload'); ?>',
	    // 		data: new FormData(this),
	    // 		processData: false,
	    // 		contentType: false,
	    // 		cache: false,
	    // 		async: false,
	    // 		success: function(data) {
	    // 			tampilProfil();
	    // 			M.toast({html: 'Berhasil mengubah foto profil'});
	    // 		}
	    // 	});    	
	    // });

	    $('.ava').on('click', function() {
	    	var id_user = $(this).data('id_user');
	    	var avatar = $(this).data('avatar');
	    	$('#modalEdit').modal('open');
	    });

	    $('.dropify').dropify();
	});
</script>