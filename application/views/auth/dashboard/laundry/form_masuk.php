 <?php    
    $conn = mysqli_connect("localhost","root","");
    mysqli_select_db($conn,"dseuseuh");     
    ?>
<form class="col s12" method="POST" action="<?= base_url('laundry/simpanlaundry'); ?>">
<div class="row center-align">  
  <h3 class="flow-text">Tambah Data Laundry Masuk</h3>
  <div class="col offset-s1 s6">                
            <div class="row">
                <div class="input-field col s12">
                  <?php if ($this->session->level == 'customer'): ?>
                    <input name="nama_konsumen" id="nama_konsumen" type="text" class="validate" value="<?= $this->session->nama_usr; ?>">  
                  <?php else: ?>
                      <input name="nama_konsumen" id="nama_konsumen" type="text" class="validate" value="">
                  <?php endif ?>                  
                  <label for="nama_konsumen">Nama Konsumen</label>
                </div>                
            </div>            
            <div class="row">
                <div class="input-field col s12">
                  <select name="id_paket" id="id_paket" onchange="changeValue(this.value)">
                      <option value=0>-Pilih Paket-</option>
                      <?php 
                    $result = mysqli_query($conn,"select * from paket");    
                    $jsArray = "var dtMhs = new Array();\n";        
                    while ($row = mysqli_fetch_array($result)) {    
                        echo '<option value="' . $row['id_paket'] . '">' . $row['nama_paket'] . '</option>';    
                        $jsArray .= "dtMhs['" . $row['id_paket'] . "'] = {jrsn:'".addslashes($row['harga'])."'};";    
                    }      
                ?>
                    </select>
                  <label for="id_paket">Paket</label>
                </div>                
            </div>            
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="brt" id="brt" onkeyup="sum();" class="validate" />
                    <label for="brt">Berat per KG</label>
                </div>             
            </div>
            <div class="card">
              <div class="card-content">
                    <div class="row">
                      <div class="input-field col s6">
                          <input type="text" name="by" id="by" onkeyup="kem();" class="validate" />
                          <label for="by">Bayar</label>
                      </div>
                      <div class="input-field col s6">
                          <input type="text" name="k" id="k" class="validate" />
                          <label for="k">Kembalian</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                          <input type="text" name="tgl_masuk" id="tgl_masuk" class="validate datepicker" />
                          <label for="tgl_masuk">Tanggal Masuk</label>
                      </div>
                    </div>
                    <div class="row right-align">
                        <button class="waves-effect waves-light btn-small">Simpan</button>
                    </div>
              </div>
            </div>        
  </div>
  <div class="col s4">
    <h3 class="flow-text">Detail</h3>
    <div class="card">
      <div class="card-content">
        <div class="input-field">
          <input name="kode_laundry" id="kode_laundry" type="text" class="validate" value="<?= substr(md5(uniqid(mt_rand(), true)) , 0, 8); ?>">
          <label for="kode_laundry">Kode Laundry</label>
        </div>
        <div class="input-field">
          <input name="jrsn" id="jrsn" type="text" class="validate" onkeyup="sum();" readonly>
          <label for="jrsn">Harga Paket </label>
        </div>
        <div class="input-field">
            <input type="text" name="t" id="t" onkeyup="kem();" class="validate" readonly>
            <label for="t">Total</label>
        </div>                
      </div>
    </div>
  </div>
</div>
</form>
<script type="text/javascript">
    $(document).ready(function(){
    $('select').formSelect();
    
    $('.datepicker').datepicker({
      format:'yyyy-mm-dd'
    });
  });
</script>
<script type="text/javascript">    
    <?php echo $jsArray; ?>  
    function changeValue(id_paket){  
      document.getElementById('jrsn').value = dtMhs[id_paket].jrsn;  
      M.updateTextFields();
    };  

    function sum() {
      var txtFirstNumberValue = document.getElementById('jrsn').value;
      var txtSecondNumberValue = document.getElementById('brt').value;
      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('t').value = result;
      }
      M.updateTextFields();
    }
    function kem() {
      var txtFirstNumberValue = document.getElementById('by').value;
      var txtSecondNumberValue = document.getElementById('t').value;
      var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('k').value = result;
      }
      M.updateTextFields();
    }
  
</script>
