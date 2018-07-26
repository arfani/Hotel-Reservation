<div class="container bg-light mt-4 mb-4 pb-4">
  <div class="row">
    <div class="col-sm-12">
    <div class="w-100 h-100">
      <h2 class="text-center font-weight-bold mt-3">WALLED GARDEN</h2>
      <button
      id="walled-add"
      class="form-control btn btn-primary mb-2 mt-2 font-weight-bold"
      type="button" name="button">
      ADD A NEW WALLED GARDEN!
    </button>
      <div class="table-responsive">
      <table id="walled-tbl" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Destination</th>
            <th>Action Status</th>
            <th>Active Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $ind = 1;
        foreach ($walledgarden as $walled) {
         ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php if (isset($walled['dst-host'])) { echo $walled['dst-host']; } else { echo '';} ?></td>
            <td><?php echo $walled['action']; ?></td>
            <td><?php echo ($walled['disabled'] == "true") ? "disabled" : "enabled"; ?></td>
            <td>
              <button value="<?php echo $walled['.id']; ?>" class="btn btn-primary fa fa-pencil walled-update"></button>
              <button value="<?php echo $walled['.id']; ?>" class="btn btn-danger fa fa-trash walled-remove"></button>
            </td>
          </tr> <?php } ?>
        </tbody>
      </table>
      </div>
    </div>

    <?php $this->load->view('forms/walledgarden_modal'); ?>
    </div>
  </div>
</div>
