<div class="row header-content valign-wrapper">    
  <div class="col s12 m6 l6 offset-m6 offset-l6">                
    <div class="row">
      <form class="col s12" method="POST" action="<?= base_url('auth/login'); ?>">
        <div class="card-panel white">
          <div class="row center-align">
            <img src="<?= base_url('assets/img/avatar/user.png') ?>" class="responsive-img" width="128px">
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input name="username" id="username" type="text" class="validate">
              <label for="username">Username</label>
            </div>                
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input name="password" id="password" type="password" class="validate">
              <label for="password">Password</label>
            </div>
          </div>
          <div class="row">
    <!--         <div class="col s12 m6">
              <label>
                <input type="checkbox" />
                <span>Remember me</span>
              </label>                                                   
            </div> -->
            <button type="submit" class="btn waves-effect waves-light col s12">Login</button>                
          </div>              
          <div class="row">                                
            <a href="<?= base_url('auth/register') ?>" class="btn-flat waves-effect waves-teal col s12">Belum Punya Akun?</a>
          </div>
        </div>          
      </form>
    </div>        
  </div>
</div>