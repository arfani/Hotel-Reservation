<!-- pop up with The Modal -->
  <div class="modal fade" id="extend-modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Reservation Extend <span class="la-timer dark text-danger float-right ml-4 d-none" id="loader-img-ext"><div></div></span></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
              <label for="night-ext">Night </label>
              <input id="night-ext" value="1" min=1 type="number" class="form-control" autofocus required />
          </div>
          <div class="alert alert-success alert-dismissable d-none" id="ext-alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Status : <span id="ext-status"></span>
          </div>
        </div> <!-- End of Modal Body -->

              <!-- Modal footer -->
              <div class="modal-footer">
                <input class="btn btn-primary w-100" value="Done" id="ext-done" readonly />
              </div>
            <!-- </form> -->

            </div>
          </div>
        </div>
