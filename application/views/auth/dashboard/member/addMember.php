<div class="row center-align">  
  <div class="col offset-s1 s10">
      	<h3 class="flow-text">Tambah data Member</h3>
      	<form class="col s12" method="POST" action="<?= base_url('member/simpanAdmin'); ?>">
	      	<!-- <div class="row">
	            <div class="input-field col s12">
	              <input name="id_user" id="id_user" type="text" class="validate"  readonly>
	              <label for="id_user">Kode Member</label>
	            </div>                
	        </div> -->
	        <div class="row">
	            <div class="input-field col s12">
	              <input name="nama_usr" id="nama_usr" type="text" class="validate">
	              <label for="nama_usr">Nama Member</label>
	            </div>                
	        </div>
	        <div class="row">
	            <div class="input-field col s12">
	              <input name="username" id="username" type="text" class="validate">
	              <label for="username">Username</label>
	            </div>                
	        </div>
	        <div class="row">
	            <div class="input-field col s12">
	              <input name="password" id="password" type="password" class="validate">
	              <label for="password">Password</label>
	            </div>                
	        </div>
	        <div class="row">
	            <div class="input-field col s12">
	              <input name="no_telp" id="no_telp" type="text" class="validate">
	              <label for="no_telp">No Telepon</label>
	            </div>                
	        </div>
			<div class="row">
	            <div class="input-field col s12">
				    <select name="level" id="level">
				      <option value="1">Admin</option>
				      <option value="2">Costumer</option>
				    </select>
				    <label>Level</label>
				</div>             
	        </div>

	        <div class="row right-align" style="padding-right: 10px;">
	        	<button class="waves-effect waves-light btn-small">Simpan</button>
	        </div>
        </form>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
    $('select').formSelect();
  });
</script>