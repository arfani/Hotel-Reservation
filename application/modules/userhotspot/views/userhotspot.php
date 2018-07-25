<div class="container bg-light mt-4 mb-4 pb-4">
  <div class="row">
    <div class="col-sm-12">
    <div class="w-100 h-100">
      <h2 class="text-center font-weight-bold mt-3 mb-4">List User Hotspot</h2>
      <div class="table-responsive">
      <table id="user-tbl" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Server</th>
            <th>Name</th>
            <th>Password</th>
            <th>Profile</th>
            <th>Uptime</th>
            <th>Comment</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $ind = 1;
        foreach ($users as $user) {
          // echo '<pre>';
          // print_r($users);
          // echo '</pre>';
         ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php if(isset($user['server'])){ echo $user['server']; }else{ echo ''; } ?></td>
            <td><?php echo $user['name']; ?></td>
            <td><?php if(isset($user['password'])){ echo $user['password']; }else{ echo ''; }  ?></td>
            <td><?php if(isset($user['profile'])){ echo $user['profile']; }else{ echo ''; }  ?></td>
            <td><?php echo $user['uptime']; ?></td>
            <td><?php if(isset($user['comment'])){ echo $user['comment']; }else{ echo ''; }  ?></td>
            <td><?php echo ($user['disabled'] == 'false' ) ? 'Active' : 'Disabled'; ?></td>
            <td class="text-center">
              <button class="qrcode-show btn btn-primary font-weight-bold text-white" value="<?php echo $user['.id']; ?>" >
                <span class="ti-pencil">
                </span>
              </button>
              <button class="btn btn-danger user-remove" value="<?php echo $user['.id']; ?>" >
                <span class="ti-trash"></span>
              </button>
            </td>
          </tr> <?php } ?>
        </tbody>
      </table>
      </div>
    </div>

    <?php $this->load->view('forms/qrcode_modal'); ?>
    </div>
  </div>
</div>
