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
                <td><?= $laundry->tgl_keluar?></td>
                <td><?= $laundry->bayar; ?></td>
                <td><?= $laundry->kembalian; ?></td>
                <td><?= $laundry->paket_id_paket; ?></td>
              </tr>
            <?php endforeach ?>            
          </tbody>
        </table>
      </div>
    </div>    
   <div class="btn btn-success"><a href="<?php echo site_url('Laporan/cetak_semua') ?>">Cetak</a></div>
  </div>
</div>