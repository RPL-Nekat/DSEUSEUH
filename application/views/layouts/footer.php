  <footer class="page-footer teal" id="about">
    <div class="container">
      <div class="row">
        <div class="col l4 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4"><?= $tentang_kami; ?></p>
          <a href="<?= base_url('home/about') ?>" class="btn waves-effect waves-light">Tentang kami</a>
        </div>
        <div class="col l4 s12">
          <h5 class="white-text">Our Team</h5>
          <ul>
            <li><a class="white-text" href="#!">Akhdan Musyaffa Firdaus</a></li>
            <li><a class="white-text" href="#!">Anisa Oktaviani Rusmana</a></li>
            <li><a class="white-text" href="#!">Eka Lestari</a></li>
            <li><a class="white-text" href="#!">Fitri Nuraeni</a></li>
            <li><a class="white-text" href="#!">Nining Nurfadilah</a></li>
            <li><a class="white-text" href="#!">Yuni Nurlela</a></li>
          </ul>
        </div>
        <div class="col l4 s12">
          <form method="POST" action="<?= base_url('feedback/save'); ?>">
            <div class="row">
              <div class="input-field col s12">
                <input name="subject" type="text" id="subject" class="validate">
                <label for="subject">Subject</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea name="message" id="message" class="materialize-textarea" data-length="120"></textarea>
                <label for="message">Message</label>
              </div>
            </div>            
            <button type="submit" class="btn waves-effect waves-light">Kirim Pesan!</button>            
          </form>
        </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made with <span class="fas fa-heart fa-lg red-text"></span> <a class="brown-text text-lighten-3" href="<?= base_url('about') ?>">by Group 6</a>
      </div>
    </div>
  </footer>