<div class="container bg-light mt-4 mb-4 pb-4">
  <div class="row">
    <div class="col-sm-12">
    <div class="">
      <h2 class="text-center font-weight-bold mt-3">TABLE USER</h2>
      <div class="row">
      <div class="col-sm-12">
          <button
            id="user-add"
            class="w-50 form-inline btn btn-primary mt-2 mb-2 font-weight-bold border border-right-2 border-dark"
            name="button">
            ADD A NEW USER!
          </button><button
            id="user-pwd-update"
            class="w-50 form-inline btn btn-danger mt-2 mb-2 font-weight-bold border border-left-2 border-dark"
            name="button">
            UPDATE YOUR PASSWORD!
          </button>
        </div>
      </div>
      <div class="table-responsive">
      <table id="user-tbl" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Username</th>
            <th>Level</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        foreach ($users as $user) {
         ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $user->name; ?></td>
            <td><?php echo $user->username; ?></td>
            <td><?php echo $user->level; ?></td>
            <td class="text-center">
              <button class="btn btn-danger user-remove" value="<?php echo $user->id; ?>" >
                <span class="ti-trash"></span>
              </button>
            </td>
          </tr> <?php } ?>
        </tbody>
      </table>
      </div>
    </div>

    <?php $this->load->view('forms/update_pwd_modal'); ?>
    </div>
  </div>
</div>
