<!-- pop up with The Modal -->
  <div class="modal fade" id="reservation-modal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Title</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <form method="post" action="#" id="reservation-modal-form">
          <input type="hidden" name="id" value="">
        <div class="modal-body">
          <div class="d-flex">
            <div class="form-group">
              <label for="room-numb">Room Number </label>
            </div>
          </div>
          <div class="d-flex">
              <div class="form-group">
                <label for="room-type">Room Type </label>
              </div>
          </div>
          <div class="d-flex">
              <div class="form-group">
                <label for="annotation">Annotation </label>
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
