 <?php    
    $conn = mysqli_connect("localhost","root","");
    mysqli_select_db($conn,"dseuseuh");     
    ?>
<div class="row center-align">  
  <div class="col s9" style="padding-left: 200px;">
        <h3 class="flow-text">Tambah Data Laundry Masuk</h3>
        <form class="col s12" method="POST" action="<?= base_url('laundry/simpanlaundry'); ?>">
            <!-- <div class="row">
                <div class="input-field col s12">
                  <input name="id_laundry" id="id_laundry" type="text" class="validate">
                  <label for="id_laundry">Kode Laundry</label>
                </div>                
            </div> -->
            <div class="row">
                <div class="input-field col s12">
                  <input name="nama_konsumen" id="nama_konsumen" type="text" class="validate" value="<?= $this->session->nama; ?>">
                  <label for="nama_konsumen">Nama Komsumen</label>
                </div>                
            </div>
            <div class="row">
                <div class="input-field col s12">
                  <select name="status" id="status">
                      <option value="1">Masuk</option>
                    </select>
                  <label for="status">Status</label>
                </div>                
            </div>
            <div class="row">
                <div class="input-field col s12">
                  <select name="paket_id_paket" id="paket_id_paket" onchange="changeValue(this.value)">
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
                  <label for="paket_id_paket">Paket</label>
                </div>                
            </div>
            <div class="row">
                <div class="input-field col s12">
                  <input name="jrsn" id="jrsn" type="text" class="validate" onkeyup="sum();" readonly>
                  <label for="jrsn">Harga</label>
                </div>                
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="brt" id="brt" onkeyup="sum();" class="validate" />
                    <label for="brt">Berat</label>
                </div>             
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="t" id="t" onkeyup="kem();" class="validate" readonly/>
                    <label for="t">Total</label>
                </div>             
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="by" id="by" onkeyup="kem();" class="validate" />
                    <label for="by">Bayar</label>
                </div>             
            </div>
            <div class="row">
                <div class="input-field col s12">
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
<script type="text/javascript">
    // M.updateTextFields();
    <?php echo $jsArray; ?>  
    function changeValue(id_paket){  
    document.getElementById('jrsn').value = dtMhs[id_paket].jrsn;  
    };  

    function sum() {
      var txtFirstNumberValue = document.getElementById('jrsn').value;
      var txtSecondNumberValue = document.getElementById('brt').value;
      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('t').value = result;
      }
    }
    function kem() {
          var txtFirstNumberValue = document.getElementById('by').value;
          var txtSecondNumberValue = document.getElementById('t').value;
          var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
          if (!isNaN(result)) {
             document.getElementById('k').value = result;
          }
    }
  
</script>
