<div class="container bg-light mt-4 mb-4 pb-4">
  <div class="row">
    <div class="col-sm-12">
    <div class="rooms w-100 h-100">
      <h2 class="text-center font-weight-bold mt-3">TABLE ROOM</h2>
      <button
      id="room-add"
      class="form-control btn btn-primary mb-2 mt-2 font-weight-bold"
      type="button" name="button">
      ADD A NEW ROOM!
    </button>
      <div class="table-responsive">
      <table id="rooms-tbl" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Room Number</th>
            <th>Room Type</th>
            <th>Annotation</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $ind = 1;
        foreach ($rooms as $room) {
         ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $room->numb; ?></td>
            <td><?php echo $room->type; ?></td>
            <td><?php echo $room->annotation; ?></td>
            <td class="text-center">
              <button class="room-edit btn btn-primary font-weight-bold text-white" value="<?php echo $room->id; ?>" >
                <span class="octicon octicon-pencil">
                </span>
              </button>
              <button class="btn btn-danger room-remove" value="<?php echo $room->id; ?>" >
                <span class="octicon octicon-trashcan"></span>
              </button>
            </td>
          </tr> <?php } ?>
        </tbody>
      </table>
      </div>
    </div>

    <?php $this->load->view('forms/room_modal'); ?>
    </div>
  </div>
</div>
