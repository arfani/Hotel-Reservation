<div class="container bg-light mt-4 mb-4 pb-4">
  <div class="row">
    <div class="col-sm-12">
    <div class="rooms w-100 h-100">
      <h2 class="text-center font-weight-bold mt-3">GUEST TABLE</h2>
      <div class="table-responsive">
      <table id="guest-tbl" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>KTP/Passport</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Birth</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $ind = 1;
        foreach ($guests as $guest) {
         ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td class="wrapword"><?php echo $guest->id; ?></td>
            <td><?php echo $guest->name; ?></td>
            <td><?php echo $guest->gender; ?></td>
            <td class="text-nowrap"><?php echo $guest->birth; ?></td>
            <td><?php echo $guest->phone; ?></td>
            <td><?php echo $guest->email; ?></td>
            <td><?php echo $guest->address; ?></td>
            <td class="text-center text-nowrap">
              <button class="guest-edit btn btn-primary font-weight-bold text-white" value="<?php echo $guest->id; ?>" >
                <span class="fa fa-pencil">
                </span>
              </button>
              <button class="btn btn-danger guest-remove" value="<?php echo $guest->id; ?>" >
                <span class="fa fa-trash"></span>
              </button>
            </td>
          </tr> <?php } ?>
        </tbody>
      </table>
      </div>
    </div>

    <?php $this->load->view('forms/guest_modal'); ?>
    </div>
  </div>
</div>
