<div class="row center-align">  
  <div class="col s9" style="padding-left: 200px;">
      	<h3 class="flow-text">Ambil Laundry</h3>
      	<form class="col s12" method="POST" action="<?= base_url('laundry/simpanlaundry'); ?>">
            <div class="row">
                <div class="input-field col s12">
                  <input name="id_laundry" id="id_laundry" type="text" class="validate" value="<?php echo $id_laundry; ?>" readonly>
                  <label for="id_laundry">Kode Laundry</label>
                </div>                
            </div>
            <div class="row">
                <div class="input-field col s12">
                  <input name="nama_konsumen" id="nama_konsumen" type="text" class="validate" value="<?php echo $nama_konsumen ?>" readonly>
                  <label for="nama_konsumen">Nama Komsumen</label>
                </div>                
            </div>
            <div class="row">
                <div class="input-field col s12">
                  <select>
                      <option value="1">Keluar</option>
                    </select>
                  <label for="status">Status</label>
                </div>                
            </div>
            <div class="row">
                <div class="input-field col s12">
                  <input name="jrsn" id="jrsn" type="text" class="validate" value="<?php echo $jrsn; ?>" readonly>
                  <label for="jrsn">Harga</label>
                </div>                
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="brt" id="brt" value="<?php echo $brt; ?>" class="validate" readonly/>
                    <label for="brt">Berat</label>
                </div>             
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="t" id="t" value="<?php echo $t; ?>" class="validate" readonly/>
                    <label for="t">Total</label>
                </div>             
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="by" id="by" value="<?php echo $by; ?>" class="validate" readonly/>
                    <label for="by">Bayar</label>
                </div>             
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="k" id="k" value="<?php echo $k; ?>" class="validate" readonly/>
                    <label for="k">Kembalian</label>
                </div>             
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="tgl_masuk" id="tgl_masuk" value="<?php echo $tgl_masuk; ?>" class="validate" readonly/>
                    <label for="tgl_masuk">Tanggal Masuk</label>
                </div>             
            </div>
			<div class="row">
                <div class="input-field col s12">
                    <input type="text" name="tgl_keluar" id="tgl_keluar" class="validate datepicker" />
                    <label for="tgl_keluar">Tanggal Keluar</label>
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
    
    $('.datepicker').datepicker({
      format:'yyyy-mm-dd'
    });
  });
</script>