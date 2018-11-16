<div class="container">
  <div class="card" id="show_data">
    
  </div>
</div>  

<div id="modalEdit" class="modal modal-fixed-footer">
  <div class="modal-content">    
    <div style="margin-bottom: 50px;">
      <h4>Ubah Profil Web</h4>      
    </div>
    <form>
      <div class="input-field col s12">
        <input disabled id="id_web" name="id_web" type="text" class="validate">
        <label for="id_web">Id</label>
      </div>

      <div class="input-field col s12">
        <input id="nama" name="nama" type="text" class="validate">
        <label for="nama">Nama Web</label>
      </div>

      <div class="input-field col s12">
        <textarea id="deskripsi" name="deskripsi" class="materialize-textarea"></textarea>
        <label for="deskripsi">Deskripsi</label>
      </div>

      <div class="input-field col s12">
        <input id="kontak" name="kontak" type="text" class="validate">
        <label for="kontak">Kontak</label>
      </div>

      <div class="input-field col s12">
        <input id="alamat" name="alamat" type="text" class="validate">
        <label for="alamat">Alamat</label>
      </div>

      <div class="input-field col s12">
        <input id="tentang_kami" name="tentang_kami" type="text" class="validate">
        <label for="tentang_kami">Tentang Kami</label>
      </div>

    </form>
  </div>
  <div class="modal-footer">
    <a href="javascript:void();" class="modal-close waves-effect waves-light btn pink">Batal</a>
    <a href="javascript:void();" class="btn-update waves-effect waves-light btn">Simpan</a>
  </div>
</div>

<div id="modalDelete" class="modal">
  <div class="modal-content center-align">    
    <div style="margin-bottom: 50px;">
      <h4>Hapus Manual?</h4>      
    </div>
    <p>Yakin akan menghapus <span id="nama-del"></span></p>
    <input disabled id="id_web" name="id_web" type="hidden">
    <div class="row">
      <a href="javascript:void();" class="modal-close waves-effect waves-light btn pink col s12 m6">Batal</a>
      <a href="javascript:void();" class="btn-del waves-effect waves-light btn col s12 m6">Hapus</a>
    </div>
  </div>    
</div>

<script type="text/javascript">
  $(document).ready(function() {
    M.AutoInit();
    tampilInfo();

    //fungsi tampil data langsung
    function tampilInfo() {
      $.ajax({
        type: 'ajax',
        url: '<?= base_url('web_info/dataWeb'); ?>',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '';
          var i;
          for (i=0; i<data.length; i++) {
            html += '<div class="card-content">' +
                      '<h4 class="header">' + data[i].nama + '<a href="javascript:void();" class="btn waves-effect waves-light pink right item_edit" data-id_web="' + data[i].id_web + '" data-nama="' + data[i].nama + '" data-deskripsi="' + data[i].deskripsi + '" data-kontak="' + data[i].kontak + '" data-alamat="' + data[i].alamat + '" data-tentang_kami="' + data[i].tentang_kami + '">Ubah Profil</a></h4>' +
                      '<p>' + data[i].deskripsi + '</p>' +
                    '</div>' +
                    '<ul class="collection">' +
                      '<li class="collection-item">' +
                        '<p><i class="fas fa-phone fa-2x blue-text" data-fa-transform="down-3"></i>' + data[i].kontak + '</p>' +
                      '</li>' +
                      '<li class="collection-item">' +
                        '<p><i class="fas fa-map-marker-alt fa-2x red-text" data-fa-transform="down-3"></i>' + data[i].alamat + '</p>' +
                      '</li>' +
                      '<li class="collection-item">' +
                        '<p>' + data[i].tentang_kami + '</p>' +
                      '</li>' +
                    '</ul>';                    
          }
          $('#show_data').html(html);
        }
      });
    }
   

    //fungsi ngambil value untuk diedit
    $('#show_data').on('click', '.item_edit', function() {
      var id_web = $(this).data('id_web');
      var nama = $(this).data('nama');
      var deskripsi = $(this).data('deskripsi');
      var kontak = $(this).data('kontak');
      var alamat = $(this).data('alamat');
      var tentang_kami = $(this).data('tentang_kami');

      $('#modalEdit').modal('open');
      $('[name="id_web"]').val(id_web);
      $('[name="nama"]').val(nama);
      $('[name="deskripsi"]').val(deskripsi);
      $('[name="kontak"]').val(kontak);
      $('[name="alamat"]').val(alamat);
      $('[name="tentang_kami"]').val(tentang_kami);
      M.updateTextFields();
    });    

    //fungsi update
    $('.btn-update').on('click', function() {
      var id_web = $('[name="id_web"]').val();
      var nama = $('[name="nama"]').val();
      var deskripsi = $('[name="deskripsi"]').val();
      var kontak = $('[name="kontak"]').val();
      var alamat = $('[name="alamat"]').val();
      var tentang_kami = $('[name="tentang_kami"]').val();
      $.ajax({
        type: 'POST',
        url: '<?= base_url('web_info/updateWeb'); ?>',
        dataType: 'json',
        data: {'id_web': id_web, 'nama': nama, 'deskripsi': deskripsi, 'kontak': kontak, 'alamat': alamat, 'tentang_kami': tentang_kami},
        success: function(data) {
          $('[name="id_web"]').val('');
          $('[name="nama"]').val('');
          $('[name="deskripsi"]').val('');
          $('[name="kontak"]').val('');
          $('[name="alamat"]').val('');
          $('[name="tentang_kami"]').val('');
          $('.modal').modal('close');
          tampilInfo();
          M.toast({html: 'Berhasil mengubah'});
        }
      });
      return false;
    });

    //fungsi ngambil value untuk delete
    $('#show_data').on('click', '.item_delete', function() {
      var id_web = $(this).data('id_web');
      var nama = $(this).data('nama');

      $('#modalDelete').modal('open');
      $('#nama-del').html('<strong>' + nama + '</strong>');
      $('#id_web').val(id_web);
    });

    $('.btn-del').on('click', function() {
      var id_web = $('#id_web').val();
      $.ajax({
        type: 'post',
        url: '<?= base_url('manual/hapusManual'); ?>',
        dataType: 'json',
        data: {'id_web': id_web},
        success: function(data) {
          $('#id_web').val("");
          $('#modalDelete').modal('close');
          tampilManual();
          M.toast({html: 'Berhasil menghapus'});
        }
      });
      return false;
    });
  });
</script>