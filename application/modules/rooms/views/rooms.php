<script>
  let save_method;
</script>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
    <div class="rooms w-100 h-100">
      <h2 class="text-center font-weight-bold bg-light rounded-circle mt-3">Rooms of Hotel</h2>
      <button id="add-room" class="form-control btn btn-primary m-2 font-weight-bold" type="button" name="button">ADD A NEW ROOM!</button>
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
        <tbody><?php
        $no = 1;
        foreach ($rooms as $room) {
         ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $room->numb; ?></td>
            <td><?php echo $room->type; ?></td>
            <td><?php echo $room->annotation; ?></td>
            <td class="action-col">
              <button id="room_edit" value="<?php echo $room->id; ?>" class="room_edit btn btn-primary"><span class="octicon octicon-pencil"></span></button>
              <a href="<?php echo site_url('hotel/remove_room/').$room->id; ?>" class="btn btn-danger"><span class="octicon octicon-trashcan"></span></a>
            </td>
          </tr> <?php } ?>
        </tbody>
      </table>
    </div>

    <?php $this->load->view('forms/room_modal'); ?>
    </div>
  </div>
</div>
