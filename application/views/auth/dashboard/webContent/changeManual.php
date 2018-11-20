<form>
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h3>Edit Panduan <a href="#modalAdd" class="btn-floating waves-effect waves-light modal-trigger"><i class="material-icons">add</i></a></h3>        

        <table class="striped" id="mydata">
          <thead>
            <tr>
              <th>Header</th>
              <th>Subheader</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody id="show_data">

          </tbody>
        </table>
      </div>
    </div>
  </div>
</form>

<div id="modalAdd" class="modal modal-fixed-footer">
  <div class="modal-content">    
    <div style="margin-bottom: 50px;">
      <h4>Tambah Manual</h4>
    </div>
    <form>
      <div class="input-field col s12">
        <input id="header-simpan" name="header-simpan" type="text" class="validate">
        <label for="header-simpan">Header</label>
      </div>

      <div class="input-field col s12">
        <input id="subheader-simpan" name="subheader-simpan" type="text" class="validate">
        <label for="subheader-simpan">Subheader</label>
      </div>

      <div class="input-field col s12">
        <textarea id="deskripsi-simpan" name="deskripsi-simpan" class="materialize-textarea"></textarea>
        <label for="deskripsi-simpan">Deskripsi</label>
      </div>

    </form>
  </div>
  <div class="modal-footer">
    <a href="javascript:void();" class="modal-close waves-effect waves-light btn pink">Batal</a>
    <a href="javascript:void();" class="btn-save waves-effect waves-light btn">Simpan</a>
  </div>
</div>

<div id="modalEdit" class="modal modal-fixed-footer">
  <div class="modal-content">    
    <div style="margin-bottom: 50px;">
      <h4>Edit Manual</h4>      
    </div>
    <form>
      <div class="input-field col s12">
        <input disabled id="id_manual" name="id_manual" type="text" class="validate">
        <label for="id_manual">Id</label>
      </div>

      <div class="input-field col s12">
        <input id="header-update" name="header-update" type="text" class="validate">
        <label for="header-update">Header</label>
      </div>

      <div class="input-field col s12">
        <input id="subheader-update" name="subheader-update" type="text" class="validate">
        <label for="subheader-update">Subheader</label>
      </div>

      <div class="input-field col s12">
        <textarea id="deskripsi-update" name="deskripsi-update" class="materialize-textarea"></textarea>
        <label for="deskripsi-update">Deskripsi</label>
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
    <p>Yakin akan menghapus <span id="header-del"></span></p>
    <input disabled id="id_manual" name="id_manual" type="hidden">
    <div class="row">
      <a href="javascript:void();" class="modal-close waves-effect waves-light btn pink col s12 m6">Batal</a>
      <a href="javascript:void();" class="btn-del waves-effect waves-light btn col s12 m6">Hapus</a>
    </div>
  </div>    
</div>

<script type="text/javascript">
  $(document).ready(function() {
    M.AutoInit();    
    tampilManual();
    // addForm();
    
    // $('#mydata').dataTable();
    // $('select').formSelect();

    //fungsi tampil data langsung
    function tampilManual() {
      $.ajax({
        type: 'ajax',
        url: '<?= base_url('manual/dataManual'); ?>',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '';
          var i;
          for (i=0; i<data.length; i++) {
            html += '<tr>' +
            '<td>' + data[i].header + '</td>' +
            '<td>' + data[i].subheader + '</td>' +
            '<td>' + data[i].deskripsi + '</td>' +
            '<td>' + 
            '<a href="javascript:void();" class="btn-floating waves-effect waves-light item_edit yellow" data-id="' + data[i].id_manual + '" data-header="' + data[i].header + '" data-subheader="' + data[i].subheader + '" data-deskripsi="' + data[i].deskripsi + '"><i class="material-icons">edit</i></a>' +
            '<a href="javascript:void();" class="btn-floating waves-effect waves-light item_delete pink" data-id="' + data[i].id_manual + '" data-header="' + data[i].header + '" style="margin-left: 10px;"><i class="material-icons">delete</i></a>' +
            '</td>' +
            '</tr>';
          }
          $('#show_data').html(html);
        }
      });
    }

    //fungsi simpan
    $('.btn-save').on('click', function() {
      var header = $('[name="header-simpan"]').val();
      var subheader = $('[name="subheader-simpan"]').val();
      var deskripsi = $('[name="deskripsi-simpan"]').val();
      $.ajax({
        type: 'POST',
        url: '<?= base_url('manual/simpanManual'); ?>',
        dataType: 'json',
        data: {'header': header, 'subheader':subheader, 'deskripsi': deskripsi},
        success: function(data) {
          $('[name="header-simpan"]').val('');
          $('[name="subheader-simpan"]').val('');
          $('[name="deskripsi-simpan"]').val('');
          $('.modal').modal('close');
          tampilManual();
          M.toast({html: 'Berhasil menambahkan'});
        }
      });
      return false;
    });

    //fungsi ngambil value untuk diedit
    $('#show_data').on('click', '.item_edit', function() {
      var id_manual = $(this).data('id');
      var header = $(this).data('header');
      var subheader = $(this).data('subheader');
      var deskripsi = $(this).data('deskripsi');

      $('#modalEdit').modal('open');
      $('[name="id_manual"]').val(id_manual);
      $('[name="header-update"]').val(header);
      $('[name="subheader-update"]').val(subheader);
      $('[name="deskripsi-update"]').val(deskripsi);
      M.updateTextFields();
    });    

    //fungsi update
    $('.btn-update').on('click', function() {
      var id_manual = $('[name="id_manual"]').val();
      var header = $('[name="header-update"]').val();
      var subheader = $('[name="subheader-update"]').val();
      var deskripsi = $('[name="deskripsi-update"]').val();
      $.ajax({
        type: 'POST',
        url: '<?= base_url('manual/updateManual'); ?>',
        dataType: 'json',
        data: {'id_manual': id_manual, 'header': header, 'subheader': subheader, 'deskripsi': deskripsi},
        success: function(data) {
          $('[name="id_manual"]').val('');
          $('[name="header-update"]').val('');
          $('[name="subheader-update"]').val('');
          $('[name="deskripsi-update"]').val('');
          $('.modal').modal('close');
          tampilManual();
          M.toast({html: 'Berhasil mengubah'});
        }
      });
      return false;
    });

    //fungsi ngambil value untuk delete
    $('#show_data').on('click', '.item_delete', function() {
      var id_manual = $(this).data('id');
      var header = $(this).data('header');

      $('#modalDelete').modal('open');
      $('#header-del').html('<strong>' + header + '</strong>');
      $('#id_manual').val(id_manual);
    });

    $('.btn-del').on('click', function() {
      var id_manual = $('#id_manual').val();
      $.ajax({
        type: 'post',
        url: '<?= base_url('manual/hapusManual'); ?>',
        dataType: 'json',
        data: {'id_manual': id_manual},
        success: function(data) {
          $('#id_manual').val("");
          $('#modalDelete').modal('close');
          tampilManual();
          M.toast({html: 'Berhasil menghapus'});
        }
      });
      return false;
    });
  });
</script>