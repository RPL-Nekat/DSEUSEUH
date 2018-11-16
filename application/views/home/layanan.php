<div class="container">
  <div class="section" id="services">

    <!--   Icon Section   -->
    <div class="row">
      <div class="col s12 m4">
        <div class="icon-block">
          <h2 class="center blue-text"><i class="fas fa-tint fa-2x"></i></h2>
          <h5 class="center">Ramah Lingkungan</h5>

          <p class="light">Kami menggunakan produk yang tidak merusak pakaian maupun lingkungan.</p>
        </div>
      </div>

      <div class="col s12 m4">
        <div class="icon-block">
          <h2 class="center yellow-text"><i class="fas fa-bolt fa-2x"></i></h2>
          <h5 class="center">Pelayanan Cepat</h5>

          <p class="light">Kami berkomitmen untuk memberikan pelayanan terbaik dan terpercaya.</p>
        </div>
      </div>

      <div class="col s12 m4">
        <div class="icon-block">
          <h2 class="center brown-text"><i class="fas fa-shipping-fast fa-2x"></i></h2>
          <h5 class="center">Layanan Antar Jemput</h5>

          <p class="light">Terlalu sibuk dan tak sempat mengurus cucian anda? Panggil saja kami, kami siap melayani di jam kerja anda.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col s12 center">
        <a href="#modalLayanan" class="btn waves-effect waves-light modal-trigger">Lihat Layanan Kami</a>
      </div>
    </div>
  </div>
</div>

<div id="modalLayanan" class="modal bottom-sheet">
  <div class="modal-content">    
    <div style="margin-bottom: 50px;" class="center-align">
      <h4>Layanan Kami</h4>      
    </div>
    <div class="row">
    <?php foreach ($pakets as $key => $paket): ?>
      <ul class="collection">
        <li class="collection-item">
          <span class="title"><?= $paket->nama_paket; ?></span>
          <p><?= $paket->deskripsi_paket; ?> <br><strong>IDR. <?= number_format($paket->harga); ?></strong></p>
        </li>
      </ul>
    <?php endforeach ?>      
    </div>
  </div>
  <div class="modal-footer">
    <a href="javascript:void();" class="modal-close waves-effect waves-light btn pink">Tutup</a>
    <a href="javascript:void();" class="btn-update waves-effect waves-light btn">Cuci Sekarang</a>
  </div>
</div>