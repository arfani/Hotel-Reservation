<!-- pop up with The Modal -->
  <div class="modal fade" id="modalAddRoom">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Title</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <!-- <form method="post" action="<?php echo site_url('hotel/save_room'); ?>" id="room-form"> -->
        <form method="post" action="#" id="room-form">
          <input type="hidden" name="id" value="">
        <div class="modal-body">
          <div class="d-flex justify-content-left">
            <div class="form-group">
              <label for="room-numb">Room Number </label>
              <input id="room-numb" type="text" maxlength="3" class="form-control" placeholder="max length is 3" name="room-numb" placeholder="" autofocus required />
            </div>
          </div>
          <div class="d-flex justify-content-left">
              <div class="form-group">
                <label for="room-type">Room Type </label>
                <input id="room-type" type="text" class="form-control" placeholder="Premium / Budget" name="room-type" required />
              </div>
          </div>
          <div class="d-flex justify-content-left">
              <div class="form-group">
                <label for="annotation">Annotation </label>
                <textarea id="annotation" class="form-control" placeholder="New" name="annotation" rows="2"></textarea>
              </div>
          </div>

      </div> <!-- End of Modal Body -->

        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="button" class="btn btn-primary" value="Save" id="room-submit"/>
          <input type="reset" class="btn btn-danger" value="Reset" />
        </div>
      </form>

      </div>
    </div>
  </div>
