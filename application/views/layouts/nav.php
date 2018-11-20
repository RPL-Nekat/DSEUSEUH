<nav class="transparent" role="navigation">
  <div class="nav-wrapper">
    <a id="logo-container" href="<?= base_url() ?>" class="brand-logo"><?= $nama; ?></a>
    <ul class="right hide-on-med-and-down">      
      <li><a class="scroll_to" href="#manual">Panduan Pemesanan</a></li>
      <li><a class="scroll_to" href="#services">Servis</a></li>      
      <li><a class="scroll_to" href="#contact">Kontak</a></li>
      <li><a class="scroll_to" href="#about">Tentang Kami</a></li>
      <?php if ($this->session->username != null): ?>
        <li><a href="#" class="dropdown-trigger" data-target="dropdown1"><?= $this->session->nama_usr; ?> <i class="material-icons right">arrow_drop_down</i></a></li>
      <?php else: ?>
        <li><a href="<?= base_url('auth') ?>" class="btn waves-effect waves-light grey lighten-5 pink-text text-darken-1 scroll_to" style="z-index: 0;">Join Us</a></li>
      <?php endif ?>      
    </ul>

    <ul id="dropdown1" class="dropdown-content">
      <?php if ($this->session->level == 'admin'): ?>
        <li><a href="<?= base_url('dashboard'); ?>"><i class="material-icons">dashboard</i>Dashboard</a></li>
      <?php endif ?>      
      <li><a href="<?= base_url('auth/profil'); ?>"><i class="material-icons">account_circle</i> Profil</a></li>
      <?php if ($this->session->level == 'admin'): ?>
        <li><a href="<?= base_url('web_info'); ?>"><i class="material-icons">settings</i> Pengaturan</a></li>
      <?php endif ?>
      <li><a href="<?= base_url('auth/logout'); ?>"><i class="material-icons">power_settings_new</i>Logout</a></li>
    </ul>

    <ul id="nav-mobile" class="sidenav">
      <li><a href="#">Tentang Kamu</a></li>
      <li><a href="#">Servis</a></li>
      <li><a href="#">Kontak</a></li>
      <?php if ($this->session->username != null): ?>        
        <li><a href="#" class="btn waves-effect waves-light"><?= $this->session->nama_usr; ?></a></li>
      <?php else: ?>
        <li><a href="<?= base_url('auth') ?>" class="btn waves-effect waves-pink grey lighten-5 pink-text text-darken-1">Join Us</a></li>
      <?php endif ?>      
    </ul>
    <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="fas fa-bars fa-2x" data-fa-transform="down-3" style="color: #fafafa;"></i></a>
  </div>
</nav>


<script type="text/javascript">
  $(document).ready(function() {
    $('.dropdown-trigger').dropdown({hover: true, coverTrigger: false});
  });
</script>