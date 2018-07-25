<!-- pop up with The Modal -->
  <div class="modal fade" id="special-modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">
            Authentication Administrator
            <span class="la-timer dark text-danger float-right ml-4 d-none" id="loader-img-special">
              <div></div>
            </span>
          </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <div class="d-flex justify-content-center">
            <div class="form-group">
              <div class="form-inline">
                <label for="special-admin">Password admin </label>
                <input type="password" class="form-control ml-3" maxlength="16" id="special-admin" required autofocus/>
              </div>
            </div>
          </div>

          <div class="alert alert-success alert-dismissable d-none" id="special-alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Status : <span id="special-status"></span>
          </div>
      </div> <!-- End of Modal Body -->

              <!-- Modal footer -->
              <div class="modal-footer">
                  <input class="btn btn-primary w-100" value="Submit" id="special-submit" readonly />
                  <input class="btn btn-danger w-100" value="Cancel" id="special-cancel" readonly />
              </div>

            </div>
          </div>
        </div>
