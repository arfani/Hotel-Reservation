<div class="container bg-light mt-4 mb-4 pb-4">
  <div class="row">
    <div class="col-sm-12">
    <div class="w-100 h-100">
      <h2 class="text-center font-weight-bold mt-3">Reservation Data</h2>
      <button
      id="resdata-add"
      class="form-control btn btn-primary mb-2 mt-2 font-weight-bold"
      type="button" name="button">
      ADD A NEW ROOM!
    </button>
      <div class="table-responsive">
      <table id="resdata-tbl" class="table table-striped table-bordered">
        <thead>
          <tr class="text-wrap">
            <th>No</th>
            <th>No Booking</th>
            <th>Guest Id</th>
            <th>Night</th>
            <th>Arrival Date</th>
            <th>Departure Date</th>
            <th>Room Type</th>
            <th>Room Number</th>
            <th>Adult</th>
            <th>Child</th>
            <th>Status</th>
            <th>Voucher Username</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $ind = 1;
        foreach ($res as $data) {
         ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data->id; ?></td>
            <td class="wrapword" disabled><?php echo $data->guest_id; ?></td>
            <td><?php echo $data->night; ?></td>
            <td><?php echo $data->arrival_date; ?></td>
            <td><?php echo $data->departure_date; ?></td>
            <td><?php echo $data->room_type; ?></td>
            <td><?php echo $data->room_numb; ?></td>
            <td><?php echo $data->adult; ?></td>
            <td><?php echo $data->child; ?></td>
            <td><?php echo $data->status; ?></td>
            <td><?php echo $data->uname_voucher; ?></td>
            <td class="text-center text-nowrap">
              <button class="check-out btn btn-primary btn-sm" value="<?php echo $data->id; ?>" data-toggle="tooltip" title="check-out" data-placement="left">
                <span class="ti-cut"></span>
              </button>
              <button class="extend btn btn-danger btn-sm" value="<?php echo $data->id; ?>" data-toggle="tooltip" title="Exted" data-placement="left">
                <span class="ti-plus"></span>
              </button>
            </td>
          </tr> <?php } ?>
        </tbody>
      </table>
      </div>
    </div>

    </div>
  </div>
</div>
