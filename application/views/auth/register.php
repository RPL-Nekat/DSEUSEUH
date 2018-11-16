<div class="row header-content valign-wrapper">  
  <div class="col s12 m6 l6 offset-m6 offset-l6">
    <div class="row">
      <form class="col s12" method="POST" action="<?= base_url('auth/daftar') ?>">
        <div class="card-panel white">          
          <div class="row">
            <div class="input-field col s12">
              <input name="nama" id="nama" type="text" class="validate">
              <label for="nama">Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input name="username" id="username" type="text" class="validate">
              <label for="username">Username</label>
            </div>
            <div class="input-field col s6">
              <input name="password" id="password" type="password" class="validate">
              <label for="password">Password</label>                
            </div>
          </div>            
          <div class="row">
            <div class="input-field col s12">
              <input name="email" id="email" type="email" class="validate">
              <label for="email">Email</label>
              <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea name="alamat" id="alamat" class="materialize-textarea"></textarea>
              <label for="alamat">Alamat</label>
            </div>
          </div>
          <div class="row right-align">
            <div class="col s12">
              <a href="<?= base_url('auth') ?>" class="btn-flat waves-effect waves-teal">Sudah Punya Akun?</a>
              <button type="reset" class="btn waves-effect waves-light">Reset</button>
              <button type="submit" class="btn waves-effect waves-light">Register Now</button>
            </div>
          </div>
        </div>            
      </form>
    </div>
  </div>
</div>  