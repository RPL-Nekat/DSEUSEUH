<div class="row">
  <div class="col-s12 right" style="padding-top: 20px;padding-right: 30px;">
    <a href="<?= base_url('laundry/addlaundry'); ?>" class="btn-floating btn-large btn-waves btn-effect"><i class="fas fa-plus"></i></a>
  </div>
</div>
<div class="row">  
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <table >
          <thead>
            <tr>
                <th>No </th>
                <th>Kode Laundry</th>
                <th>Nama Konsumen</th>
                <th>Harga</th>
                <th>Berat</th>
                <th>Total</th>
                <th>Tanggal Masuk</th>
                <th>Bayar</th>
                <th>Kembalian</th>
                <th>Paket</th>
                <th>Aksi</th>
            </tr>
          </thead>

          <tbody id="show_data">
                    
          </tbody>
        </table>
      </div>
    </div>    
  </div>
</div>

<div id="modalEdit" class="modal modal-fixed-footer">
  <div class="modal-content">    
    <div style="margin-bottom: 50px;">
      <h4>Ambil Laundry</h4>      
    </div>
    <form>
      <div class="input-field col s12">
        <input disabled id="id_laundry" name="id_laundry" type="text" class="validate">
        <label for="id_laundry">Id</label>
      </div>

      <div class="input-field col s12">
        <input id="nama_konsumen" name="nama_konsumen" type="text" class="validate">
        <label for="nama_konsumen">Nama Konsumen</label>
      </div>

      <div class="input-field col s12">
        <input id="harga" name="harga" type="text" class="validate">
        <label for="harga">Harga</label>
      </div>

      <div class="input-field col s12">
        <textarea id="berat" name="berat" class="materialize-textarea"></textarea>
        <label for="berat">Berat</label>
      </div>

      <div class="input-field col s12">
        <textarea id="total" name="total" class="materialize-textarea"></textarea>
        <label for="total">Total</label>
      </div>

      <div class="input-field col s12">
        <textarea id="tgl_masuk" name="tgl_masuk" class="datepicker"></textarea>
        <label for="tgl_masuk">tgl_masuk</label>
      </div>

      <div class="input-field col s12">
        <textarea id="bayar" name="bayar" class="materialize-textarea"></textarea>
        <label for="bayar">Bayar</label>
      </div>

      <div class="input-field col s12">
        <textarea id="kembalian" name="kembalian" class="materialize-textarea"></textarea>
        <label for="kembalian">Kembalian</label>
      </div>

      <div class="input-field col s12">
        <textarea id="nama_paket" name="nama_paket" class="materialize-textarea"></textarea>
        <label for="nama_paket">Nama Paket</label>
      </div>
    </form>
  </div>
  <div class="modal-footer">
    <a href="javascript:void();" class="modal-close waves-effect waves-light btn pink">Batal</a>
    <a href="javascript:void();" class="btn-update waves-effect waves-light btn">Simpan</a>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('.datepicker').datepicker();
    tampilLaundryMasuk();
    function tampilLaundryMasuk() {
      $.ajax({
        type: 'ajax',
        url: '<?= base_url('laundry/dataLaundryMasuk'); ?>',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '';
          var i;
          for (i=0; i<data.length; i++) {
            html += '<tr>' +
                '<th class="center">' + (i+1) + '</th>' +
                '<td>' + data[i].id_laundry + '</td>' +
                '<td>' + data[i].nama_konsumen + '</td>' +
                '<td>Rp. ' + data[i].harga + '</td>' +
                '<td>' + data[i].berat + ' Kg</td>' +
                '<td>' + data[i].total + '</td>' +
                '<td>' + data[i].tgl_masuk + '</td>' +
                '<td>' + data[i].bayar + '</td>' +
                '<td>' + data[i].kembalian + '</td>' +
                '<td>' + data[i].nama_paket + '</td>' +
                '<td>' +
                  '<a href="<?= base_url('laundry/ambillaundry'); ?>" class="btn-floating btn-small btn-waves btn-effect circle btn-ambil" data-id_laundry="' + data[i].id_laundry + '" data-nama_konsumen="' + data[i].nama_konsumen + '" data-harga="' + data[i].harga + '" data-berat="' + data[i].berat + '" data-total="' + data[i].total + '" data-tgl_masuk="' + data[i].tgl_masuk + '" data-bayar="' + data[i].bayar + '" data-kembalian="' + data[i].kembalian + '" data-nama_paket="' + data[i].nama_paket + '"><i class="fa fa-pen"></i></a>' +
                  '<a href="" class="btn-floating btn-small btn-waves btn-effect circle" data-id_laundry="' + data[i].id_laundry + '"><i class="fas fa-trash"></i></a>' +
                '</td>' +
              '</tr>';
              $('#show_data').html(html);    
          }
        }
      });
    }

    $('#show_data').on('click', '.btn-ambil', function() {
      var id_laundry = $(this).data('id_laundry');
      var nama_konsumen = $(this).data('nama_konsumen');
      var harga= $(this).data('harga');
      var berat= $(this).data('berat');
      var total = $(this).data('total');
      var tgl_masuk = $(this).data('tgl_masuk');
      var bayar = $(this).data('bayar');
      var kembalian = $(this).data('kembalian');
      var nama_paket = $(this).data('nama_paket');      

      $('#modalEdit').modal('open');
      $('[name="id_laundry"]').val(id_laundry);
      $('[name="nama_konsumen"]').val(nama_konsumen);
      $('[name="harga"]').val(harga);
      $('[name="berat"]').val(berat);
      $('[name="total"]').val(total);
      $('[name="tgl_masuk"]').val(tgl_masuk);
      $('[name="bayar"]').val(bayar);
      $('[name="kembalian"]').val(kembalian);
      $('[name="nama_paket"]').val(nama_paket);
      M.updateTextFields();
    });    

    $('.btn-update').on('click', function() {
      var id_laundry = $('[name="id_laundry"]').val();
      var nama_konsumen = $('[name="nama_konsumen"]').val();
      var harga= $('[name="harga"]').val();
      var berat= $('[name="berat"]').val();
      var total = $('[name="total"]').val();
      var tgl_masuk = $('[name="tgl_masuk"]').val();
      var bayar = $('[name="bayar"]').val();
      var kembalian = $('[name="kembalian"]').val();
      var nama_paket = $('[name="nama_paket"]').val();
      $.ajax({
        type: 'POST',
        url: '<?= base_url('manual/updateManual'); ?>',
        dataType: 'json',
        data: {'id_laundry': id_laundry, 'nama_konsumen': nama_konsumen, 'harga': harga, 'berat': berat, 'total':total, 'tgl_masuk': tgl_masuk, 'bayar': bayar, 'kembalian': kembalian, 'nama_paket': 'nama_paket'},
        success: function(data) {
          $('[name="id_laundry"]').val('');
          $('[name="nama_konsumen-update"]').val('');
          $('[name="harga"]').val('');
          $('[name="berat"]').val('');
          $('[name="total"]').val('');
          $('[name="tgl_masuk"]').val('');
          $('[name="bayar"]').val('');
          $('[name="kembalian"]').val('');
          $('[name="nama_paket"]').val('');
          $('.modal').modal('close');
          tampilLaundryMasuk();
          M.toast({html: 'Berhasil mengambil laundry'});
        }
      });
      return false;
    });

  });
</script>