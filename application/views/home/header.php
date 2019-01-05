<div class="home">
  <div class="section scrollspy">
    <?php $this->load->view('layouts/nav') ?>
  
    <div class="row header-content">
      <div class="col s12 m5 l5">
        <?php if ($this->session->nama_usr != null): ?>
          <ul class="card collapsible black-text">
            <li class="active">
              <div class="collapsible-header"><i class="material-icons">filter_drama</i>Cucianku</div>
              <div class="collapsible-body">
                <a class="waves-effect waves-light btn modal-trigger" href="#orderCucian">Cuci Sekarang</a>
              </div>
            </li>
            <li>
              <div class="collapsible-header"><i class="material-icons">place</i>Second</div>
              <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
            </li>
            <li>
              <div class="collapsible-header"><i class="material-icons">account_circle</i>Profilku</div>
              <div class="collapsible-body">                  
                <p><span>Nama   : </span><?= $this->session->nama_usr; ?></p>
                <p><span>Telp   : </span><?= $this->session->no_telp; ?></p>                  
                <p><span>Email  :</span><?= $this->session->email; ?></p>
              </div>
            </li>
          </ul>
        <?php else: ?>
          <h3>Clean up your live</h3>
          <p><?= $deskripsi; ?></p>
          <a href="<?= base_url('auth') ?>" class="btn btn-large waves-effect waves-pink grey lighten-5 pink-text text-darken-1" style="z-index: 0;">Join Us</a>
        <?php endif ?>        
      </div>
      <div class="col s12 m7 l7">
        <div class="carousel carousel-slider center z-depth-5">          
          <div class="carousel-item red white-text" href="#one!">
            <img src="<?= base_url('assets/img/laundry/1.jpg') ?>" class="responsive-img materialboxed" style="z-index: 99999;">
            <!-- <h2>First Panel</h2>
            <p class="white-text">This is your first panel</p> -->
          </div>
          <div class="carousel-item amber white-text z-depth-5" href="#two!">
            <img src="<?= base_url('assets/img/laundry/2.jpg') ?>" class="responsive-img materialboxed" style="z-index: 99999;">
            <!-- <h2>Second Panel</h2>
            <p class="white-text">This is your second panel</p> -->
          </div>
          <div class="carousel-item green white-text z-depth-5" href="#three!">
            <img src="<?= base_url('assets/img/laundry/3.jpg') ?>" class="responsive-img materialboxed" style="z-index: 99999;">
            <!-- <h2>Third Panel</h2>
            <p class="white-text">This is your third panel</p> -->
          </div>
          <div class="carousel-item blue white-text z-depth-5" href="#four!">
            <img src="<?= base_url('assets/img/laundry/4.jpg') ?>" class="responsive-img materialboxed" style="z-index: 99999;">
            <!-- <h2>Fourth Panel</h2>
            <p class="white-text">This is your fourth panel</p> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>      

  <!-- Modal Structure -->
  <div id="orderCucian" class="modal">
    <div class="modal-content">
      <?php $this->load->view('auth/dashboard/laundry/form_masuk'); ?>
    </div>
  </div>