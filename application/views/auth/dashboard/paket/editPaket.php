<div class="row center-align">  
  <div class="col s9" style="padding-left: 200px;">
      	<h3 class="flow-text">Edit data paket</h3>
      	<form class="col s12" method="POST" action="<?= base_url('paket/simpanpaket'); ?>">
	      	<div class="row">
	            <div class="input-field col s12">
	              <input name="id_paket" id="id_paket" type="text" class="validate" value="<?= $id_paket; ?>">
	              <label for="id_paket">Kode Paket</label>
	            </div>                
	        </div>
	      	<div class="row">
	            <div class="input-field col s12">
	              <input name="nama_paket" id="nama_paket" type="text" class="validate" value="<?= $nama_paket; ?>">
	              <label for="nama_paket">Nama Paket</label>
	            </div>                
	        </div>
	        <div class="row">
	            <div class="input-field col s12">
	              <input name="harga" id="harga" type="text" class="validate" value="<?= $harga; ?>">
	              <label for="harga">Harga/kg</label>
	            </div>                
	        </div>
	        <div class="row">
	            <div class="input-field col s12">
	              <input name="deskripsi_paket" id="deskripsi_paket" type="text" class="validate" value="<?= $deskripsi_paket; ?>">
	              <label for="deskripsi_paket">Deskripsi</label>
	            </div>                
	        </div>
	        <div class="row right-align" style="padding-right: 10px;">
	        	<button class="waves-effect waves-light btn-small">Simpan</button>
	        </div>
        </form>
    </div>
</div>