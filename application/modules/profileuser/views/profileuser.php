<div class="container bg-light mt-4 mb-4 pb-4">
  <div class="row">
    <div class="col-sm-12">
    <div class="w-100 h-100">
      <h2 class="text-center font-weight-bold mt-3">Profile User Hotspot</h2>
      <button
      id="profile-add"
      class="form-control btn btn-primary mb-2 mt-2 font-weight-bold"
      type="button" name="button">
      ADD A NEW PROFILE!
    </button>
      <div class="table-responsive">
      <table id="profile-tbl" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Shared Users</th>
            <th>Rate Limit</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $ind = 1;
        foreach ($profiles as $profile) {
         ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $profile['name']; ?></td>
            <td><?php echo $profile['shared-users']; ?></td>
            <td><?php if (isset($profile['rate-limit'])) { echo $profile['rate-limit']; } else { echo '';} ?></td>
            <td class="text-center">
              <button class="profile-edit btn btn-primary btn-sm" value="<?php echo $profile['.id']; ?>" <?php echo ($no == 2) ? 'disabled' : ''; ?>>
                <span class="fa fa-pencil">
                </span>
              </button>
              <button class="profile-remove btn btn-danger btn-sm" value="<?php echo $profile['.id']; ?>" <?php echo ($no == 2) ? 'disabled' : ''; ?>>
                <span class="fa fa-trash"></span>
              </button>
            </td>
          </tr> <?php } ?>
        </tbody>
      </table>
      </div>
    </div>

    <?php $this->load->view('forms/profileuser_modal'); ?>
    </div>
  </div>
</div>
