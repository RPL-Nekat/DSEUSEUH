<div class="row">
  <div class="col-s12 right">
    <!-- <a href="" class="btn-floating btn-large btn-waves btn-effect circle" ><i class="fas fa-pen"></i></a> -->
    <a href="<?= base_url('paket/addPaket'); ?>" class="btn-floating btn-large btn-waves btn-effect"><i class="fas fa-plus"></i></a>
  </div>
</div>
<div class="row">  
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <table >
          <thead>
            <tr>
                <th width="5%" class="center">#</th>
                <th width="20%">Nama</th>
                <th width="55%">Deskripsi</th>
                <th width="10%">Harga</th>
                <th width="10%">Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($pakets as $key => $paket): ?>
              <tr>
                <th class="center"><?= $key+1; ?></th>
                <td><?= $paket->nama_paket; ?></td>
                <td><?= $paket->deskripsi_paket; ?></td>
                <td>Rp. <?= number_format($paket->harga); ?></td>
                <td>
                  <a href="<?php echo base_url('paket/editpaket/');?><?= $paket->id_paket; ?>" class="btn-floating btn-small btn-waves btn-effect circle"><i class="fa fa-pen"></i></a>
                  <a href="<?php echo base_url('paket/deletepaket/'); ?><?= $paket->id_paket; ?>" class="btn-floating btn-small btn-waves btn-effect circle" onclick="return confirm('anda yakin akan menghapus data ini');"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
            <?php endforeach ?>            
          </tbody>
        </table>
      </div>
    </div>    
  </div>
</div>