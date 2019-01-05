<div class="row">
  <div class="col-s12 right" style="padding-top: 20px;padding-right: 30px;">
    <a href="<?= base_url('laundry/addlaundrykeluar'); ?>" class="btn-floating btn-large btn-waves btn-effect"><i class="fas fa-plus"></i></a>
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
                <th>Tanggal Keluar</th>
                <th>Bayar</th>
                <th>Kembalian</th>
                <th>Paket</th>
            </tr>
          </thead>

          <tbody id="show_data">
                    
          </tbody>
        </table>
      </div>
    </div>    
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    tampilLaundryKeluar();
    function tampilLaundryKeluar() {
      $.ajax({
        type: 'ajax',
        url: '<?= base_url('laundry/dataLaundryKeluar'); ?>',
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
                '<td>' + data[i].tgl_keluar + '</td>' +
                '<td>' + data[i].bayar + '</td>' +
                '<td>' + data[i].kembalian + '</td>' +
                '<td>' + data[i].nama_paket + '</td>' +
              '</tr>';
              $('#show_data').html(html);    
          }
        }
      });
    }
  });
</script>