<!-- pop up with The Modal -->
  <div class="modal fade" id="room-modal">
    <div class="modal-dialog modal-dialog-centered modal">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add a new room!</h4>
          <span class="la-timer dark text-danger float-right ml-4 d-none" id="loader-img-room">
            <div></div>
          </span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
          <input type="hidden" name="id" value="">
        <div class="modal-body">
          <!-- <div class="d-flex justify-content-left"> -->
            <div class="form-group">
              <label for="room-numb">Room Number </label>
              <input id="room-numb" type="text" maxlength="3" class="form-control" placeholder="max length is 3" name="room-numb" placeholder="" autofocus required />
            </div>
          <!-- </div> -->
          <!-- <div class="d-flex justify-content-left"> -->
              <div class="form-group">
                <label for="room-type">Room Type </label>
                <select class="form-control" name="room-type" id="room-type">
                  <option value="premium">Premium</option>
                  <option value="budget">Budget</option>
                </select>
              </div>
          <!-- </div> -->
          <!-- <div class="d-flex justify-content-left"> -->
              <div class="form-group">
                <label for="annotation">Annotation </label>
                <textarea id="annotation" class="form-control" name="annotation" rows="2"></textarea>
              </div>
          <!-- </div> -->
          <div class="col-sm-12">
            <div class="alert alert-success alert-dismissable mt-2 d-none" id="room-add-alert">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              Status : <span id="room-add-status"></span>
            </div>
          </div>

      </div> <!-- End of Modal Body -->

        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="button" class="btn btn-primary w-100" value="Save" id="room-submit"/>
          <input type="button" class="btn btn-danger w-100" value="Reset" id="room-reset" />
        </div>

      </div>
    </div>
  </div>
