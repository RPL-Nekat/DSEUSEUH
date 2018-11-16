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

          <tbody>
            <?php foreach ($lndry as $key => $laundry): ?>
              <tr>
                <th class="center"><?= $key+1; ?></th>
                <td><?= $laundry->id_laundry; ?></td>
                <td><?= $laundry->nama_konsumen; ?></td>
                <td>Rp. <?= number_format($laundry->harga); ?></td>
                <td><?= number_format($laundry->berat); ?></td>
                <td><?= number_format($laundry->total); ?></td>
                <td><?= $laundry->tgl_masuk; ?></td>
                <td><?= $laundry->bayar; ?></td>
                <td><?= $laundry->kembalian; ?></td>
                <td><?= $laundry->paket_id_paket; ?></td>
                <td>
                  <a href="<?php echo base_url('laundry/ambillaundry/');?><?= $laundry->id_laundry; ?>" class="btn-floating btn-small btn-waves btn-effect circle"><i class="fa fa-pen"></i></a>
                  <a href="<?php echo base_url('laundry/deletelaundry/'); ?><?= $laundry->id_laundry; ?>" class="btn-floating btn-small btn-waves btn-effect circle" onclick="return confirm('anda yakin akan menghapus data ini');"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
            <?php endforeach ?>            
          </tbody>
        </table>
      </div>
    </div>    
  </div>
</div>