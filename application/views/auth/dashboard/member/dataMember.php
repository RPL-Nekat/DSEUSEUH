<div class="row">
  <div class="col-s12 right">
    <!-- <a href="" class="btn-floating btn-large btn-waves btn-effect circle" ><i class="fas fa-pen"></i></a> -->
    <a href="<?= base_url('member/addMember'); ?>" class="btn-floating btn-large btn-waves btn-effect"><i class="fas fa-plus"></i></a>
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
                <th width="20%">Kode Member</th>
                <th width="55%">Nama Member</th>
                <th width="10%">No Telepon</th>
                <th width="10%">Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($users as $key => $user): ?>
              <tr>
                <th class="center"><?= $key+1; ?></th>
                <td><?= $user->id_user; ?></td>
                <td><?= $user->nama_usr; ?></td>
                <td><?= $user->no_telp; ?></td>
                <td>
                  <a href="<?php echo base_url('member/editAdmin/');?><?= $user->id_user; ?>" class="btn-floating btn-small btn-waves btn-effect circle"><i class="fa fa-pen"></i></a>
                  <a href="<?php echo base_url('member/deleteAdmin/'); ?><?= $user->id_user; ?>" class="btn-floating btn-small btn-waves btn-effect circle" onclick="return confirm('anda yakin akan menghapus data ini');"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
            <?php endforeach ?>            
          </tbody>
        </table>
      </div>
    </div>    
  </div>
</div>